<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\ItemOrder;
use App\Serial;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        $itemOrders = [];
        foreach ($orders as $key => $order) {

            $itemOrders[$key] = ItemOrder::all()->where('order_id', $order->id);

        }
        
        $items = Item::all();


        return view('iamAdmin.transactions.index', compact('orders', 'items' ,'itemOrders'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function mytransaction()
    {
        $orders = Order::all()->where('user_id', Auth::user()->id);
        $itemOrders = [];
        foreach ($orders as $key => $order) {

            $itemOrders[$key] = ItemOrder::all()->where('order_id', $order->id);

        }


        // $itemOrders = ItemOrder::all();
        
        $items = Item::all();
        
        return view('users.mytransaction', compact('orders', 'items' ,'itemOrders'));
    }

    public function show_mytransaction(Order $order)
    {
        
        $itemOrders = ItemOrder::all()->where('order_id', $order->id);
        
        $items = Item::all();
        
        return view('users.show_mytransaction', compact('order', 'items' ,'itemOrders'));
    }

    public function mytransaction_serials($order, $item)
    {
        // dd($order);
        $serials = Serial::all()->where('transaction_id', $order)->where('item_id', $item);
        // dd($serials);
        return view('users.transaction_serial', compact('serials'));
    }
}
