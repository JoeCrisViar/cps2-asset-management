@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4 class="text-center">Add Stock </h4>
            	<form action="{{ route('stock.store', $items->id) }}" method="POST">
            		@csrf
	        		
					<div class="form-group">
					    <label for="serialCodeLabel">Serial Code</label>
					    <input type="text" class="form-control" id="serialCodeInput" placeholder="Enter Serial Code" name="serial_code" value="{{ old('serial_code') }}">
					</div>

				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            
        </div>
    </div>
</div>
@endsection
