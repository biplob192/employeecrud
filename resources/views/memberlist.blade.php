<br>
<center>
	<h2>TBT Correspondent List</h2>

<table border="1">
	<tr>
		<td>ID</td>
		<td>Correspondent Name</td>
		<td>District Name</td>
		<td>Mobile Number</td>
		<td>Action</td>
		<td>Action</td>
	</tr>

	@foreach($member as $member)
	<tr>
		<td>{{$member->id}}</td>		
		<td>{{$member->name}}</td>
		<td>{{$member->district}}</td>
		<td>{{$member->mobile}}</td>
		<td><a href="{{url('correspondent').'/'.$member->id.'/edit'}}">Edit</a></td>
		<td>
			<form action="{{url('correspondent') .'/'.$member->id}}" method="post">
				@csrf
				{{ method_field('delete') }}
				<button>Delete</button>
			</form>
		</td>
	</tr>
	@endforeach

</table> <br>
<button type="button"> <a href="/addstaff" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>

