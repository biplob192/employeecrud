@extends('master')

@section('Title')
Daily Ads
@endsection

@section('Style')
@endsection

@section('Content')

<center><h5>DAILY AD REPORT</h5></center><br>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   @endforeach
<div class="pd-20 card-box mb-30">
    <form action="daily_ads" method="post">
		@csrf
        <div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Create Daily Report</label>
			<div class="col-sm-12 col-md-5">
				<input type="hidden" name="corr_id" id="corr_id" value="">
                <input class="form-control date-picker" type="text" name="publishing_date" value="{{old('publishing_date')}}" placeholder="Select date here" required>
			</div>
			<div class="col-sm-12 col-md-5" id="calculation_type_div">
				<input class="form-control" type="submit" value="Create Report" formtarget="_blank">
			</div>
		</div>
    </form>
</div>
@endsection

@section('Script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$("#calculation_type").select2();
	$("#calculation_type").select2({
	    minimumResultsForSearch: Infinity
	});

	$("#custom_charge_div").hide();
	$("#custom_commission_div").hide();
	$('#calculation_type').on('change', function(e){
		e.preventDefault();

		var calculation_type = $("#calculation_type :selected").val();
		console.log(calculation_type);
		if(calculation_type=='custom'){
			$("#custom_charge_div").show();
			$("#custom_commission_div").show();
			$("#extra_charge").val(null);
			$("#extra_charge_div").hide();
		}
		if(calculation_type=='regular'){
			$("#extra_charge_div").show();
			$("#custom_charge").val(null);
			$("#custom_commission").val(null);
			$("#custom_charge_div").hide();
			$("#custom_commission_div").hide();
		}
	});

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

</script>
@endsection




