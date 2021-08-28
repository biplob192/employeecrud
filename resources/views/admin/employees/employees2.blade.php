@extends('master')

@section('Title')
Employees
@endsection

@section('Style')
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
<center> <h5>OFFICE EMPLOYEE LIST</h5> </center> <br>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<!-- <th>S/N:</th> -->
					<th>Image</th>
					<th>Name</th>
					<th>Designation</th>
					<th>Email</th>	
					<th>Mobile</th>	
					<th class="text-center" >Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@foreach($employees as $employee)
				<tr>
					<!-- <td>{{$employee->id}}</td>	 -->		
					<td>
						<img src="{{asset('images').'/'.$employee->image}}" style="width:60px;height:60px;border-radius:50%;">
					</td>			
					<td><a href="{{url('employee').'/'.$employee->id}}"> <strong>{{$employee->name}}</strong> </a></td>	
					<td>{{$employee->designation}}</td>			
					<td>{{$employee->email}}</td>			
					<td>{{$employee->mobile}}</td>			

					<td>
						<div class="menu">		
							<div class="edit">
								<form action="{{url('employee').'/'.$employee->id.'/edit'}}" method="get">	
									<button class="btn btn-outline-dark">Edit</button>				
								</form>
							</div>
							<div class="delete">
								<form action="{{url('employee') .'/'.$employee->id}}" method="post">
									@csrf
									{{ method_field('delete') }}
									<button class="btn btn-outline-danger">Delete</button>				
								</form>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- {{$employees->links()}} -->
	<div class="d-flex justify-content-end">
		<div>Showing {{$employees->firstItem()}} to {{$employees->lastItem()}} of {{$employees->total()}} Employee</div>&nbsp;&nbsp;
		<div>{{$employees->links()}}</div>
	</div>
</div>

@endsection

@section('Script')
<script>
	$(document).ready(function(){

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
@endsection