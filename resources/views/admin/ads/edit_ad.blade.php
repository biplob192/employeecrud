@extends('master')

@section('Title')
Edit Ad
@endsection

@section('Style')
@endsection

@section('Content')

<center>
	<h5>UPDATE AD DATA</h5> <br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
</center>
<div class="pd-20 card-box mb-30">
	<form action="{{url('/ad').'/'.$ad->id}}" method="post">
		{{ method_field('PUT') }}
		@csrf
		<input type="hidden" name="id" value="{{$ad->id}}">
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Name</label>
			<div class="col-sm-12 col-md-10">
				<input type="hidden" name="corr_id" id="corr_id" value="{{$ad->correspondent_id}}">
				<select class="form-control custom-select2" id="corr_name" name="corr_name" required>					
					@foreach ($correspondents as $correspondent)
					<option {{($ad->correspondent_id) == $correspondent->id ? 'selected' : '' }} value="{{$correspondent->name}}">{{$correspondent->name}}, {{$correspondent->upazila_name}}</option>
					@endforeach
				<select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Type</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_type">
					<option {{ ($ad->ad_type) == 'Govt' ? 'selected' : '' }} value ="Govt">Government)</option>
					<option {{ ($ad->ad_type) == 'Private' ? 'selected' : '' }} value ="Private">Private</option>
					<option {{ ($ad->ad_type) == 'Commercial' ? 'selected' : '' }} value ="Commercial">Commercial</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Position</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_position">
					<option {{ ($ad->ads_position) == 'Front Page' ? 'selected' : '' }} value ="Front Page">Front Page (Color)</option>
					<option {{ ($ad->ad_position) == 'Back Page' ? 'selected' : '' }} value ="Back Page">Back Page (Color)</option>
					<option {{ ($ad->ad_position) == 'Inner Page' ? 'selected' : '' }} value ="Inner Page">Inner Page</option>
					<option {{ ($ad->ad_position) == 'Inner_Color' ? 'selected' : '' }} value ="Inner_Color">Inner Page (Color)</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Publishing Date</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control date-picker" type="text" name="publishing_date" value="{{$ad->publishing_date}}" placeholder="Publishing Date">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Rate I/C</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="rate" value="{{$ad->rate}}" placeholder="Rate I/C" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Extra Charge</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="extra_charge" value="{{$ad->extra_charge}}" placeholder="Extra Charge">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Division Name</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control custom-select2" name="division" required>					
					@foreach ($divisions as $division)
					<option {{($ad->division_id) == $division->division_id ? 'selected' : '' }} value="{{$division->division_id}}">{{$division->division_name}}</option>
					@endforeach
				<select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">District Name</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control custom-select2" name="district" required>					
					@foreach ($districts as $district)
					<option {{($ad->district_id) == $district->district_id ? 'selected' : '' }} value="{{$district->district_id}}">{{$district->district_name}}</option>
					@endforeach
				<select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Upazila Name</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control custom-select2" name="upazila" required>					
					@foreach ($upazilas as $upazila)
					<option {{($ad->upazila_id) == $upazila->upazila_id ? 'selected' : '' }} value="{{$upazila->upazila_id}}">{{$upazila->upazila_name}}</option>
					@endforeach
				<select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Client</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="client" value="{{$ad->client}}" placeholder="Client Name">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">GD No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="gd_no" value="{{$ad->gd_no}}" placeholder="GD No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Order No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="order_no" value="{{$ad->order_no}}" placeholder="Order No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Inch</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="inch" value="{{$ad->inch}}" placeholder="Inch" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Colum</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="colum" value="{{$ad->colum}}" placeholder="Colum">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Total Size</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="total_size" value="{{$ad->total_size}}" placeholder="Total Size" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="amount" value="{{$ad->amount}}" placeholder="Amount" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Payment Status</label>
			<div class="col-sm-12 col-md-10">
				<input {{ ($ad->payment_status) == '1' ? 'checked' : '' }} type="radio" id="paid" name="payment_status" value="1"><label for="paid"> <span style="color:green; font-weight: bold;" >PAID</span> </label>
				<input {{ ($ad->payment_status) == '0' ? 'checked' : '' }} type="radio" id="un_paid" name="payment_status" value="0" ><label for="un_paid"><span style="color:red; font-weight: bold;" >UN-PAID</span></label>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Update Data</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="submit" value="Submit Form">
			</div>
		</div>
	</form>
</div>
@endsection

@section('Script')
<script type="text/javascript">
	jQuery("#corr_name").on('change',function(e){
    e.preventDefault();
    var corr_name = $("#corr_name :selected").val();
    console.log(corr_name);
    $.ajax({
      url:"/address",
      type:"GET",
      data:{corr_name:corr_name},
      success: function(res){
      	console.log(res);
      	if(res.status==true){
        	$("#corr_id").val(res.data.id);        	
      	}     
      }
    });

  	});
</script>
@endsection