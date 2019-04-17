<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Order;
use Auth;

class CreateSessionIfNotExisting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        // Creating Session for cart
        if(!Session::has('cart')){
            Session::put('cart', []);
        }

        // Creating seller's notification session (so i can unset when the notif is viewed)
        if(!is_null(Auth::user()))
        {
            if(Auth::user()->role_id == 2)
            {    

                if(!Session::has('seller_notif')){
                    Session::put('seller_notif', []);

                    $notif = Session::get('seller_notif');
                    $orders = Order::all()->where('status_id', '<', 4);
                    // dd($orders);
                    foreach ($orders as $key => $order) {
                        $notif[$key] = $order;
                    }

                    // dd(Session::put('seller_notif', $notif));
                }
            }
        }

        return $next($request);
    }
}
