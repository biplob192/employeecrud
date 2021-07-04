<center> <br>
	<h2>Update Ad Price</h2>
	
<form action="{{url('/ad_price').'/'.$ad_price->id}}" method="post">
	{{ method_field('PUT') }}
	@csrf
	<input type="hidden" name="id" value="{{$ad_price->id}}">

	<select name="ad_type">
			<option {{ ($ad_price->ads_type) == 'govt' ? 'selected' : '' }} value ="govt">Government)</option>
			<option {{ ($ad_price->ads_type) == 'private' ? 'selected' : '' }} value ="private">Private</option>
			<option {{ ($ad_price->ads_type) == 'commercial' ? 'selected' : '' }} value ="commercial">Commercial</option>			
	</select>
	<select name="ad_position">
			<option {{ ($ad_price->ads_position) == 'front' ? 'selected' : '' }} value ="front">Front Page (Color)</option>
			<option {{ ($ad_price->ads_position) == 'back' ? 'selected' : '' }} value ="back">Back Page (Color)</option>
			<option {{ ($ad_price->ads_position) == 'inner' ? 'selected' : '' }} value ="inner">Inner Page</option>
			<option {{ ($ad_price->ads_position) == 'inner_color' ? 'selected' : '' }} value ="inner_color">Inner Page (Color)</option>
	</select>	
	<input type="text" name="rate" value="{{$ad_price->price}}" placeholder="Rate Per I/C" >
	
	<input type="submit" name="" value="Update Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>
