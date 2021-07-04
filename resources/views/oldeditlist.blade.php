<br>
<center>
	<h2>Update Data</h2>
		
	<form action="{{url('/correspondent').'/'.$correspondent->id}}" method="post">
		{{ method_field('PUT') }}
		@csrf
		<input type="hidden" name="id" value="{{$correspondent->id}}">

		<input type="text" name="name" value="{{$correspondent->name}}" placeholder="Full Name">
		<input type="text" name="district" value="{{$correspondent->district}}" placeholder="District">
		<input type="text" name="mobile" value="{{$correspondent->mobile}}" placeholder="Mobile Number">
		<input type="submit" name="" value="Update Data">
		
		<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
	</form>	
</center>