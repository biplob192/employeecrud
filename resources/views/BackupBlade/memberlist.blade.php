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
	<h2>TBT Correspondent List</h2>

<table border="1">
	<tr align="center">
		<td><strong>ID</strong></td>
		<td><strong>Correspondent Name</strong></td>
		<td><strong>District Name</strong></td>
		<td><strong>Mobile Number</strong></td>
		<td><strong>Action</strong></td>
		<td><strong>Action</strong></td>		
	</tr>

	@foreach($member as $member)
	<tr>
		<td>{{$member->id}}</td>		
		<td>{{$member->name}}</td>
		<td>{{$member->district}}</td>
		<td>{{$member->mobile}}</td>
		<td><a href="{{url('correspondent').'/'.$member->id.'/edit'}}">Edit</a></td>
		<td>
			<form action="{{url('correspondent') .'/'.$member->id}}" method="post" style="margin: 3">
				@csrf
				{{ method_field('delete') }}
				<button class="delete-button"><strong>Delete</strong></button>				
			</form>
		</td>
	</tr>
	@endforeach

</table> <br>
<button type="button" style="text-decoration: none;"> <a href="/addstaff" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>

