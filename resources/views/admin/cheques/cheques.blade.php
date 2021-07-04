@extends('master')

@section('Title')
Cheques
@endsection

@section('Style')
@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>

<center> <h5>TBT CHEQUES LIST</h5> </center> <br>
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N:</th>
				<th>GD No</th>	
				<th>Bank Name</th>	
				<th>Cheque Amount</th>	
				<th class="text-center" >Action</th>
		    </tr>
		  </thead>
		  <tbody>
		     	@foreach($cheques as $cheque)
					<tr>
						<td>{{$cheque->id}}</td>	
						<td>{{$cheque->gd_no}}</td>			
						<td>{{$cheque->bank_name}}</td>			
						<td>{{$cheque->cheque_amount}}</td>			
						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('cheque').'/'.$cheque->id.'/edit'}}" method="get">	
										<button class="btn btn-outline-dark">Edit</button>				
									</form>
								</div>
								<div class="delete">
									<form action="{{url('cheque') .'/'.$cheque->id}}" method="post">
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