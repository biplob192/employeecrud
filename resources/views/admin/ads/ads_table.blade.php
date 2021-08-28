<table id="table2excel" class="row-border hover">
	<thead>		
		<tr class="noExl">
		</tr>
		<tr>
			<th>Published</th>
			<th>Name</th>
			<th>Address</th>			
			<th class="text-center">GD</th>	
			<th>Client</th>	
			<th class="text-center">Amount</th>	
			<th class="text-center">Status</th>	
			@hasanyrole('super_admin|admin')
				<th class="text-center">Action</th>
			@endhasanyrole
		</tr>
	</thead>
	<tbody>
		@foreach($ad as $ad)
		<tr>	
			<td>{{$ad->publishing_date}}</td>
			<td><a href="{{url('ad').'/'.$ad->id}}" target="_blank">{{$ad->correspondent_name}}</a></td>
			<td>{{$ad->upazila_name}}, {{$ad->district_name}}</td>						
			<td class="text-center">{{$ad->gd_no}}</td>			
			<td>{{$ad->client}}</td>			
			<td class="text-center">{{$ad->amount}}</td>			
			<td class="text-center">
				@if($ad->payment_status ==1)
				<span class="badge badge-pill badge-success" style="font-size: 15px;">-Paid-</span>
				@else
				<span class="badge badge-pill badge-danger" style="font-size: 15px;">Unpaid</span>
				@endif
			</td>			

			@hasanyrole('super_admin|admin')
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
			@endhasanyrole
		</tr>
			@endforeach

	</tbody>
</table>