@extends('master')

@section('Title')
TBT Ads
@endsection

@section('Style')
@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>

<center> <h5>TBT ADS LIST</h5> </center> <br>
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>Name</th>
				<th>Upazila</th>
				<th>District</th>	
				<th>Publishing Date</th>	
				<th>GD No</th>	
				<th>Client</th>	
				<th>Amount</th>	
				<th>Status</th>	
				<th class="text-center" >Action</th>
		    </tr>
		  </thead>
		  <tbody>
		     	@foreach($ad as $ad)
					<tr>
						<td>{{$ad->id}}</td>	
						<td><a href="{{url('ad').'/'.$ad->id}}">{{$ad->correspondent_name}}</a></td>
						<td>{{$ad->upazila}}</td>
						<td>{{$ad->district}}</td>				
						<td>{{$ad->publishing_date}}</td>			
						<td>{{$ad->gd_no}}</td>			
						<td>{{$ad->client}}</td>			
						<td>{{$ad->amount}}</td>			
						<td>{{$ad->payment_status}}</td>			

						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('ad').'/'.$ad->id.'/edit'}}" method="get">	
										<button class="btn btn-outline-dark">Edit</button>				
									</form>
								</div>
								<div class="delete">
									<form action="{{url('ad') .'/'.$ad->id}}" method="post">
										@csrf
										{{ method_field('delete') }}
										<button class="btn btn-outline-danger">Delete</button>				
									</form>
								</div>
							</div>
						</td>
					</tr>
				@endforeach

		  </tbody>
		</table>
	</div>
</div>

@endsection
@section('Script')
@endsection