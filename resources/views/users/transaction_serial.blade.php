@extends('layouts.app')
@section('title') 
    My Serials	
@endsection

@section('content')
<div class="container">
	<div class="card card-plain">		

		<div class="row">
			<div class="col-md-12">
				<div class="card-header card-header-primary">
                 	 <h4 class="card-title mt-0"> Serials</h4>
                </div>
        	</div>
		</div>
	<ul class="mt-3">		
	@foreach($serials as $serial)
		<li class="text-justified">{{ $serial->serial_code }}</li>
	@endforeach
	</ul>
	</div>
	<a href="{{ route('mytransaction') }}" class="btn btn-primary">Back</a>
</div>
@endsection