@extends('layouts.app')
@section('title') 
    Enjoy Shopping with PC-Art
@endsection
@section('content')
<div class="container">
    <!-- Display Errors -->
    @include('includes.messages')
    

    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <img src="{{ asset('images/' . $item->image_path) }}" class="card-img-top" style="height: 400px; width: 100%; object-fit: cover;">
            </div>
             <div class="row">
                <span class="text-justified mt-2">{{ $item->specification}}</span>
            </div>
        </div>
        <div class="col-lg-7 ml-2">
            <div class="row">
                 <h3 class="mt-0">{{ $item->model }}</h3>
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
                <h2><strong><a href="#">&#8369;  {{ number_format($item->price) }}</a><strong></h2>
            </div>
            <div class="row">
                <div class="col-lg-3"><h5>Vouchers:</h5></div>
                <div class="col-lg-9"><span class="mr-3">15% OFF</span><span class="mr-3">20% OFF</span> <span class="mr-3">30% OFF</span></div>

            </div>
            <div class="row">
                <div class="col-lg-3"><h5>Shipping :</h5></div>
                <div class="col-lg-9"><span>Free shipping with min. order of ₱500</span></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-9"><span>Shipping from overseas to Metro Manila</span></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-9"><span>Shipping fee &#8369;0 - &#8369; 70 </span></div>
            </div>
            <div class="row">
                <div class="col-lg-3"><h5>Variations :</h5></div>
                <div class="col-lg-9">
                    <strong class="mr-3">Red</strong>
                    <strong class="mr-3">Black</strong>
                    <strong class="mr-3">Blue</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"><h5>Stocks :</h5></div>
                <div class="col-lg-5">
                    @if($stock > 0)
                        {{ $stock }} piece{{ $stock > 1 ? "s" : "" }}
                        <span class="badge badge-success">Available</span>
                    @else
                        <span class="badge badge-dark">Out of Stock</span>
                    @endif
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('add.cart', $item->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" name="quantity" class="form-control" value="1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary btn-block mt-2"> 
                                    <i class="material-icons" style="font-size: 24pt;">add_shopping_cart</i>
                                </button>
                            </div>
                      </form>      
                            <div class="col-lg-6">
                                <a href="#" class="btn btn-primary btn-block mt-2"> Buy Now</a>
                            </div>
                        </div>
                    
                </div>
                
                
                
            </div>
            
        </div>
    </div>
@endsection
@section('specified_css')
<link href="{{ asset('css/catalog_show.css') }}" rel="stylesheet">
@endsection