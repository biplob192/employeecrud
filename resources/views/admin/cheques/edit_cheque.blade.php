@extends('master')

@section('Title')
Edit Cheque
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
	<form action="{{url('/cheque').'/'.$cheque->cheque_id}}" method="post">
		{{ method_field('PUT') }}
		@csrf
		<input type="hidden" name="id" value="{{$cheque->cheque_id}}">

		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">GD No</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="gd_no" value="{{$cheque->gd_no}}" placeholder="GD No">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Bank Name</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="bank_name" value="{{$cheque->bank_name}}" placeholder="Bank Name">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Cheque Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="cheque_amount" value="{{$cheque->cheque_amount}}" placeholder="Cheque Amount" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Payable Amount</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="amount" value="{{old('amount')}}" placeholder="Payable Amount" disabled>
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
@endsection