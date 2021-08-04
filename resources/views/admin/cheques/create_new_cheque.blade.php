@extends('master')

@section('Title')
New Cheque
@endsection

@section('Style')
@endsection

@section('Content')

<center><h5>INSERT NEW CHEQUE</h5></center><br>
<div class="pd-20 card-box mb-30">
	@if(session()->has('error'))    
	    <center><h5> <span style="color: red;">{{ session()->get('error') }}</span> </h5></center> <br>
	   @endif

	<form action="cheque" method="post">
		@csrf
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">GD No</label>
			<div class="col-sm-12 col-md-10">
				<!-- <input class="form-control typeahead" type="text" id="gd_no" name="gd_no" value="{{old('gd_no')}}" placeholder="GD No"> -->
				<input type="hidden" name="correspondent_id" id="correspondent_id">
				<select class="form-control custom-select2 typeahead" id="gd_no" name="gd_no" required>
					<option value="" selected disabled>Select GD-No</option>
					@foreach ($gd_no as $gd)
					<option value="{{$gd->gd_no}}">{{$gd->gd_no}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Bank Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="bank_name" value="{{old('bank_name')}}" placeholder="Bank Name" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Cheque Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" id="cheque_amount" name="cheque_amount" value="{{old('cheque_amount')}}" placeholder="Cheque Amount" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Cheque Number</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="cheque_number" value="{{old('cheque_number')}}" placeholder="Cheque Number" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Payable Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="payable_amount" id="payable_amount" value="{{old('payable_amount')}}" placeholder="Payable Amount" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">AIT Cut</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="ati_cut" id="ait_cut" value="{{old('ati_cut')}}" placeholder="AIT" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Commission</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="commission" id="commission" value="{{old('commission')}}" placeholder="Commission" disabled>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script type="text/javascript">
  var path = "{{ url('gd-search-query') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
          return $.get(path, { query: query }, function (data) {
              return process(data);
          });
        }
    });

   jQuery("#gd_no").on('change',function(e){
    e.preventDefault();
    // var gd_no = $("#gd_no").val();
    var gd_number = $("#gd_no :selected").val();
    $.ajax({
      url:"/gdprice",
      type:"GET",
      data:{gd_no:gd_number},
      success: function(res){
      	console.log(res);
      	if(res.status==true){
        	$("#payable_amount").val(res.data.amount);
        	$("#correspondent_id").val(res.data.correspondent_id);
      	}
     
      }
    });

  	});

   jQuery("#cheque_amount").on('blur',function(e){
		e.preventDefault();
		var chequeAmount = $("#cheque_amount").val();
		if (chequeAmount != "") {
			$("#commission").empty();
			$("#ait_cut").empty();
			
			var gd_number = $("#gd_no :selected").val();
			if (gd_number != "") {
		    $.ajax({
		      url:"/gdprice",
		      type:"GET",
		      data:{gd_no:gd_number},
		      success: function(res){
		      	console.log(res);
		      	if(res.status==true){
		      		// var payableAmount = res.data.amount;
		        	$("#ait_cut").val(res.data.amount - chequeAmount);
		      	}
		      	if(res.data.upazila_id!=494){
		        	$("#commission").val(chequeAmount * 0.3);
		      	}else{
		      		$("#commission").val(chequeAmount * 0.35);
		      	}
		     
		      }
		    });
			}			
		}else{
			// $("#commission").empty();
			$("#commission").val("");
			$("#ait_cut").val("");
			}

  });

</script>
@endsection