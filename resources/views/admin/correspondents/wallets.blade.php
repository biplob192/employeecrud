@extends('master')

@section('Title')
Wallets
@endsection

@section('Style')
@endsection

@section('Content')
<!-- <center> <h5>CORRESPONDENT WALLETS</h5> </center> <br> -->

<div class="container-md">
	<div class="row align-items-center">
		<div class="col align-self-center"></div>
		<div class="col-md-5 align-self-center"><center> <h5>CORRESPONDENT WALLETS</h5> </center> <br></div>
		<div class="col align-self-center">
			<div class="" style="float: right;">
			  	<button class="btn btn-dark" data-toggle="modal" data-target="#walletOverwriteModal" id="balance_or">Overwrite Balance</button>
			</div>
		</div>
	</div>			
</div>
@include('inc.walletOverwriteModal')
<br>
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>Name</th>
				<th>Upazila</th>
				<th>District</th>
				<th class="text-center">Balance (Tk)</th>
		    </tr>
		  </thead>
		  <tbody>

		     	@foreach($wallets as $wallet)
					<tr>						
						<td>{{$wallet->id}}</td>			
						<td>{{$wallet->name}}</td>		
						<td>{{$wallet->upazila_name}}</td>		
						<td>{{$wallet->district_name}}</td>		
						<td class="text-center">{{$wallet->credit}}</td>
					</tr>
				@endforeach

		  </tbody>
		</table>
	</div>
</div>
@endsection

@section('Script')
@endsection
