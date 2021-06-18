<br>
<center>
	<h2>Update Data</h2>
		
	<form action="{{url('/correspondent').'/'.$member->id}}" method="post">
		{{ method_field('PUT') }}
		@csrf
		<input type="hidden" name="id" value="{{$member->id}}">

		<input type="text" name="staffname" value="{{$member->name}}" placeholder="Full Name">
		<input type="text" name="district" value="{{$member->district}}" placeholder="District">
		<input type="text" name="mobileno" value="{{$member->mobile}}" placeholder="Mobile Number">
		<input type="submit" name="" value="Update Data">
		
		<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
	</form>	
</center>