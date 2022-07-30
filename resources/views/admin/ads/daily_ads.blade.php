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
    <form action="daily_ads_report" method="post">
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

@endsection




