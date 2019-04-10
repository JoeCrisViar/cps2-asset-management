@extends('layouts.app')
@section('title') 
    Edit - My Account
@endsection
@section('content')
<div class="content">
	<!-- Display Errors -->
    @include('includes.messages')
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-8">
				<div class="card dark-edition">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Edit Profile</h4>
						<p class="card-category">Complete your profile</p>
					</div>
					<div class="card-body">
						<form action="{{ route('update_myaccount') }}" method="POST">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="bmd-label-floating">Username</label>
										<input type="text" class="form-control" value="{{ Auth::user()->username }}" name="username">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">Email address</label>
										<input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email">
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<a href="#" class="btn btn-primary btn-sm">Change Password</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Fist Name</label>
										<input type="text" class="form-control" value="{{ Auth::user()->firstname }}" name="firstname">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Last Name</label>
										<input type="text" class="form-control" value="{{ Auth::user()->lastname }}" name="lastname">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Address</label>
										<input type="text" class="form-control" value="{{ Auth::user()->address }}" name="address">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>About Me</label>
										<div class="form-group">
											<label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-profile dark-edition">
					<div class="card-avatar">
						<a href="#pablo">
							<img class="img" src="../assets/img/faces/marc.jpg" />
						</a>
					</div>
					<div class="card-body">
						<h6 class="card-category">CEO / Co-Founder</h6>
						<h4 class="card-title">
							@if(is_null(Auth::user()->firstname) || is_null(Auth::user()->lastname))
								Juan Dela Cruz
							@else
								{{ Auth::user()->firstname . " " . Auth::user()->lasstname}}
							@endif

						</h4>
						<p class="card-description">
							Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
						</p>
						<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection