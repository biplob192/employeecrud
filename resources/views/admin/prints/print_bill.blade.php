<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TBT ADVERTISEMENT BILL</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/mystyle.css">
	<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/jquery.printpage.js"></script>
	<style type="text/css">
		* {
			font-size: 1.06rem;
		}
	</style>
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
			<div class="row align-items-center justify-content-between">
				<div class="col-8 align-self-center">
					<?php
						if($upazila->upazila_name == 'Dhaka'){
							$client = $ad->client;
							$client2 = explode(',', $client);
							$size = count($client2);

							echo $client2[0].',<br>';
							if(array_key_exists(1, $client2)){
								if($size == 2){
									echo $client2[1].', Dhaka';
								} else echo $client2[1].',<br>';
							}
							if(array_key_exists(2, $client2)){
								if($size == 3){
									echo $client2[2].', Dhaka';
								} else echo $client2[2].',<br>';
							}
							if(array_key_exists(3, $client2)){
								if($size == 4){
									echo $client2[3].', Dhaka';
								} else echo $client2[3].',<br>';
							}
						}
						else{
							$client = $ad->client;
							$client2 = explode(',', $client);

							echo $client2[0].',<br>';
							if(array_key_exists(1, $client2)){
								echo $client2[1].',<br>';
							}
							if(array_key_exists(2, $client2)){
								echo $client2[2].',<br>';
							}
							if(array_key_exists(3, $client2)){
								echo $client2[3].',<br>';
							}
							echo $upazila->upazila_name.', '.$district->district_name;
						}
						
					?>
					<!-- {{$ad->client}}, <br>{{$upazila->upazila_name}}, {{$district->district_name}} -->
				</div>
				<div class="col-auto align-self-center">Bill No: GD-{{$ad->gd_no}}<br>Date: {{$ad->publishing_date}}<br>Order No: {{$ad->order_no}}<br>Order Date: {{$ad->order_date}}</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 55px">
			<div class="row align-items-center">
				<div class="col align-self-center"><p align="center"><span style="font-weight:bold; font-style:italic;text-decoration: underline;font-size: 1.5em;">ADVERTISEMENT BILL</span></p></div>
			</div>			
		</div>
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col table-responsive-md align-self-center">
					<table class="" style="border: 1px solid black; width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse;">
						<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
							<tr style="font-weight:bold;">
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">INSERT</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">INCH-COL</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">SIZE</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">RATE</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">EXTRA</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">AMMOUNT</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">COMMISSION</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black;">GRAND TOTAL</td>
							</tr>
						</thead>
						<tbody>
							<tr style="height:190px; text-align: center;">
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">{{$ad->publishing_date}}</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">{{$ad->inch}}X{{$ad->colum}}</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">{{$ad->total_size}}"</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">
									<?php
										if($ad->calculation_type == 'custom'){
											echo 'Custom Rate';
										} else echo number_format((float)$ad->rate, 2, '.', '');
									?>
								</td>
								
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">{{$ad->extra_charge > 0 ? $ad->extra_charge : '--'}}</td>
								<!-- <td style="vertical-align: middle">{{$ad->amount}}</td> -->
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;"><?php echo number_format((float)$ad->amount, 2, '.', ''); ?> </td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;">-- </br> + Vat 15%</td>
								<td style="text-align: center; padding: 0.75rem; border: 1px solid black; vertical-align: middle;"><?php echo number_format((float)$ad->amount, 2, '.', ''); ?> <br><?php $vat = $ad->amount * 0.15; echo number_format((float)$vat, 2, '.', ''); ?></td>
							</tr>
							<tr>
								<td colspan="7" style="padding: 0.75rem; text-align: right;"><span style="font-weight:bold;">Net Payable Amount:</span></td>
								<td style="padding: 0.75rem; text-align: center;"> <?php $total =  $ad->amount + $vat; echo number_format((float)$total, 2, '.', '').' Taka'; ?> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px">
			<div class="row align-items-center">
				<div class="col align-self-center">
					<span style="font-weight:bold;font-size: 1em;">
						In Word Taka :&nbsp<?php echo ucfirst (NumConvert::word($total))?> only.
					</span>
				</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 1px solid #111; margin-top: 0.75rem; width: 35%">
					<p style="margin-bottom: 0; padding: 0.5rem;"><span style="font-weight:bold;font-style:italic;">Company's Tin: 340578460965<br>Vat Reg No: 0027708340203<br>NID No: 19822697556370527</span></p>
				</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 1px solid #111; width: 80%">
					<span style="font-weight:bold;"> <p style="margin-bottom: 0; padding: 0.5rem;"> *** Note: Please Make the Cheque to The Bangladesh Today by Cross Account Payee.<br>
					*** Account Name: The Bangladesh Today. Account No: 0117233005016</p></span>
				</div>
			</div>			
		</div>
		<div class="container-md"style="margin-top: 175px;">
			<div class="row align-items-center">
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">Prepared By</span></div>
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">Accounts Officer</span></div>
				<div class="col-3 align-self-center"><span style="font-weight:bold;text-decoration: overline;">Manager (Advt. & Mkt.)</span></div>
				<div class="col-4 align-self-center"><div style="float:right;"><span style="font-weight:bold;text-decoration: overline;">General Manager (Advt. & Mkt.)</span></div></div>
			</div>			
		</div>
		
	</div>
</body>
</html>