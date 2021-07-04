@extends('master')

@section('Title')
Correspondents
@endsection

@section('Style')
@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>
<center> <h5>TBT CORRESPONDENT LIST</h5> </center> <br>

<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>Name</th>
				<th>District</th>
				<th>Upazila</th>	
				<th>Mobile</th>	
				<th class="text-center" >Action</th>
		    </tr>
		  </thead>
		  <tbody>

		     	@foreach($correspondent as $correspondent)
					<tr>						
						<!-- <td>{{$correspondentCount}}</td>			 -->
						<td>{{$correspondent->id}}</td>			
						<td><a href="{{url('correspondent').'/'.$correspondent->id}}"> <strong>{{$correspondent->name}}</strong> </a></td>	
						<td>{{$correspondent->district}}</td>			
						<td>{{$correspondent->upazila}}</td>			
						<td>{{$correspondent->mobile}}</td>			

						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('correspondent').'/'.$correspondent->id.'/edit'}}" method="get">	
										<button class="btn btn-outline-dark">Edit</button>				
									</form>
								</div>
								<div class="delete">
									<form action="{{url('correspondent') .'/'.$correspondent->id}}" method="post">
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
