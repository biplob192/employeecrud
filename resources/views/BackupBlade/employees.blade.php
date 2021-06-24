<style>	
	.delete-button{
		height:30px;width:80px;cursor:pointer;border-radius:8px;
	}

	.delete-button:hover {
		background-color: red; color: white;
	}
</style>


<br>
<center>
	<h2>TBT Employees List</h2>

<table border="1">
	<tr align="center">
		<td><strong>ID</strong></td>
		<td><strong>Employee Name</strong></td>
		<td><strong>Upazila Name</strong></td>
		<td><strong>District Name</strong></td>
		<td><strong>Mobile Number</strong></td>
		<td><strong>Action</strong></td>
		<td><strong>Action</strong></td>		
	</tr>

	@foreach($employee as $employee)
	<tr>
		<td>{{$employee->id}}</td>		
		<td> <a href="{{url('employee') .'/'.$employee->id}}">{{$employee->name}}</a> </td>
		<td>{{$employee->upazila}}</td>
		<td>{{$employee->district}}</td>
		<td>{{$employee->mobile}}</td>
		<td><a href="{{url('employee').'/'.$employee->id.'/edit'}}">Edit</a></td>
		<td>
			<form action="{{url('employee') .'/'.$employee->id}}" method="post" style="margin: 3">
				@csrf
				{{ method_field('delete') }}
				<button class="delete-button"><strong>Delete</strong></button>				
			</form>
		</td>
	</tr>
	@endforeach

</table> <br>
<button type="button" style="text-decoration: none;"> <a href="/employee" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>

