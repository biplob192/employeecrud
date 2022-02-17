<?php
	$data = ['a'=>1, 'b'=>2, 'c'=>3];
	$data2 = 2;
?>
@extends('master')

@section('Title')
TBT Dashboard
@endsection

@section('Style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="{{asset('Backend')}}/vendors/scripts/jquery.printpage.js"></script>
@endsection

@section('Content')
<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
	.link-style{text-decoration: none; color: #202342; cursor: pointer;}
	.link-style:hover{color: #202342;}
</style>
<!-- <div class="row">
	<div class="col">
		<center>
			<h5>
				CORRESPONDENT REPORT<br>
			</h5>
			
		</center>
	</div>
</div>
-->
<div class="row">
	<div class="col-auto">
		<div class="row">
			<div class="col">
				<h6>{{ ($duration) ? 'Period: '.$duration : '' }}</h6>
			</div>
		</div>	
	</div>
	<div class="col align-self-center text-right" style="padding-bottom: 0.5rem">
		<h6><p style="line-height: 1.6; text-align: right;">Ads: {{$total}} ({{$count}}) {{$totalSize}}" || Paid: {{$totalPaid}} ({{$countPaid}}) || UnPaid: {{$totalUnPaid}} ({{$countUnPaid}}) || Cheque: {{$chequeAmount}} ({{$chequeCount}})</p></h6>	

	</div>
	<div class="col-auto text-right">
		<a href="{{$corr_id ? url('/report') : '#'}}" target="{{$corr_id ? '_blank' : ''}}" class="btnprn btn">
			<button class="btn btn-outline-dark">Process Report</button>
		</a>
		<!-- <a id="ads_list" href="#" class="button button-primary">Print container AAA</a> -->

		<script type="text/javascript">
			$(document).ready(function(){
				$('.btnprn').printPage();
			});
		</script>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="row">
		<div class="col">		
			<form action="{{url('dashboard')}}" method="GET">				
				<div class="form-row">
					<div class="col-4">
						<select class="form-control custom-select2" id="corr_id" name="corr_id" required>
							<option value="" selected disabled>Select Name</option>
							@foreach (\App\Models\Correspondent::select('id','name','upazila_name')
							->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
							->get() as $name)
							<option value="{{$name->id}}">{{$name->name}}, {{$name->upazila_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col">
						<select class="form-control" id="payment_status" name="payment_status">
							<option value="4" selected>All Ads</option>		
							<option value="1">Paid</option>
							<option value="0">UnPaid</option>								
							<option value="2">Inside Dhaka</option>								
							<option value="3">Outside Dhaka</option>								
						</select>
					</div>
					<div class="col">
						<input class="form-control datetimepicker-range" id="fromTo" type="text" name="from" placeholder="From - To">
					</div>
					<div class="col" >
						<input class="form-control" type="submit"  value="Search">
					</div>
				</div>
				@if(session()->has('error'))    
				<br>
				<center><h5> <span style="color: red">{{ session()->get('error') }}</span> </h5></center>
				@endif
			</form>
		</div>
	</div> <hr>
	<div class="table-responsive ads_list" id="ads_list">
		@include('admin.ads.report_table', [$ad, $totalPaid, $totalUnPaid])
	</div>
</div>
@endsection

@section('Script')
<script src="{{asset('Backend')}}/vendors/scripts/jquery.table2excel.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script>
	$(document).ready(function() {
		$('#table2excel').DataTable({
			responsive: true,	        
			"lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
			dom: 'Bfrtip',
			buttons: [
			'excel', 'pdf', 'print', 'pageLength'
			],
			"order": [[ 0, "desc" ]]
		});
	});
</script>
@endsection