@extends('layouts.app')
@section('title') 
    My Transactions	
@endsection
@section('content')
	<div class="container">
		<div class="card card-plain">		

			<div class="row">
				<div class="col-md-12">
					<div class="card-header card-header-primary">
	                 	 <h4 class="card-title mt-0"> Order Details</h4>
	                </div>
            	</div>
			</div>
			<div class="card mb-0">
				<div class="card-body">
				@php
                         $itemOrders->where('order_id', $order->id);
                         $summary = 0;
                @endphp
	          	@foreach($itemOrders as $key => $itemOrder)
	          		@php
	                    $item = $items->where('id', $itemOrder->item_id)->first();
	                	$summary += ($itemOrder->quantity * $itemOrder->price);
	                @endphp
	                <div class="row">
	                	<div class="col-lg-2">
	                		<img class="card-img-top" src="{{ asset('images/' . $item->image_path) }}" alt="Card image cap" style="width: 100px;">
	                	</div>
	                	<div class="col-lg-3 mt-4">
	                		<a href="{{ route('mytransaction_serials', [$order->id, $item->id]) }}">{{ $item->model }}</a>
	                	</div>
	                	<div class="col-lg-1 mt-4">
	                		Qty: {{ $itemOrder->quantity }}
	                	</div>
	                	<div class="col-lg-1 mt-4">
	                		&#8369; {{ number_format($itemOrder->price) }}
	                	</div>
	                	<div class="col-lg-2 mt-4">
	                		{{ $order->status_id == 1 ? 'for delivery' : 'delivered' }}
	                	</div>	
	                	<div class="col-lg-1 mt-4">
	                		{{ $order->status_id == 2 ? $order->updated_at->diffForHumans() : '' }}
	                	</div>
	                	<div class="col-lg-2 mt-4">
	                		Sold by: {{ $sellers[$key]->username }}
	                	</div>
	                </div>
	          	@endforeach
                </div>
			</div>
			<div class="card">
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-lg-3">
			    			Transaction Code :
			    		</div>
			    		<div class="col-lg-6">
			    			{{ strtoupper($order->transaction_code) }}
			    		</div>	
			    	</div>
			    	<hr>
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">

									Shipping and Contact Details
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									Address :
								</div>
								<div class="col-lg-6">
									{{ Auth::user()->address }}
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-lg-6">
									Customer :
								</div>
								<div class="col-lg-6">
									{{ Auth::user()->firstname . ' ' . Auth::user()->lastname}}
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									Email :
								</div>
								<div class="col-lg-6">
									{{ Auth::user()->email }}
								</div>
							</div>						
						</div>



						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">
									Total Summary
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									Summary :
								</div>
								<div class="col-lg-6">
									&#8369; {{ number_format($summary) }}
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									Shipping Fee :
								</div>
								<div class="col-lg-6">
									0.00
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-6">
									Total :
								</div>
								<div class="col-lg-6">
									&#8369; {{ number_format($summary) }}
								</div>
							</div>						
						</div>
						

					
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection