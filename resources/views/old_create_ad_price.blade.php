<center> <br>
	<h2>Insert New Ad</h2>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   	@endforeach
<form action="ad_price" method="post">
	@csrf	
	<select name="ad_type">
			<option value ="govt">Government)</option>
			<option value ="private">Private</option>
			<option value ="commercial">Commercial</option>			
	</select>
	<select name="ad_position">
			<option value ="front">Front Page (Color)</option>
			<option value ="back">Back Page (Color)</option>
			<option value ="inner">Inner Page</option>
			<option value ="inner_color">Inner Page (Color)</option>
	</select>
	
	<input type="text" name="rate" value="{{old('rate')}}" placeholder="Rate Per I/C" >
	<br><br>

	<input type="submit" name="" value="Submit Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>