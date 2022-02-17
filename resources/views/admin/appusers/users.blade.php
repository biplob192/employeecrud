@extends('master')

@section('Title')
Users
@endsection

@section('Style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection

@section('Content')

<style type="text/css">
.menu{width: 100%;float: left;text-align: center;}
.edit{width: 50%;float: left;text-align: center;}
.delete{width: 50%;float: left;text-align: center;}
/*.w-5{display: none;}*/
.page-item.active .page-link{background-color: #343a40;border-color: #343a40;}
.page-link{color: #343a40}
.page-link:hover{color: #343a40}
</style>
<!-- @if(session()->has('error'))     -->
	<!-- <center><h5> <span style="color: red;">{{ session()->get('error') }}</span> </h5></center> <br> -->
<!-- @endif -->

@foreach($errors->all() as $error)
    <div>
    	<center><h5> <span style="color: red;">{{$error}}</span> </h5></center> <br>       
    </div>
@endforeach

<div class="container-md">
	<div class="row align-items-center">
		<div class="col align-self-center"></div>
		<div class="col-md-5 align-self-center"><center> <h5>SYSTEM USERS</h5> </center> <br></div>
		<div class="col align-self-center">
			<div class="" style="float: right;">
				@hasrole('super_admin')				
			  	<button class="btn btn-dark" data-toggle="modal" data-target="#userModal" id="userModalBtn">New User</button>@endhasanyrole		
			</div>
		</div>
	</div>			
</div>

<br>

<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped display" id="myTable">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>	
					<th>User Role</th>	
					@hasrole('super_admin')<th class="text-center">Action</th>@endhasrole
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>					
					<td id="user_id">{{$user->id}}</td>			
					<td><a href="{{url('user').'/'.$user->id}}"> <strong>{{$user->name}}</strong> </a></td>			
					<td>{{$user->email}}</td>			
					<td>
						@if($user->roles()->pluck('name')->join('') == 'super_admin')
							<span class="badge badge-pill badge-success" style="font-size: 15px;">Super Admin </span>
						@elseif($user->roles()->pluck('name')->join('') == 'admin')
							<span class="badge badge-pill badge-success" style="font-size: 15px;">System Admin </span>
						@elseif($user->roles()->pluck('name')->join('') == 'editor')
							<span class="badge badge-pill badge-success" style="font-size: 15px;">System Editor </span>
						@elseif($user->roles()->pluck('name')->join('') == 'user')
							<span class="badge badge-pill badge-success" style="font-size: 15px;">System User </span>
						@endif		
					@hasrole('super_admin')
					<td>
						<div class="menu">
								
							<div class="edit">
								<button class="btn btn-outline-dark" data-toggle="modal" data-target="#EditUserModal" id="editUserBtn" value="{{$user->id}}" onclick="editUser({{$user}})" onclick="confirmEdit()">Edit</button>
							</div>							
							<div class="delete">
								<form action="{{url('user') .'/'.$user->id}}" method="post">
									@csrf
									{{ method_field('delete') }}
									<button class="btn btn-outline-danger" onclick="confirmDelete()">Delete</button>				
								</form>
							</div>
						</div>
					</td>
					@endhasrole
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>





@include('inc.newUserModal')

@endsection

@section('Script')
<script>
  	function editUser(data) {
  		console.log(data);
  		$("#edit_user_name").val(data.name);
  		$("#edit_user_email").val(data.email);
  		$("#edit_user_id").val(data.id);
  		
	}
</script>
<script>
	function confirmEdit() {
	  	var result = confirm("Are you sure, you want to edit this record?");
		if (result) {
		    alert("Confirmed !!");
		}else{
			event.preventDefault();
		}
	}
	function confirmDelete() {
	  	var result = confirm("Are you sure, you want to delete this record?\nDeleted record will not be recover!");
		if (result) {
		    alert("Confirmed !!");
		}else{
			event.preventDefault();
		}
	}
</script>

@endsection