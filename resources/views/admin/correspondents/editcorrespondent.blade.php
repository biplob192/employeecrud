@extends('master')

@section('Title')
Edit Employee
@endsection

@section('Style')
@endsection

@section('Content')

<center>
	<h5>UPDATE CORRESPONDENT DATA</h5><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
</center>
<div class="pd-20 card-box mb-30">
<form action="{{url('/correspondent').'/'.$correspondent->id}}" method="post" enctype="multipart/form-data">
	{{ method_field('PUT') }}
	@csrf
	<input type="hidden" name="id" value="{{$correspondent->id}}">
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="name" value="{{$correspondent->name}}" placeholder="Correspondent Name Here">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Division</label>
		<div class="col-sm-12 col-md-10">
			<select class="form-control custom-select2" name="division" required>					
				@foreach ($divisions as $division)
				<option {{($correspondent->division_id) == $division->division_id ? 'selected' : '' }} value="{{$division->division_id}}">{{$division->division_name}}</option>
				@endforeach
			<select>			
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">District</label>
		<div class="col-sm-12 col-md-10">
			<select class="form-control custom-select2" name="district" required>					
				@foreach ($districts as $district)
				<option {{($correspondent->district_id) == $district->district_id ? 'selected' : '' }} value="{{$district->district_id}}">{{$district->district_name}}</option>
				@endforeach
			<select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Upazila</label>
		<div class="col-sm-12 col-md-10">
			<select class="form-control custom-select2" name="upazila" required>					
				@foreach ($upazilas as $upazila)
				<option {{($correspondent->upazila_id) == $upazila->upazila_id ? 'selected' : '' }} value="{{$upazila->upazila_id}}">{{$upazila->upazila_name}}</option>
				@endforeach
			<select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="mobile" value="{{$correspondent->mobile}}" placeholder="Entre Mobile No">
		</div>
	</div>
		<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Email</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="email" name="email" value="{{$correspondent->email}}" placeholder="name@domain.com">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">NID No</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="nid" value="{{$correspondent->nid}}" placeholder="Entre NID No">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">correspondent ID</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="corrid" value="{{$correspondent->corrid}}" placeholder="Entre correspondent ID No">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Joining Date</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control date-picker" type="text" name="appointed_date" value="{{$correspondent->appointed_date}}" placeholder="Appointed Date" >
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
