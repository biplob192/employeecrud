<center> <br>
	<h2>Add New TBT Office Staff</h2>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   	@endforeach
<form action="addstaff" method="post">
	@csrf
	<input type="text" name="staffname" value="{{old('staffname')}}" placeholder="Entre Name" required>
	<input type="text" name="mobileno" value="{{old('mobileno')}}" placeholder="Mobile Number" required>
	<input type="text" name="district" value="{{old('district')}}" placeholder="District" required><br><br>
	<input type="checkbox" id="tc" name="tc" checked>
	<label for="tc"> <a href="tc" target="_blank" style="text-decoration:none">I have read all T.C </a> </label><br><br>
	<input type="submit" name="" value="Submit Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>