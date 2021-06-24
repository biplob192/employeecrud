<center> <br>
	<h2>Add New Employee</h2>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   	@endforeach
<form action="employee" method="post">
	@csrf
	<input type="text" name="name" value="{{old('name')}}" placeholder="Entre Name" >
	<input type="text" name="fathers_name" value="{{old('fathers_name')}}" placeholder="Father's Name" >
	<input type="text" name="district" value="{{old('district')}}" placeholder="District Name" ><br><br>
	<input type="text" name="upazila" value="{{old('upazila')}}" placeholder="Upazila Name" >
	<input type="text" name="mobile" value="{{old('mobile')}}" placeholder="Mobile Number" >
	<input type="text" name="email" value="{{old('email')}}" placeholder="Enter E-mail" ><br><br>
	<input type="text" name="nid" value="{{old('nid')}}" placeholder="NID Number" >
	<input type="date" name="joining_date" value="{{old('joining_date')}}" placeholder="Joining Date Here" >
	<input type="text" name="image" value="{{old('image')}}" placeholder="Image Here" ><br><br>
	
	<input type="checkbox" id="tc" name="tc" checked>
	<label for="tc"> <a href="tc" target="_blank" style="text-decoration:none">I have read all T.C </a> </label><br><br>

	<input type="submit" name="" value="Submit Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>