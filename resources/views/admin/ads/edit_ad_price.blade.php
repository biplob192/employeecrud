@extends('master')

@section('Title')
New Ad
@endsection

@section('Style')
@endsection

@section('Content')
<center><h5>UPDATE AD PRICE</h5></center><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
<div class="pd-20 card-box mb-30">
	<div class="pd-20 card-box mb-30">
		<form action="{{url('/ad_price').'/'.$ad_price->id}}" method="post">
			{{ method_field('PUT') }}
			@csrf
			<input type="hidden" name="id" value="{{$ad_price->id}}">

			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Ad Type</label>
				<div class="col-sm-12 col-md-10">
					<select class="custom-select col-12" name="ad_type">
						<option {{ ($ad_price->ads_type) == 'Govt' ? 'selected' : '' }} value ="govt">Government)</option>
						<option {{ ($ad_price->ads_type) == 'Private' ? 'selected' : '' }} value ="Private">Private</option>
						<option {{ ($ad_price->ads_type) == 'Commercial' ? 'selected' : '' }} value ="Commercial">Commercial</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Ad Position</label>
				<div class="col-sm-12 col-md-10">
					<select class="custom-select col-12" name="ad_position">
						<option {{ ($ad_price->ads_position) == 'Front Page' ? 'selected' : '' }} value ="Front Page">Front Page (Color)</option>
						<option {{ ($ad_price->ads_position) == 'Back Page' ? 'selected' : '' }} value ="Back Page">Back Page (Color)</option>
						<option {{ ($ad_price->ads_position) == 'Inner Page' ? 'selected' : '' }} value ="Inner Page">Inner Page</option>
						<option {{ ($ad_price->ads_position) == 'Inner_Color' ? 'selected' : '' }} value ="Inner_Color">Inner Page (Color)</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Rate Per I/C</label>
				<div class="col-sm-12 col-md-10">
					<input class="form-control" type="text" name="rate" value="{{$ad_price->price}}" placeholder="Rate Per I/C">
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
</div>
@endsection

@section('Script')
@endsection