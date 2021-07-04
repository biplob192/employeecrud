@extends('master')

@section('Title')
New Correspondent
@endsection

@section('Style')
@endsection

@section('Content')

<center>
	<h5>ADD NEW CORRESPONDENT</h5> <br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
</center>
<div class="pd-20 card-box mb-30">
	<form action="correspondent" method="post">
		@csrf
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Correspondent Name Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Division Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="division" value="{{old('division')}}" placeholder="Division Name Here">
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
			<label class="col-sm-12 col-md-2 col-form-label">Email</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="name@domain.com">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="tel" name="mobile" value="{{old('mobile')}}" placeholder="Entre Mobile No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">NID No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="nid" value="{{old('nid')}}" placeholder="Entre NID No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Corr. ID No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="corrid" value="{{old('corrid')}}" placeholder="Entre Correspondent ID No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Date</label>
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