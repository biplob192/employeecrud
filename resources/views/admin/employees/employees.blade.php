@extends('master')

@section('Title')
Employees
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
<center> <h5>OFFICE EMPLOYEE LIST</h5> </center> <br>
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped display" id="myTable">
			<thead>
				<tr>
					<!-- <th>S/N:</th> -->
					<th>Image</th>
					<th>Name</th>
					<th>Designation</th>
					<th>Email</th>	
					<th>Mobile</th>	
					@hasanyrole('super_admin|admin|editor')<th class="text-center" >Action</th>@endhasanyrole
				</tr>
			</thead>
			<tbody>
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
					@hasanyrole('super_admin|admin|editor')
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
					@endhasanyrole
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>

@endsection

@section('Script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> -->
<script>
	$(document).ready(function() {
	    $('#myTable').DataTable({
	    	responsive: true,
	    	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        dom: 'Bfrtip',
	        // buttons: [
	        //     'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
	        // ]
	    } );
	});
</script>
@endsection