<br>
<center>
	<h2>Update Employee Data</h2>
		
	<form action="{{url('/employee').'/'.$employee->id}}" method="post">
		{{ method_field('PUT') }}
		@csrf
		<input type="hidden" name="id" value="{{$employee->id}}">

		<input type="text" name="name" value="{{$employee->name}}" placeholder="Full Name">
		<input type="text" name="district" value="{{$employee->district}}" placeholder="District">
		<input type="text" name="mobile" value="{{$employee->mobile}}" placeholder="Mobile Number">
		<input type="submit" name="" value="Update Data">
		
		<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
	</form>	
</center>