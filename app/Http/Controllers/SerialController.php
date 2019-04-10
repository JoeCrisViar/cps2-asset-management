<?php

namespace App\Http\Controllers;

use App\Serial;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Item $items)
    {
        return view('iamSeller.stocks.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $items)
    {
        Serial::create(array_merge($request->all(), ['item_id' => $items->id]));

        // Update item stock/quantity
        $items->stock += 1;

        $items->save();

        return redirect()->route('item.show', $items->id)->with('success', 'Stock added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show(Serial $serial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $items, $serial)
    {
        $stock = Serial::find($serial);

        return view('iamSeller.stocks.edit', compact('items','stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Item $items, $serial)
    {
        $stock = Serial::find($serial);   
        // dd($request);
        $stock->fill($request->all())->save();

        return redirect()->route('item.show', $items->id)->with('success', 'Stock updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $items, $serial)
    {
        //Softd Delete Stock/Serial 
        $stock = Serial::find($serial); 
        
        $stock->deleted_at = Carbon::now();
        
        $stock->save();


        // Updating item quantity
        $items->stock -= 1;

        $items->save();

        return  redirect()->route('item.show', $items->id)->with('success', 'Stock Deleted');
    }

    
}
