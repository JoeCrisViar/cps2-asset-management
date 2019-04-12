@extends('layouts.app')
@section('title') 
    My Transactions	
@endsection
@section('content')
<div class="content">
	<!-- Display Errors -->
    @include('includes.messages')
	<div class="container-fluid">
		
          <div class="row">
            
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> My Orders</h4>
                </div>
                <div class="card-body">
                  <!-- Loop Here -->
                  @forelse($orders as $key => $order)
                   <div class="card">
                    <div class="card-body">
                      <div class="row">
                      	<div class="col-lg-8">
                      		Transaction Code: <a href="#">{{ strtoupper($order->transaction_code) }}</a>
                      		<small>Placed on {{ date('m-d-Y h:i:sa', strtotime($order->created_at)) }}</small>
                      	</div>
                      	<div class="col-lg-2 offset-lg-2"><a href="{{ route('show_mytransaction', $order->id) }}">Manage</a></div>
                      </div>
                      <hr>
                      @php
                          
                      @endphp
                        @foreach($itemOrders[$key] as $itemOrder)

                          <div class="row mb-3">
                              @php

                                $item = $items->where('id', $itemOrder->item_id)->first();
                                  
                              @endphp
                              <div class="col-lg-2"><img class="card-img-top" src="{{ asset('images/' . $item->image_path) }}" alt="Card image cap" style="width: 100px;"></div>
                            	<div class="col-lg-4 mt-4">{{ $item->model }}</div>
                            	<div class="col-lg-1 mt-4">Qty: {{ $itemOrder->quantity }}</div>
                            	<div class="col-lg-2 offset-lg-1 mt-4">{{ $order->status_id == 1 ? 'for delivery' : 'delivered' }}</div>	
                            	<div class="col-lg-2 mt-4">{{ $order->status_id == 2 ? $order->updated_at->diffForHumans() : '' }}</div>
                          </div>
                        @endforeach
                    </div>
                  </div>
                  @empty

                  <div class="row">
                  	<div class="col-lg-12 text-center">No transaction to show!</div>	
                  </div>
                  @endforelse
                  <!-- End Loop Here -->
                </div>
              </div>
            </div>
          </div>
        	

	</div>
</div>

@endsection