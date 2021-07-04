<style>
	.emptable{
		font-size: 19px;

	}
</style>


<br>
<center>
	<h2>{{$employee->name}}</h2>

<table border="1" class="emptable">
	<tr>
		<td><strong>Employee ID:</strong></td>
		<td align="center">{{$employee->id}}</td>
	</tr>	
	<tr align="">
		<td><strong>Fathe'r Name:</strong></td>
		<td>{{$employee->fathers_name}}</td>
	</tr>
	<tr align="">
		<td><strong>Upazila:</strong></td>
		<td>{{$employee->upazila}}</td>
	</tr>
	<tr align="">
		<td><strong>District:</strong></td>
		<td>{{$employee->district}}</td>
	</tr>
	<tr align="">
		<td><strong>Mobile:</strong></td>
		<td>{{$employee->mobile}}</td>
	</tr>
	
</table> <br>
<button type="button" style="text-decoration: none;"> <a href="{{url('employee').'/'.$employee->id.'/edit'}}" style="text-decoration:none"> <strong>Edit</strong> </a></button>
<button type="button" style="text-decoration: none;"> <a href="/employee" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>

