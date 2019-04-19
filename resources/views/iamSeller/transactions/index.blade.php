@extends('layouts.app')
@section('title') 
    Transactions	
@endsection
@section('content')
	<div class="container">
		
			@foreach($ordered_items as $key => $ordered_item)
			<div class="row">
				<h1>{{ $ordered_item->quantity }}</h1>
				<h5>{{ $ordered_item->price }}</h1>
			</div>
				<hr>
			@endforeach
		
	</div>
@endsection