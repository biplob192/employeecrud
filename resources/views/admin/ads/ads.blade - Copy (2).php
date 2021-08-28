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
<div class="row">
	<div class="col"></div>
	<div class="col">
		<center> <h5>TBT ADS LIST</h5> 
	</div>
	<div class="col">
		<h6><p style="line-height: 1.6; text-align: right;">Total Ads: {{$count}} || Paid: {{$totalpaid}} || UnPaid: {{$totalunpaid}}</p></h6>
	</div>	
</div>
<div class="pd-20 card-box mb-30">
<div class="row">
	<div class="col">
		
			<form action="{{url('ads')}}" method="GET">
				
				<div class="form-row">
					<div class="col-3">
						<select class="form-control custom-select2" id="corr_id" name="corr_id">
							<option value="" selected disabled>Select Name</option>
							@foreach (\App\Models\Correspondent::select('id','name','upazila_name')
							->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
							->get() as $name)
							<option value="{{$name->id}}">{{$name->name}}, {{$name->upazila_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-3">
						<select class="form-control" id="payment_status" name="payment_status">
							<option value="2" selected>All Ads</option>		
							<option value="1">Paid</option>
							<option value="0">UnPaid</option>
							
						</select>
					</div>
					 <div class="col-3">
					      <input class="form-control datetimepicker-range" id="fromTo" type="text" name="from" placeholder="From - To">
					 </div>
					<div class="col-3" >
						<input class="form-control" type="submit"  value="Search">
					</div>
				</div>
				@if(session()->has('error'))    
				<br>
				<center><h5> <span style="color: red">{{ session()->get('error') }}</span> </h5></center>
				@endif
			</form>
	</div>
</div>


<div class="table-responsive" id="ads_list">
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
					<th class="text-center">Status</th>	
					<th class="text-center">Action</th>
				</tr>
		</thead>
		<tbody>
			@foreach($ad as $ad)
			<tr>
				<td>{{$ad->id}}</td>	
				<td><a href="{{url('ad').'/'.$ad->id}}" target="_blank">{{$ad->correspondent_name}}</a></td>
				<td>{{$ad->upazila_name}}</td>
				<td>{{$ad->district_name}}</td>				
				<td>{{$ad->publishing_date}}</td>			
				<td>{{$ad->gd_no}}</td>			
				<td>{{$ad->client}}</td>			
				<td>{{$ad->amount}}</td>			
				<td>
					@if($ad->payment_status ==1)
					<span class="badge badge-pill badge-success" style="font-size: 15px;">-Paid-</span>
					@else
					<span class="badge badge-pill badge-danger" style="font-size: 15px;">Unpaid</span>
					@endif
				</td>			

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
	<div class="table-responsive" id="filter_ads" style="display:none;">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Name</th>
					<th>Upazila</th>
					<th>District</th>	
					<th>Publishing Date</th>	
					<th>GD No</th>	
					<th>Client</th>	
					<th>Amount</th>	
					<th class="text-center">Status</th>	
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="display_filter_ads">

			</tbody>
		</table>
	</div>
</div>
</div>

@endsection

@section('Script')
<script type="text/javascript">
	jQuery("#search_btn").on('click',function(e){		
		e.preventDefault();
		var corr_id = $("#corr_id :selected").val();
		var payment_status = $("#payment_status :selected").val();
		// console.log(corr_id);
		// console.log(payment_status);
		$.ajax({
			url:"/ads",
			type:"GET",
			data:{corr_id:corr_id,payment_status:payment_status},
			success: function(response){	      	
				if(response.status==true){
					console.log(response);
					console.log(response.data);
					console.log(response.status);
					$("#ads_list").hide();
					$("#filter_ads").show();
					$("tr:has(td)").remove();
					var trHTML = '';
					$.each(response.data, function (i, item) {
						let status = '<span class="badge badge-pill badge-danger" style="font-size: 15px;">Unpaid</span>';
						if(item.payment_status == 1){
							status = '<span class="badge badge-pill badge-success" style="font-size: 15px;">-Paid-</span>';
						}
						trHTML += 	'<tr><td>' + item.id +
						'</td><td>' + item.correspondent_name + 
						'</td><td>' + item.upazila_name + 
						'</td><td>' + item.district_name + 
						'</td><td>' + item.publishing_date + 
						'</td><td>' + item.gd_no + 
						'</td><td>' + item.client + 
						'</td><td>' + item.amount + 						
						'</td><td>' + status +
						'</td><td>' + 
						'<div class="menu">' +
							'<div class="edit">' +
								'<form action="/ad/'+ item.id +'/edit" method="get">' +
								'<button class="btn btn-outline-dark">Edit</button>' +
								'</form>' +
							'</div>' +
							'<div class="delete">' +
								'<form action="/ad/'+ item.id +'" method="post">' +
								'@csrf' +
								'{{ method_field('delete') }}' +
								'<button class="btn btn-outline-danger">Delete</button>' +			
								'</form>' +
							'</div>' +
						'</div>' +
						'</td></tr>';
					});
					$('#display_filter_ads').append(trHTML);
				}
			}
		});
	});
</script>
@endsection