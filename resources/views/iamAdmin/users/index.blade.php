@extends('iamAdmin.layouts.app')
@section('admin.title') 
  Users
@endsection
@section('admin.content')
	  <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">USER LIST</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
	                  <th>#</th>
	                  <th>Username</th>
	                  <th>Email</th>
	                  <th>Address</th>
                    	<th>Role</th>
                    	<th>Date Registered</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
	                  <th>Username</th>
	                  <th>Email</th>
	                  <th>Address</th>
                    	<th>Role</th>
                    	<th>Date Registered</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@forelse($users as $index => $user)
	                    @if($user->role_id == 2 || $user->role_id == 3)
		                    <tr>
		                      <td>{{ ++$index }}</td>
		                      <td>{{ $user->username }}</td>
		                      <td>{{ $user->email }}</td>
		                      <td>{{ $user->address }}</td>
		                      <td>{{ $user->role_id == 2 ? "Seller" : "Buyer"}}</td>
		                      <td>{{ $user->created_at->diffForHumans() }}</td>
		                      
		                    </tr>
	                    @endif
                   @empty
                   	<tr>
                      <td colspan="6">No registered user</td>
            
                    </tr>
                   @endforelse

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

@endsection