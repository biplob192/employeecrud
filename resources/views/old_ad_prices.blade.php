<style>	
	.delete-button{
		height:30px;width:80px;cursor:pointer;border-radius:8px;
	}

	.delete-button:hover {
		background-color: red; color: white;
	}
	.emptable{
		font-size: 19px;
</style>

<br>
<center>
	<h2>TBT Advertising Price List</h2>
<table border="1" class="emptable">
	<tr align="center">
		<td><strong>S/N:</strong></td>
		<td><strong>Ads Type</strong></td>
		<td><strong>Position</strong></td>
		<td><strong>Rate I/C</strong></td>	
		<td><strong>Action</strong></td>	
		<td><strong>Action</strong></td>	
	</tr>
	@foreach($ad_prices as $ad_prices)
	<tr>
		<td>{{$ad_prices->id}}</td>			
		<td>{{$ad_prices->ads_type}}</td>
		<td>{{$ad_prices->ads_position}}</td>
		<td>{{$ad_prices->price}}</td>

		<td><a href="{{url('ad_price').'/'.$ad_prices->id.'/edit'}}">Edit</a></td>
		<td>
			<form action="{{url('ad_price') .'/'.$ad_prices->id}}" method="post" style="margin: 3">
				@csrf
				{{ method_field('delete') }}
				<button class="delete-button"><strong>Delete</strong></button>				
			</form>
		</td>
	</tr>
	@endforeach	
</table> <br>
<button type="button" style="text-decoration: none;"> <a href="/ad_price" style="text-decoration:none"> <strong>Add New</strong> </a></button>
<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</center>