@extends('master')

@section('Title')
Wallets
@endsection

@section('Style')
@endsection

@section('Content')

<div class="container-md">
	<div class="row align-items-center">
		<div class="col align-self-center"></div>
		<div class="col-md-5 align-self-center">
			<center> 
				<h5>CORRESPONDENT WALLETS</h5>
			</center>
		</div>
		<div class="col align-self-center">
			<div class="" style="float: right;">
			  	<button class="btn btn-dark" data-toggle="modal" data-target="#walletOverwriteModal" id="balance_or">Overwrite Balance</button>
			</div>
		</div>
	</div>			
</div>
@include('inc.walletOverwriteModal')
<br>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>Name</th>
				<th>Upazila</th>
				<th>District</th>
				<th class="text-center">Previous Due Bill</th>
				<th class="text-center">Corr. Balance</th>
		    </tr>
		  </thead>
		  <tbody id="myTable">

		     	@foreach($wallets as $wallet)
					<tr>						
						<td>{{$wallet->id}}</td>			
						<td>{{$wallet->name}}</td>		
						<td>{{$wallet->upazila_name}}</td>		
						<td>{{$wallet->district_name}}</td>		
						<td class="text-center">{{$wallet->previous_due}}</td>
						<td class="text-center">{{$wallet->credit}}</td>
					</tr>
				@endforeach

		  </tbody>
		</table>
	</div>
</div>
@endsection

@section('Script')
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
