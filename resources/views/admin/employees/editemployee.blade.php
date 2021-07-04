@extends('master')

@section('Title')
Edit Employee
@endsection

@section('Style')
@endsection

@section('Content')

<center>
	<h5>UPDATE EMPLOYEE DATA</h5><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
</center>
<form action="{{url('/employee').'/'.$employee->id}}" method="post" enctype="multipart/form-data">
	{{ method_field('PUT') }}
	@csrf
	<input type="hidden" name="id" value="{{$employee->id}}">
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="name" value="{{$employee->name}}" placeholder="Employee Name Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Father's Name</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="fathers_name" value="{{$employee->fathers_name}}" placeholder="Employee's Father Name Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">District</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="district" value="{{$employee->district}}" placeholder="District Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Upazila</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="upazila" value="{{$employee->upazila}}" placeholder="Upazila Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="mobile" value="{{$employee->mobile}}" placeholder="Entre Mobile No">
		</div>
	</div>
		<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Email</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="email" name="email" value="{{$employee->email}}" placeholder="name@domain.com">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">NID No</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="nid" value="{{$employee->nid}}" placeholder="Entre NID No">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Employee ID</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="emp_id" value="{{$employee->emp_id}}" placeholder="Entre Employee ID No">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Section</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="section" value="{{$employee->section}}" placeholder="Department Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Designation</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="designation" value="{{$employee->designation}}" placeholder="Designation Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Joining Date</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control date-picker" type="text" name="appointed_date" value="{{$employee->appointed_date}}" placeholder="Appointed Date" >
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Image</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="file" name="image" value="{{$employee->image}}">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Submit Data</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="submit" value="Submit Form">
		</div>
	</div>
</form>

@endsection

@section('Script')
@endsection
