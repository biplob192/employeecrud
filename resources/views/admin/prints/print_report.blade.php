<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
	<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/jquery.printpage.js"></script>
</head>
<body> 
	<div class="container-fluid" style="margin-top: 30px;">
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col align-self-center"></div>
				<div class="col align-self-center"><img src="{{asset('Backend')}}/vendors/images/tbt-logo.svg" style="width: 400px;"></div>
				<div class="col align-self-center"></div>
			</div>			
		</div>
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col align-self-center"></div>
				<div class="col-md-auto align-self-center">
					<p align="center" style="margin-top: 15px;"><span style="font-weight: bold; font-size: 10;font-style: italic;">
						BTTC Building (Level-03), 270/B, Tejgaon I/A, Dhaka-1208 <br>
						E-mail: ads@thebangladeshtoday.com<br>
						Tel: 02-8878026
					</span> </p>
				</div>
				<div class="col align-self-center"></div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col align-self-center">{{$corr->name}}, ({{$corr->upazila_name}}, {{$corr->district_name}}) <br>Report Period: {{$data['duration']}}<br> <b>Printed: <?php echo date("h:i:sa, ").'at '.date(" d-m-Y");?></b> </div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center"></div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 75px">
			<div class="row align-items-center">
				<div class="col align-self-center"><p align="center"><span style="font-weight:bold; font-style:italic;text-decoration: underline;font-size: 1.5em;">Correspondent Report</span></p>
				</div>
			</div>			
		</div>

		<div class="container-md">
			<div class="row align-items-center">
				<div class="col table-responsive-md align-self-center">
					<table class="table table-bordered">
						<thead>
							<tr style="font-weight:bold;background: #ECECEC;">
								<td style="text-align: center;">ADS</td>
								<td style="text-align: center;">AMMOUNT</td>
								<td style="text-align: center;">CHEQUES</td>
								<td style="text-align: center;">DUE AMOUNT</td>
							</tr>
						</thead>
						<tbody>
							<tr style="text-align: center;">
								<td style="vertical-align: middle"> {{$data['totalSize']}}" ({{$data['count']}}) </td>
								<td style="vertical-align: middle"> {{$data['total']}} Taka </td>
								<td style="vertical-align: middle"> {{$data['chequeAmount']}} ({{$data['chequeCount']}}) Taka </td>
								<td style="vertical-align: middle"> {{$data['totalUnPaid']}} ({{$data['countUnPaid']}}) Taka </td>
							</tr>
							<tr>
								<td style="vertical-align: middle"></td>
								<td style="vertical-align: middle"></td>
								<td style="text-align: center; vertical-align: middle">Previous Due:</td>
								<td style="text-align: center; vertical-align: middle"> {{$data['previous_due']}} Taka </td>
							</tr>
							<tr style="background:#ECECEC;">
								<td></td>
								<td></td>
								<td style="text-align: right; font-weight:bold;">Total Payable Due:</td>
								<td style="text-align: center; font-weight: bold;"> {{$data['totalUnPaid'] + $data['previous_due']}} Taka </td>
							</tr>
							<tr style="font-weight:bold; background:#ECECEC;">
								<td colspan="2">
									Total Paid Commission: {{$data['total_comm']}} Taka || Last: {{$data['last_comm']['commission_amount']}} Taka - {{$data['last_comm']['commission_date']}}
								</td>
								<td style="text-align: right; font-weight:bold;">Commission Due:</td>
								<td style="text-align: center; font-weight: bold;"> {{$data['credit']}} Taka </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<p style="font-weight: bold; color: red;"> All Un-Paid Ads:&nbsp; </p>
				@foreach ($data['ad'] as $ad)
				@if($ad['payment_status'] == 0)
				{{$ad['gd_no']}},
				@endif					
				@endforeach				
			</div>		
		</div>

<!-- 		<div class="container-md"style="margin-top: 15px">
			<div class="row align-items-center">
				<div class="col align-self-center">
					<span style="font-weight:bold;font-size: 1em;">
						In Word Taka :&nbsp<?php echo ucfirst (NumConvert::word($data['total']))?> only.
					</span>
				</div>
			</div>			
		</div> -->

		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 2px solid #111;">
					<p style="margin-bottom: 0;"><span style="font-weight:bold;font-style:italic;">Company's Tin: 340578460965<br>Vat Reg No: 001641895<br>NID No: 19822697556370527</span></p>
				</div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center"></div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 1px solid #111;">
					<span style="font-weight:bold;">(Note: Please Make the Cheque to The Bangladesh Today by Cross Account Payee)</span>
				</div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center"></div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 195px;margin-bottom: 175px;">
			<div class="row align-items-center">
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">Prepared By</span></div>
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">Accounts Officer</span></div>
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">Manager (Advt. & Mkt.)</span></div>
				<div class="col-4 align-self-center"><div style="float:right;"><span style="font-weight:bold;text-decoration: overline;">General Manager (Advt. & Mkt.)</span></div></div>
			</div>			
		</div>				
	</div>
</body>
</html>