@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4 class="text-center">
            	Edit Stock
            	<form action="{{ route('stock.destroy', [$items->id, $stock->id]) }}" method="POST">
            		@csrf
            		@method('DELETE')
            		<button class="btn btn-light">
            			<i class="fas fa-trash" style="font-size:12pt; color:red;"></i>
            		</button>
            	</form>
            	
            </h4>
            	<form action="{{ route('stock.update', [$items->id, $stock->id]) }}" method="POST">
            		@csrf
	        		@method('PATCH')
	        	
					<div class="form-group">
					    <label for="serialCodeLabel">Serial Code</label>
					    <input type="text" class="form-control" id="serialCodeInput" placeholder="Enter Serial Code" name="serial_code" value="{{ $stock->serial_code }}">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Item Condition</label>
						</div>
						<select class="custom-select" name="status">
								<option value="good" selected>Good</option>
								<option value="damaged">Damaged</option>
						</select>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Availability</label>
						</div>
						<select class="custom-select" name="is_sold">
								<option value="0" selected>Available</option>
								<option value="1">Sold</option>
								<option value="2">Reserved</option>
						</select>
					</div>

				  <button type="submit" class="btn btn-primary">Submit</button>
				  
				</form>

            
        </div>

        
    </div>
</div>
@endsection
