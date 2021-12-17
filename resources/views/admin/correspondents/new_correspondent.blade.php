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
				<input class="form-control" type="text" name="name" value="{{old('name')}}" oninput="this.value = this.value.toUpperCase()" placeholder="Correspondent Name Here" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Division Name</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control " id="div_name" name="div_name">
					<option value="" selected disabled>Select Division</option>					
					@foreach ($divisions as $division)
					<option value="{{$division->division_id}}">{{$division->division_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">District</label>
			<div class="col-sm-12 col-md-10">
				<select name="district" id="district" class="form-control" required></select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Upazila</label>
			<div class="col-sm-12 col-md-10">
				<select name="upazila" id="upazila" class="form-control" required></select>
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
				<input class="form-control" type="tex" name="mobile" value="{{old('mobile')}}" placeholder="Entre Mobile No" required>
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
			<label class="col-sm-12 col-md-2 col-form-label">Appointed Date</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control date-picker" type="text" name="appointed_date" value="{{old('appointed_date')}}" placeholder="Appointed Date" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Initial Balance</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="number" name="initial_balance" value="{{old('initial_balance')}}" placeholder="Initial Balance" required>
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
<script type=text/javascript>
  $('#div_name').change(function(){
  var divID = $(this).val();  
  if(divID){
    $.ajax({
      type:"GET",
      url:"{{url('getDistrict')}}?division_id="+divID,
      success:function(res){        
      if(res){
        $("#district").empty();
        $("#district").append('<option>Select district</option>');
        $.each(res,function(key,value){
          $("#district").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#district").empty();
      }
      }
    });
  }else{
    $("#district").empty();
    $("#upazila").empty();
  }   
  });
  
  $('#district').on('change',function(){
  var districtID = $(this).val();  
  if(districtID){
    $.ajax({
      type:"GET",
      url:"{{url('getUpazila')}}?district_id="+districtID,
      success:function(res){        
      if(res){
        $("#upazila").empty();
 				$("#upazila").append('<option>Select Upazila</option>');
        $.each(res,function(key,value){
          $("#upazila").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#upazila").empty();
      }
      }
    });
  }else{
    $("#upazila").empty();
  }
    
  });
</script>
@endsection