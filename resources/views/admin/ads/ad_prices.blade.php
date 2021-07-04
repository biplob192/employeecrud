@extends('master')
@section('Title')
Ad Prices
@endsection

@section('Style')

@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>


<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>Ads Type</th>
				<th>Position</th>
				<th>Rate I/C</th>	
				<th class="text-center" >Action</th>
		    </tr>
		  </thead>
		  <tbody>

		     	@foreach($ad_prices as $ad_prices)
					<tr>
						<td>{{$ad_prices->id}}</td>			
						<td>{{$ad_prices->ads_type}}</td>
						<td>{{$ad_prices->ads_position}}</td>
						<td>{{$ad_prices->price}}</td>
						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('ad_price').'/'.$ad_prices->id.'/edit'}}" method="get">			
										<button class="btn btn-outline-dark">Edit</button>				
									</form>
								</div>
								<div class="delete">
									<form action="{{url('ad_price') .'/'.$ad_prices->id}}" method="post">
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