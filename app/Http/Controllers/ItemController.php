<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Brand;
use App\Serial;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function generate_serial_code($quantity, $item_id, $brand)
    {
        $counter = 0;

        do
        {
            $token = $this->getToken(6, $item_id);
            $code = preg_replace('/\s+/', '', $brand) . $token . substr(strftime("%Y", time()),2) . uniqid() . $counter;
            $serial = new Serial;

            $serial->serial_code = strtoupper($code);

            $serial->item_id = $item_id;

            $serial->save();

            $counter++;
        }
        while($counter < $quantity);      
    }

    private function getToken($length, $seed)
    {    
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";

        mt_srand($seed);      // Call once. Good since $application_id is unique.

        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet)-1)];
        }
        return $token;
    }



    public function index()
    {
    
        $user_id = Auth::user()->id;

        $items = Item::all()->where('user_id', '=', $user_id)->where('deleted_at', null);

        $counter = 0;
        

       return view('iamSeller.items.index', compact('items', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
       
        $brands = Brand::all();
        
        return view('iamSeller.items.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $quantity = $request->stock;

        $user_id = Auth::user()->id;

        $brand = Brand::find($request->brand_id);

        //Inserting user_id into the $request input instance 
        $item = Item::create(array_merge($request->all(), ['user_id' => $user_id]));

        if(!is_null($request->stock)){
            // Passing the last item id inserted in DB to generate serial
            $this->generate_serial_code($quantity, $item->id, $brand->name); 
        }   
        return redirect()->route('item.index')->with('success', 'Item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $counter = 0;
        
        // Count Item available
        $stock = $item->serials->where('status', 'good')->where('is_sold', 0)->count();

        $sold = $item->serials->where('is_sold', 1)->count();

        return view('iamSeller.items.show', compact('item', 'counter', 'stock', 'sold'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

        $categories = Category::all();
       
        $brands = Brand::all();
        
        return view('iamSeller.items.edit', compact( 'item','categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        /*Creating Serials for newly added items (Serials Entity)*/

        $new_stock_quantity = $request->stock;

        $user_id = Auth::user()->id;

        $brand = Brand::find($request->brand_id);

        $this->generate_serial_code($new_stock_quantity, $item->id, $brand->name); 


        /*Updating the item stock quanity (Items Entity)*/

        $new_stock_quantity += $item->stock;
        
        $request->merge(array('stock' => $new_stock_quantity));

        $item->fill($request->all())->save();

        return redirect()->route('item.index')->with('success', 'Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    { 
        $time =Carbon::now();
        // dd($item->id);
        $item->deleted_at = $time;

        $stocks = Serial::all()->where('item_id', $item->id);
        // dd($stocks);
        foreach ($stocks as $stock) {
            if($stock->deleted_at == NULL)
            {
                $stock->deleted_at = $time;
            
                $stock->save();
            }
        }

         $item->save();       

        return redirect()->route('item.index')->with('success', 'Item deleted');
    }
    
     public function catalog_index($category_id)
     {
        
        // $serials = Serial::all()->where('status', 'good')->where('is_sold', 0);
        if ($category_id == 0) {
            $items = Item::all();
        }else{
            $items = Item::all()->where('category_id', $category_id);
        }
        

        $categories = Category::all();
        
        return view('iamBuyer.catalog.index', compact('items', 'categories'));
     }

     public function catalog_show(Item $item)
     {

        $counter = 0;
        // Count Item available
        $stock = $item->serials->where('status', 'good')->where('is_sold', 0)->count();
        
        $sold = $item->serials->where('is_sold', 1)->count();

        return view('iamBuyer.catalog.show', compact('item', 'sold', 'stock', 'counter'));
     }
    
}
