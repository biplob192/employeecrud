<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
	<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/jquery.printPage.js"></script>
</head>
<body> 
	<div class="container-fluid" style="margin-top: 50px;">
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
				<div class="col align-self-center">Comment<br>{{$ad->client}}<br>{{$ad->upazila}},{{$ad->district}}</div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center">Bill No: GD-{{$ad->gd_no}}<br>Date: {{$ad->publishing_date}}<br>Order No: {{$ad->order_no}}<br>Date: {{$ad->publishing_date}}</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 75px">
			<div class="row align-items-center">
				<div class="col align-self-center"><p align="center"><span style="font-weight:bold; font-style:italic;text-decoration: underline;font-size: 1.5em;">BILL</span></p></div>
			</div>			
		</div>
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col table-responsive-md align-self-center">
					<table class="table table-bordered">
						<thead>
							<tr style="font-weight:bold;background: #ECECEC;">
								<td>INSERT</td>
								<td>INCH-COL</td>
								<td>SIZE</td>
								<td>RATE</td>
								
								<td>EXTRA</td>
								<td>TOTAL AMMOUNT</td>
								<td>COMMISSION</td>
								<td style="text-align: center;">GRAND TOTAL</td>
							</tr>
						</thead>
						<tbody>
							<tr style="height:200px; text-align: center;">
								<td style="vertical-align: middle">{{$ad->publishing_date}}</td>
								<td style="vertical-align: middle">{{$ad->inch}}*{{$ad->colum}}</td>
								<td style="vertical-align: middle">{{$ad->total_size}}</td>
								<td style="vertical-align: middle">{{$ad->rate}}</td>
								
								<td style="vertical-align: middle">{{$ad->extra_charge}}</td>
								<td style="vertical-align: middle">{{$ad->amount}}</td>
								<td style="vertical-align: middle">+ Vat 15%</td>
								<td style="text-align: center; vertical-align: middle">{{$ad->amount}}</td>
							</tr>
								<tr style="background:#ECECEC;">
								<td></td>
								
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" style="text-align: center;"><span style="font-weight:bold;">Net Payable Amount:</span></td>
								<td style="text-align: center;">{{$ad->amount}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px">
			<div class="row align-items-center">
				<div class="col align-self-center"><span style="font-weight:bold;font-size: 1em;">In Word Taka.:&nbsp One Hundred and Three Only.</span>
				</div>
			</div>			
		</div>
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
		<div class="container-md"style="margin-top: 175px;margin-bottom: 175px;">
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