@extends('layouts.app')
@section('title') 
	Checkout 
@endsection
@section('content')
<div class="container">
	<!-- Display Errors -->
    @include('includes.messages')
	<form action="{{ route('order') }}" method="POST">
		@csrf
		<div class="row mb-4">
			<div class="col-lg-12">
				<div class="form-group">
					Shipping and Billing
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3 mt-2">
							<label for="sel1">Payment Method:</label>
						</div>
						<div class="col-lg-9">
							<select class="form-control" id="sel1" name="payment_mode_id">
									<option value="0">Select Method . . .</option>
								@foreach($payment_modes as $payment_mode)
									<option value="{{ $payment_mode->id }}">{{ $payment_mode->name}}</option>
								@endforeach		
							</select>
						</div>
						
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3">
							<label>Username :</label>
						</div>
						<div class="col-lg-9">
					  		<span>{{ Auth::user()->username }}</span>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3">
							<label>Full Name :</label>
						</div>
						<div class="col-lg-9">
					  		@if(is_null(Auth::user()->firstname) || is_null(Auth::user()->lastname) )
					 	 		<a href="{{ route('edit_myaccount') }}">Please complete your details!</a>
					 		@else
					  			<span>{{ Auth::user()->firstname . " " . Auth::user()->lastname }}</span>
							@endif	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3">
							<label>Address:</label>
						</div>
						<div class="col-lg-9">
							@if(is_null(Auth::user()->address))
					 	 		<a href="{{ route('edit_myaccount') }}">Please complete your details!</a>
					 		@else
					  			<span>{{ Auth::user()->address }}</span>
							@endif	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-3">
							<label>Email:</label>
						</div>
						<div class="col-lg-9">
					  		<span>{{ Auth::user()->email }}</span>	
						</div>
					</div>
				</div>
				<div class="form-group">
					Order Summary
				</div>
				<h6>No of Item{{ collect(Session::get('cart'))->sum() > 1 ? "s" : "" }}: {{ collect(Session::get('cart'))->sum() }}</h6>
				<h5><strong>Order Total: &#8369; <span>{{ number_format($total) }}</span></strong></h5">

			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-1 tex">#</div>
			<div class="col-lg-6">Model</div>
			<div class="col-lg-1">Price</div>
			<div class="col-lg-2 text-center">Quantity</div>
			<div class="col-lg-2">Subtotal</div>
		</div>
		@forelse($cart_items as $index => $item)		
				
		<div class="row mt-4">
			<div class="col-lg-1 tex">{{ ++$counter }}</div>
			<div class="col-lg-6">{{ $item->model }}</div>
			<div class="col-lg-1">&#8369; {{ number_format($item->price) }}</div>
			<div class="col-lg-2 text-center">
					<span>{{ $item->quantity }}</span>
			</div>
			<div class="col-lg-2">&#8369; {{ number_format($item->subtotal) }}</div>

		</div>
					
		@empty
		<div class="row my-5">
			<div class="col-lg-12 text-center">
				<div class="row">
					<div class="col-lg-12 text-center">
						You have no item to show, start shopping now!
					</div>	
				</div>
				<div class="row  text-center">
					<div class="col-lg-12 text-center">
						<a href="{{ route('catalog.index') }}" class="btn btn-primary">Shop now</a>
					</div>
				</div>
			</div>

		</div>
		@endforelse

		@if($cart_items->count() > 0)

		<div class="row mt-4">
			<div class="col-lg-4 offset-lg-4">
				<button class="btn btn-primary btn-block">Order</button>
			</div>
		</div>
		@endif
	</form>
</div>
@endsection
@section('specified_css')
<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endsection