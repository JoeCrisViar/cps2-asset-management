@extends('layouts.app')

@section('content')
<div class="container">
	<!-- Display Errors -->
    @include('includes.messages')
    <div class="row">
    	<div class="col-lg-5">
          <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary btn-sm btn-block mt-2">
                        <i class="far fa-edit"></i> Edit
          </a>
      </div>
      <div class="col-lg-5">
          <a href="{{ route('stock.create', $item->id) }}" class="btn btn-primary btn-block btn-sm mt-2"><i class="fas fa-eye" ></i> Add Stocks</a>
      </div>
    	<div class="col-lg-2">
    		<form action="{{ route('item.destroy', $item->id) }}" method="POST">
    			@csrf
    			@method('DELETE')
    		 <button class="btn btn-secondary btn-sm">Delete Item</button>

    		</form>
    	</div>
    </div>

	<div class="row">
		<div class="col-lg-4 mt-4 mr-3">
      <div class="row">
        <img src="{{ asset('images/' . $item->image_path) }}" class="card-img-top" style="height: 400px; width: 100%; object-fit: cover;">
      </div>
      <div class="row">
        <span class="text-justified mt-2">{{ $item->specification}}</span>
      </div>

		</div>
		<div class="col-lg-7">
			<div class="row">
				<h3><strong>{{ $item->model }}</strong></h3>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<strong>Brand : </strong> {{ strtoupper($item->brand->name) }}	
				</div>
				<div class="col-lg-6">
					<strong>Category : </strong> {{ strtoupper($item->category->name) }}	
				</div>
				<div class="col-lg-12">
					<strong>Status & Rating</strong> : 4.5 stars | 20 Ratings | {{ $sold }} Sold | 
					@if($stock > 0)
						<span class="badge badge-success">Available</span>
                    @else
                     	<span class="badge badge-dark">Out of Stock</span>
                    @endif
				</div>
				
			</div>
			<div class="row mt-2">
				<h5><strong>Price : </strong> &#8369;  {{ number_format($item->price) }}</h5>
			</div>
			<div class="row">
				<div class="col-lg-3"><h5>Shop Vouchers:</h5></div>
				<div class="col-lg-9"><span class="mr-3">15% OFF</span><span class="mr-3">20% OFF</span> <span class="mr-3">30% OFF</span></div>

			</div>
			<div class="row">
				<div class="col-lg-3"><h5>Shipping :</h5></div>
				<div class="col-lg-9"><span>Free shipping with min. order of ₱500</span></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-9"><span>Shipping from <strong>overseas</strong> to Metro Manila</span></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-9"><span>Shipping fee &#8369;0 - &#8369; 70 </span></div>
			</div>
			<div class="row">
				<div class="col-lg-3"><h5>Variations :</h5></div>
				<div class="col-lg-9"><strong class="mr-3">Red</strong><strong class="mr-3">Black</strong><strong class="mr-3">Blue</strong></div>
			</div>
			<div class="row">
				<div class="col-lg-3"><h5>Stocks :</h5></div>
				<div class="col-lg-4">
					@if($stock > 0)
						{{ $stock }} piece{{ $stock > 1 ? "s" : "" }}
						<span class="badge badge-success">Available</span>
                    @else
                     	<span class="badge badge-dark">Out of Stock</span>
                    @endif
				</div>
				
			</div>
			<div class="row">
				
				
			</div>
			
		</div>
	</div>

<!-- Stock list -->
	<div class="row justify-content-center">
        <div class="col-md-12">
          
            <h4 class="text-center mt-5">Item Stock list </h4>
            <table class="table table-striped ">
              <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Serial Code</th>
                      <th scope="col">Condition</th>
                      <th scope="col">Availability</th>
                      <th scope="col">Date added</th>
                      <th scope="col">Action</th>
                    </tr>
              </thead>
              <tbody>

                @forelse($item->serials as $stock)
                <tr>
                  
                  <td>{{ ++$counter }}</td>
                  <td style="width: 16.66%">{{ $stock->serial_code }}</td>
                  <td style="width: 10%">{{ strtoupper($stock->status) }}</td>
                  <td>
                  	@if($stock->is_sold == 0)                  	
                  		<span class="badge badge-success">Available</span>
                  	@elseif($stock->is_sold == 1)
                     	<span class="badge badge-danger">Sold</span>
                    @else
                    	<span class="badge badge-dark">Reserved</span>
                    @endif
                  </td>
                  <td>{{ $stock->created_at->diffForHumans() }}</td>
                  
                  <td>
                    <div class="row">
                      <div class="col-lg-3">
                        <a href="{{ route('stock.edit', [$item->id, $stock->id]) }}" class="btn btn-secondary btn-xs">
                          <i class="far fa-edit"></i>
                        </a>   
                      </div>
                      <div class="col-lg-3">
                        <form action="{{ route('stock.destroy', [$item->id, $stock->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-xs">
                            <i class="fas fa-trash" style="font-size:12pt; "></i>
                          </button>
                       </form>
                      </div> 
                    </div>      
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No Item to Show</td>
                </tr>
                @endforelse
              </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
