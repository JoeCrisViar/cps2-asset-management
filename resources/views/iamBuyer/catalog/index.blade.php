@extends('layouts.app')
@section('title') 
    Catalog
@endsection
@section('content')
<div class="container">
    <!-- Display Errors -->
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-2">    
            <h4>Categories: </h4>
        </div>
        <div class="col-lg-10">
            @foreach($categories as $category)     
                <a class="mr-2" href="{{ route('catalog.index', $category->id) }}">
                    {{ $category->name }},
                </a>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">

        @forelse($items as $item)
            <!-- Check if item has available stock -->
            @if($item->serials->where('status', 'good')->where('is_sold', 0)->count() > 0)
                <div class="col-md-3">
                    <div class="card" style="width: 100%; height: 21rem;">
                        <div class="card-wrapper">
                                   <a href="{{ route('catalog.show', $item->id) }}">
                                        <img class="card-img-top" src="{{ asset('images/' . $item->image_path) }}" alt="Card image cap">
                                    </a>
                                <div class="card-body">
                                    <h6 class="card-title">
                                            <a href="{{ route('catalog.show', $item->id) }}">
                                                {{ str_limit(substr($item->model,0,20) . " " . $item->category->name , $limit = -1, $end = '...') }}
                                            </a>
                                    </h6>
                                    
                                    <p class="card-price"><a href="{{ route('catalog.show', $item->id) }}">&#8369; {{ $item->price }}</a></p>
                                    
                                </div>
                            <div class="push"></div>
                        </div>
                        <footer class="card-footer">
                            <a href="#">
                                <span>
                                    5 stars 
                                    <i class="material-icons">grade</i>
                                    <i class="material-icons">grade</i>
                                    <i class="material-icons">grade</i>
                                    <i class="material-icons">grade</i>
                                    <i class="material-icons">grade</i>
                                </span>
                            </a>
                            <span>{{ $item->serials->where('is_sold', 1)->count() > 0 ? $item->serials->where('is_sold', 1)->count() . " sold": "" }}</span>
                        </footer>
                    </div>
                </div>
            @endif
        @empty
        <h3 class="text-center">No Item to Show!</h3>
        @endforelse
    </div>
</div>
@endsection
