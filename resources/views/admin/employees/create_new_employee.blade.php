@extends('master')

@section('Title')
New Employee
@endsection

@section('Style')
@endsection

@section('Content')

<center>
	<h5>ADD NEW EMPLOYEE</h5> <br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
</center>
<div class="pd-20 card-box mb-30">
	<form action="employee" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Employee Name Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Father's Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="fathers_name" value="{{old('fathers_name')}}" placeholder="Employee's Father Name Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">District</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="district" value="{{old('district')}}" placeholder="District Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Upazila</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="upazila" value="{{old('upazila')}}" placeholder="Upazila Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="tel" name="mobile" value="{{old('mobile')}}" placeholder="Entre Mobile No">
			</div>
		</div>
			<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Email</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="name@domain.com">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">NID No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="text" name="nid" value="{{old('nid')}}" placeholder="Entre NID No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Employee ID</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="text" name="emp_id" value="{{old('emp_id')}}" placeholder="Entre Employee ID No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Section</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="section" value="{{old('section')}}" placeholder="Department Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Designation</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="designation" value="{{old('designation')}}" placeholder="Designation Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Joining Date</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control date-picker" type="text" name="appointed_date" value="{{old('appointed_date')}}" placeholder="Appointed Date" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Image</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="file" name="image" value="{{old('image')}}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Submit Data</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="submit" value="Submit Form">
			</div>
		</div>
	</form>
</div>
@endsection

@section('Script')
@endsection