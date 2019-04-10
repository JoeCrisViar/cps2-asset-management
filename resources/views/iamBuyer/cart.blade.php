@extends('layouts.app')
@section('title') 
	Cart 
@endsection
@section('content')
<div class="container">
	<!-- Display Errors -->
    @include('includes.messages')
	<h4>Shopping Cart</h4>
	
		<div class="row">
			<div class="col-lg-1 tex">#</div>
			<div class="col-lg-4">Model</div>
			<div class="col-lg-1">Price</div>
			<div class="col-lg-2 text-center">Quantity</div>
			<div class="col-lg-2">Subtotal</div>
			<div class="col-lg-2">Action</div>
		</div>
		@forelse($cart_items as $index => $item)		
				
		<div class="row mt-4">
			<div class="col-lg-1 tex">{{ ++$counter }}</div>
			<div class="col-lg-4">{{ $item->model }}</div>
			<div class="col-lg-1">&#8369; {{ number_format($item->price) }}</div>
			<div class="col-lg-2 text-center">
				<div class="row text-center">
					<div class="col-lg-4">
						<form action="/cart/{{ $item->id }}/add">
							<button>
								<i class="fas fa-plus"></i>
							</button>
						</form>
					</div>
					<div class="col-lg-4">{{ $item->quantity }}</div>
					<div class="col-lg-4">
						<form action="/cart/{{ $item->id }}/minus">
							<button {{ $item->quantity <= 1 ? 'disabled' : ""}}>
								<i class="fas fa-minus"></i>
							</button>
						</form>
					</div>
					
							
					
				</div>
			</div>
			<div class="col-lg-2">&#8369; {{ number_format($item->subtotal) }}</div>
			<div class="col-lg-2">
				<form action="/cart/{{$item->id}}" method="POST">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
				</form>

			</div>
		</div>
					
			@empty
			<div class="row mt-5">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-12 text-center">
							You have no item to show, start shopping now!
						</div>	
					</div>
					<div class="row  text-center">
						<div class="col-lg-12 text-center">
							<a href="{{ route('catalog.index', 0) }}" class="btn btn-primary">Shop now</a>
						</div>
					</div>
				</div>
			</div>
			@endforelse

	@if($cart_items->count() > 0)
	<div class="row">
		<div class="col-lg-4 offset-lg-4">
			<h3 class="text-center">Cart Total: &#8369; <span>{{ number_format($total) }}</span></h3">
			<a href="{{ route('checkout') }}" class="btn btn-primary btn-block">CHECKOUT</a>
		</div>
	</div>
	@endif
</div>
@endsection
@section('specified_css')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endsection