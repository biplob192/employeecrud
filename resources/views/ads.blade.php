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
	<h2>TBT Ads List</h2>

<table border="1" style="font-size: 18;">
	<tr align="center">
		<td><strong>ID</strong></td>
		<td><strong>Employee Name</strong></td>
		<td><strong>Upazila Name</strong></td>
		<td><strong>District Name</strong></td>
		<td><strong>Date</strong></td>
		<td><strong>GD No</strong></td>
		<td><strong>Client</strong></td>
		<td><strong>Amount</strong></td>
		<td><strong>Status</strong></td>
		<td><strong>Action</strong></td>
		<td><strong>Action</strong></td>		
		<td><strong>Action</strong></td>		
	</tr>

	@foreach($ad as $ad)
	<tr>
		<td>{{$ad->id}}</td>		
		<td> <a href="{{url('ad') .'/'.$ad->id}}">{{$ad->correspondent_name}}</a> </td>
		<td>{{$ad->upazila}}</td>
		<td>{{$ad->district}}</td>
		<td>{{$ad->created_at}}</td>
		<td>{{$ad->gd_no}}</td>
		<td>{{$ad->client}}</td>
		<td> <span style="color: #520097; font-weight: bold;">BDT: {{$ad->amount}} Tk.</span> </td>
		<td>{{$ad->payment_status}}</td>


		<td><a href="{{url('ad').'/'.$ad->id.'/edit'}}">Edit</a></td>
		<td><a href="{{url('ad').'/'.$ad->id.'/bill'}}">Create Bill</a></td>
		<td>
			<form action="{{url('ad') .'/'.$ad->id}}" method="post" style="margin: 3">
				@csrf
				{{ method_field('delete') }}
				<button class="delete-button"><strong>Delete</strong></button>				
			</form>
		</td>
	</tr>
	@endforeach

</table> <br>
<button type="button" style="text-decoration: none;"> <a href="/ad" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>

