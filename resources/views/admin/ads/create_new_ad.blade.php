@extends('master')

@section('Title')
New Ad
@endsection

@section('Style')
@endsection

@section('Content')

<center><h5>INSERT NEW AD</h5></center><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
<div class="pd-20 card-box mb-30">
	<form action="ad" method="post">
		@csrf
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Correspondent Name Here">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Division</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="division" value="{{old('division')}}" placeholder="Division Here">
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
			<label class="col-sm-12 col-md-2 col-form-label">Publishing Date</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control date-picker" type="text" name="publishing_date" value="{{old('publishing_date')}}" placeholder="Publishing Date">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Rate I/C</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="rate" value="{{old('rate')}}" placeholder="Rate I/C" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Extra Charge</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="extra_charge" value="{{old('extra_charge')}}" placeholder="Extra Charge">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Client</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="text" name="client" value="{{old('client')}}" placeholder="Client">
			</div>
		</div>
			<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">GD No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="gd_no" value="{{old('gd_no')}}" placeholder="GD No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Order No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="text" name="order_no" value="{{old('order_no')}}" placeholder="Order No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Inch</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" value="" type="text" name="inch" value="{{old('inch')}}" placeholder="Inch">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Colum</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="colum" value="{{old('colum')}}" placeholder="Colum">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Total Size</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="total_size" value="{{old('total_size')}}" placeholder="Total Size" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="amount" value="{{old('amount')}}" placeholder="Amount" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Payment Status</label>
			<div class="col-sm-12 col-md-10">
				<input type="radio" id="paid" name="payment_status" value="1"><label for="paid"> <span style="color:green; font-weight: bold;" >PAID</span> </label>
				<input type="radio" id="un_paid" name="payment_status" value="0" checked><label for="un_paid"><span style="color:red; font-weight: bold;" >UN-PAID</span></label>
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