<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Item;
use App\Paymentmode;
use App\Order;
use App\ItemOrder;
use App\Serial;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(is_null(Auth::user()))
        {
            return redirect('login')->with('error', 'Please login to view your cart.');
        }
         // Session::flush();
        $items = Item::all();

        $cart_items = $items->filter(function($item, $index){
            $cart = collect(Session::get('cart'));
            return $cart->has($item->id);
        });

        $cart = Session::get('cart');
        // $cart_items passed by reference
        $total = 0;
        foreach ($cart_items as $item) {
            $item->quantity = $cart[$item->id];
            $item->subtotal = $item->quantity * $item->price;
            $total += $item->subtotal;
        }
        $counter = 0;
        // dd($item->total);
        return view('iamBuyer/cart', compact('cart_items', 'total', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $item_id)
    {
        if(is_null(Auth::user()))
        {
            return redirect('login')->with('error', 'Please login to add item to cart.');
        }


        $cart = Session::get('cart');
        if(array_key_exists($item_id, $cart)){
            $cart[$item_id] += $request->quantity;
        } else {
            $cart[$item_id] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->route('catalog.index', 0)->with('success', 'Item has added to cart.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Session::get('cart');

        unset($cart[$id]);

        Session::put('cart', $cart);

        return back();
    }

    public function add($id)
    {
        $cart = Session::get('cart');

        $cart[$id]++;

        Session::put('cart', $cart);

        return back();
    }

    public function minus($id)
    {
        $cart = Session::get('cart');

        $cart[$id]--;

        Session::put('cart', $cart);

        return back();
    }
    public function checkout()
    {
        if(is_null(Auth::user()))
        {
            return redirect('login')->with('error', 'Please login to view your cart.');
        }
         // Session::flush();
        $items = Item::all();

        $cart_items = $items->filter(function($item, $index){
            $cart = collect(Session::get('cart'));
            return $cart->has($item->id);
        });

        $cart = Session::get('cart');
        // $cart_items passed by reference
        $total = 0;
        foreach ($cart_items as $item) {
            $item->quantity = $cart[$item->id];
            $item->subtotal = $item->quantity * $item->price;
            $total += $item->subtotal;
        }
        $counter = 0;
        
        $payment_modes = Paymentmode::all();
        
        return view('iamBuyer.checkout', compact('cart_items', 'total', 'counter', 'payment_modes'));
    }

    private function generate_transaction_code(){

        $transaction_code = '';
        while($transaction_code == '')
        {
            $random_string = date('ymd') . uniqid();

            $count = Order::all()->where('transaction_code', $random_string)->count();
            // $query = "SELECT * FROM orders WHERE transaction_code = '{$random_string}'";
            // $count = mysqli_num_rows(mysqli_query($conn, $query));

            if($count == 0){
                $transaction_code = $random_string;
            }
        }

        return $transaction_code; 
    }

    public function order(Request $request)
    {
        if($request->payment_mode_id == 0){
            return redirect()->back()->with('error', 'Please select Payment Method!');
        }
        
        if(is_null(Auth::user()->firstname) || is_null(Auth::user()->lastname)){
            return redirect()->back()->with('error', 'Kindly complete your fullname!');
        }

        if(is_null(Auth::user()->address)){
            return redirect()->back()->with('error', 'Please enter your billing/shipping address!');
        }

      
        // 1st step : INSERT TO ORDERS table
        $transaction_code = $this->generate_transaction_code(); 
        $user_id = Auth::user()->id;
        $status_id = 1;
            //Inserting user_id, transaction_code, status_id into the $request input instance 
        $order = Order::create(array_merge($request->all(), 
            [
                'transaction_code' => $transaction_code, 
                'user_id' => $user_id,
                'status_id' => $status_id 
            ]
        ));

        // 2nd step : INSERT INTO ITEM_ORDER table
        $cart = Session::get('cart');
        foreach ($cart as $item_id => $quantity) {
            $item = Item::find($item_id);

            $itemOrder =  new ItemOrder;

            $itemOrder->item_id = $item_id;
            $itemOrder->order_id = $order->id;
            $itemOrder->seller_id = $item->user->id ;
            $itemOrder->quantity = $quantity;
            $itemOrder->price = $item->price;

            $itemOrder->save();

            // 3rd Step : UPDATE ITEMS stock
            $item->stock -= $quantity;
            $item->save();

            // 4th Step : UPDATE SERIALS is_sold
            $serials = $item->serials->where('item_id', $item_id)->where('is_sold', 0)->take($quantity);
            // dd($serials);            
            foreach ($serials as $serial) {
                $serial->is_sold = 1;
                $serial->transaction_id = $order->id;
                $serial->save();
            }
            
        }

        // UNSET CART
        Session::forget('cart');
        
        // Redirect to cart
        return redirect()->route('cart.index')->with('success', 'Order has been placed. Thank you!');
    }
}
