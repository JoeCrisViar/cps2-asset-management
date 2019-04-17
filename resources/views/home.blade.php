@extends('layouts.app')
@section('title') 
    Home
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @guest
            <div class="col-md-8">
                <div class="card">
                    <div class="card text-center">
                      <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                </div>
            </div>
        @else
            @if(Auth::user()->role_id == 3)
                <!-- Buyers view here -->
            @endif
            @if(Auth::user()->role_id == 2)
                <!-- Seller's view here -->
            @endif


        @endguest
    </div>
</div>
@endsection
