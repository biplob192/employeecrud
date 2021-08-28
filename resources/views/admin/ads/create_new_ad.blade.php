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
				<input type="hidden" name="corr_id" id="corr_id" value="">
				<select class="form-control custom-select2" id="corr_name" name="corr_name" required>
					<option value="" selected disabled>Select Name</option>
					@foreach ($correspondents as $correspondent)
					<option value="{{$correspondent->name}}">{{$correspondent->name}}, {{$correspondent->upazila_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Division Name</label>
			<div class="col-sm-12 col-md-10">
				<input type="hidden" name="div_id" id="div_id">
				<select class="form-control " id="div_name" name="div_name" disabled>
					<option value="" selected disabled></option>
					@foreach ($division_names as $division_name)
					<option value="{{$division_name->division_name}}">{{$division_name->division_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">District Name</label>
			<div class="col-sm-12 col-md-10">
				<input type="hidden" name="dist_id" id="dist_id">
				<select class="form-control " id="dist_name" name="dist_name" disabled>
					<option value="" selected disabled></option>
					@foreach ($district_names as $district_name)
					<option value="{{$district_name->district_name}}">{{$district_name->district_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Upazila Name</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control custom-select2" id="upa_name" name="upazila_id" required>
					<option value="" selected disabled></option>
					@foreach ($upazila_names as $upazila_name)
					<option value="{{$upazila_name->upazila_id}}">{{$upazila_name->upazila_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Type</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_type" required>
					<option value ="" selected disabled>Select Ad Type</option>
					<option value ="Govt">Government</option>
					<option value ="Private">Private</option>
					<option value ="Commercial">Commercial</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Ad Position</label>
			<div class="col-sm-12 col-md-10">
				<select class="custom-select col-12" name="ad_position" required>
					<option value ="" selected disabled>Select Ad Position</option>
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
				<input class="form-control date-picker" type="text" name="publishing_date" value="{{old('publishing_date')}}" placeholder="Publishing Date" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Client</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="client" value="{{old('client')}}" placeholder="Client" required>
			</div>
		</div>
			<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">GD No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" id="gd_no" name="gd_no" value="{{old('gd_no')}}" placeholder="GD No" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Order No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="order_no" value="{{old('order_no')}}" placeholder="Order No" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Inch</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="number" id="inch" name="inch" value="{{old('inch')}}" placeholder="Inch" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Colum</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="number" id="colum" name="colum" value="{{old('colum')}}" placeholder="Colum" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Extra Charge</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="extra_charge" value="{{old('extra_charge')}}" placeholder="Extra Charge" required>
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
			<label class="col-sm-12 col-md-2 col-form-label">Total Size</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" id="total_size" name="total_size" value="{{old('total_size')}}" placeholder="Total Size" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Rate I/C</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" id="rate" name="rate" value="{{old('rate')}}" placeholder="Rate I/C" disabled>
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="amount" value="{{old('amount')}}" placeholder="Amount" disabled>
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

<script type="text/javascript">
	jQuery("#corr_name").on('change',function(e){
    e.preventDefault();
    // var gd_no = $("#gd_no").val();
    var corr_name = $("#corr_name :selected").val();
    $.ajax({
      url:"/address",
      type:"GET",
      data:{corr_name:corr_name},
      success: function(res){
      	console.log(res);
      	if(res.status==true){
        	$("#div_name").val(res.data.division_name);
        	$("#div_id").val(res.data.division_id);
        	$("#dist_name").val(res.data.district_name);
        	$("#dist_id").val(res.data.district_id);
        	$("#corr_id").val(res.data.id);
        	// $("#div_name").val(res.data.division_name).attr('selected','selected');
        	// $("#div_name option:contains('Dhaka')").attr("selected",true);
        	// $("#div_name option:contains('"+res.data.division_name+"')").attr("selected",true);
        	// $("#dist_name option:contains('"+res.data.district_name+"')").attr("selected",true);
        	
      	}
     
      }
    });

  	});

	function addSize(){
		$("#total_size").val("");
		var inch = $("#inch").val();
		var colum = $("#colum").val();
		if(inch != "" && colum != ""){
		var size = inch * colum;
		$("#total_size").val(size);
		}
	}

	jQuery("#colum").on('blur',function(e){
    e.preventDefault();
    addSize();
  });

  jQuery("#inch").on('blur',function(e){
    e.preventDefault();
    addSize();
  });

</script>
@endsection




