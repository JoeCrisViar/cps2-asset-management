@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <!-- Display Errors -->
          @include('includes.messages')
            <h4 class="text-center">My item list </h4>
            <h4 class="text-center">
              <a href="{{ route('item.create') }}" class="btn btn-primary btn-sm">
                ADD ITEM</i>
              </a>
            </h4>
            <table class="table">
              <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Model</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Stocks</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
              </thead>
              <tbody>

                @forelse($items as $item)
                <tr>
                  
                  <td>{{ ++$counter }}</td>
                  <td><a href="{{ route('item.show', $item->id) }}">{{ $item->model }}</a></td>
                  <td><a href="">{{ $item->category->name }}</a></td>
                  <td>&#8369; {{ number_format($item->price) }}</td>
                  <td><a href="">{{ $item->serials->where('status', 'good')->where('is_sold', 0)->count() }}</a></td>
                  <td>
                      @if($item->serials->where('status', 'good')->where('is_sold', 0)->count() > 0)
                        <span class="badge badge-success">Available</span>
                      @else
                        <span class="badge badge-dark">Out of Stock</span>
                      @endif

                  </td>
                  <td>
                      <a href="{{ route('item.edit', $item->id) }}" class="btn btn-secondary btn-sm">
                        <i class="far fa-edit"></i>
                      </a>
                      <a href="{{ route('item.show', $item->id) }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                      <!-- <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                      </form> -->
                      
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
