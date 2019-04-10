@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		<div class="col-md-12">
			<div class="card dark-edition">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Edit Item</h4>
					<p class="card-category">Fill in the blanks</p>
				</div>
				<div class="card-body">
					<form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
            			@method('PUT')
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
							<input type="text" class="form-control" id="itemModelInput" placeholder=". . ." name="model"  value="{{ $item->model }}">
						</div>
						<div class="form-group">
							<label class="bmd-label-floating" for="itemSpecification">Specification</label>
							<textarea class="form-control" id="itemSpecificationInput" rows="3" name="specification">{{ $item->specification }}
							</textarea>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating" for="itemPrice">Price</label>
							<input type="number" class="form-control" id="itemPriceInput" placeholder=". . ." name="price" value="{{ $item->price }}">
						</div>

						<div class="form-group">
							<label for="itemCurrenStockLable">Current Stock : </label>
							<label for="itemCurrentStock" class="mr-2">{{ $item->serials->where('status', 'good')->where('is_sold', 0)->count() }}</label>
							<a href="{{ route('item.show', $item->id) }}">
								<i class="fas fa-eye"></i>
							</a>

						</div>
						<div class="form-group">
							<label for="itemStockLabel">Add new stock</label>
							<input type="number" class="form-control" id="itemStockInput" placeholder="0" name="stock">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Category</label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="category_id">
								<option value="{{ $item->category->id }}" selected>{{ $item->category->name }}</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Brand</label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="brand_id">
								<option value="{{ $item->brand->id }}" selected>{{ $item->brand->name }}</option>
								@foreach($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Update</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
