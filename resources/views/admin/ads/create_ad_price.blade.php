@extends('master')

@section('Title')
New Ad
@endsection

@section('Style')
@endsection

@section('Content')
<center><h5>INSERT NEW AD PRICE</h5></center><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
<div class="pd-20 card-box mb-30">
	<form action="ad_price" method="post">
		@csrf
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Type</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_type">
					<option value ="Govt">Government)</option>
					<option value ="Private">Private</option>
					<option value ="Commercial">Commercial</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Position</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_position">
					<option value ="Front Page">Front Page (Color)</option>
					<option value ="Back Page">Back Page (Color)</option>
					<option value ="Inner Page">Inner Page</option>
					<option value ="Inner_Color">Inner Page (Color)</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Rate Per I/C</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="rate" value="{{old('rate')}}" placeholder="Rate Per I/C">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Submit Ad</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="submit" value="Submit Form">
			</div>
		</div>
	</form>
</div>
@endsection

@section('Script')
@endsection