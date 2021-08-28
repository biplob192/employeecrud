@extends('master')

@section('Title')
Commission
@endsection

@section('Style')
@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>

<div class="container-md">
	<div class="row align-items-center">
		<div class="col align-self-center"></div>
		<div class="col-md-5 align-self-center"><center> <h5>COMMISSION HISTORY</h5> </center> <br></div>
		<div class="col align-self-center">
			<div class="" style="float: right;">				
			  	<button class="btn btn-dark" data-toggle="modal" data-target="#CommissionModal" id="commission">New Commission</button>			
			</div>
		</div>
	</div>			
</div>

@if(session()->has('error'))    
	    <center><h5> <span style="color: red;">{{ session()->get('error') }}</span> </h5></center> <br>
	   @endif

@include('inc.chequeInsertModal')

<br>
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      	<th>S/N</th>
		      	<th>Name & Address</th>
						<th>Previous</th>	
						<th>Amount</th>	
						<th>Current</th>	
						<th class="text-center">Date</th>	
						<th class="text-center">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		     	@foreach($commissions as $commission)
					<tr>
						<td>{{$commission->commission_id}}</td>	
						<td>{{$commission->name}}, {{$commission->upazila_name}}</td>		
						<td>{{$commission->previous_amount}}</td>
						<td>{{$commission->commission_amount}}</td>
						<td>{{$commission->current_amount}}</td>
						<td class="text-center">{{date('d-m-Y', strtotime($commission->created_at))}}</td>
						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('commission').'/'.$commission->commission_id.'/edit'}}" method="get">	
										<button class="btn btn-outline-dark">Edit</button>				
									</form>
								</div>
								<div class="delete">
									<form action="{{url('commission') .'/'.$commission->commission_id}}" method="post">
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
	<script>
		// jQuery("#CommissionModal").on('load',function(e){
		$(document).ready(function(){
			// e.preventDefault();		
			// var gd_number = $("#gd_no :selected").val();
			$.ajax({
				url:"/getcorrname",
				type:"GET",
				// data:{gd_no:gd_number},
				success: function(res){
					console.log(res);
					if(res){
						$("#corr_name").empty();
						$("#corr_name").append('<option disabled selected>Select Correspondent</option>');
				        $.each(res,function(key,value){
				          $("#corr_name").append('<option value="'+key+'">'+value+'</option>');
				        });
					}else{
						$("#corr_name").empty();
					}
				}
			});

		});

		jQuery("#corr_name").on('change',function(e){
	    e.preventDefault();
	    var corr_name = $("#corr_name :selected").val();
	    $("#corr_id").val(corr_name);	  
	    console.log(corr_name);

		    // $.ajax({
		    //   url:"/getCorrid",
		    //   type:"GET",
		    //   data:{corr_name:corr_name},
		    //   success: function(res){
		    //   	console.log(res);
		    //   	if(res.status==true){	  
		    //     	$("#corr_id").val(res.data.id);	        	
		    //   	}
		    //   }
		    // });

	  });

		jQuery("#corr_name2").on('change',function(e){
	    e.preventDefault();
	    var corr_name2 = $("#corr_name2 :selected").val();
	    console.log(corr_name2);
	    $("#correspondent_id").val(corr_name2); 
	  });
	
		// $(document).ready(function(){
		//   $("#commission").click(function(){
		//     $("#CommissionModal").modal("show");
		//   });
		  
		// });
	</script>
@endsection