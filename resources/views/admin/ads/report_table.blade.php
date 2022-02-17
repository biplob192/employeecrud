<table id="table2excel" class="row-border hover">
	<thead>		
		<tr class="noExl">
		</tr>
		<tr>
			<th class="text-center" style="display:none">SN</th>
			<th class="text-center">Published Ads</th>
			<th>Total Size</th>
			<th class="text-center">GD No</th>			
			<th class="text-center">Amount</th>	
			<th class="text-center">Status</th>	
		</tr>
	</thead>
	<tbody>
		@foreach($ad as $ad)
		<tr>	
			<td class="text-center" style="display:none">{{$ad->id}}</td>
			<td class="text-center">{{date('d-m-Y', strtotime($ad->publishing_date))}}</td>
			<td><a href="{{url('ad').'/'.$ad->id}}" target="_blank">{{$ad->correspondent_name}}</a></td>
			<td class="text-center">{{$ad->gd_no}}</td>			
			<td class="text-center">{{$ad->amount}}</td>			
			<td class="text-center">
				@if($ad->payment_status ==1)
				<span class="badge badge-pill badge-success" style="font-size: 15px;">-Paid-</span>
				@else
				<span class="badge badge-pill badge-danger" style="font-size: 15px;">Unpaid</span>
				@endif
			</td>			
		</tr>
			@endforeach		
	</tbody>
</table>