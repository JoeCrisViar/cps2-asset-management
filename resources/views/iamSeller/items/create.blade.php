@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		<div class="col-md-12">
			<div class="card dark-edition">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Add Item</h4>
					<p class="card-category">Fill in the blanks</p>
				</div>
				<div class="card-body">
					<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Upload image</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="inputGroupFile01">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>	
						<div class="form-group">
							<label class="bmd-label-floating" for="itemModel">Model</label>
							<input type="text" class="form-control" id="itemModelInput" placeholder=". . ." name="model" value="{{ old('model') }}">
						</div>
						<div class="form-group">
							<label class="bmd-label-floating" for="itemSpecification">Specification</label>
							<textarea class="form-control" id="itemSpecificationInput" rows="3" name="specification"></textarea>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating" for="itemPrice">Price</label>
							<input type="number" class="form-control" id="itemPriceInput" placeholder=". . ." name="price" value="{{ old('price') }}">
						</div>

						<div class="form-group">
							<label class="bmd-label-floating" for="itemPrice">Stock</label>
							<input type="number" class="form-control" id="itemPriceInput" placeholder=". . ." name="stock" value="{{ old('stock') }}">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text bmd-label-floating" for="inputGroupSelect01">Category</label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="category_id">
								<option selected>Choose...</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text bmd-label-floating" for="inputGroupSelect01">Brand</label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="brand_id">
								<option selected>Choose...</option>
								@foreach($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Add</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
