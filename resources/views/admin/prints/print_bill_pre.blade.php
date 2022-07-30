<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/mystyle.css">
	<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/jquery.printpage.js"></script>
<!-- 	<style type="text/css">
		table.table-bordered > thead > tr > th{
		    border:1px solid black;
		}
		table.table-bordered > thead > tr > td{
		    border:1px solid black;
		}
		table.table-bordered > tbody > tr > td{
		    border:1px solid black;
		}
	</style> -->
</head>
<body>
	<div class="container-fluid" style="margin-top: 50px;">
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col align-self-center"></div>
				<div class="col-md-auto align-self-center"><img src="{{asset('Backend')}}/vendors/images/tbt-logo.svg" style="width: 400px;"></div>
				<div class="col align-self-center">
					<center><br>
						<a href="{{url('ad').'/'.$ad->id.'/bill'}}" class="btnprn btn"><button class="btn btn-outline-dark">Print Preview</button></a>
					</center>
					<script type="text/javascript">
						$(document).ready(function(){
						$('.btnprn').printPage();
						});
					</script>
				</div>
			</div>
		</div>
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col align-self-center"></div>
				<div class="col-md-auto align-self-center">
					<p align="center" style="margin-top: 15px;"><span style="font-weight: bold; font-size: 10;font-style: italic;">
						BTTC Building (Level-03), 270/B, Tejgaon I/A, Dhaka-1208 <br>
						E-mail: ads@thebangladeshtoday.com<br>
						Tel: 02-8878026 </span>
					</p>
				</div>
				<div class="col align-self-center">

				</div>
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
				<div class="col-auto align-self-center">
                    Bill No: GD-{{$ad->gd_no}}<br>Date: {{$ad->publishing_date}}<br>Order No: {{$ad->order_no}}<br>Order Date: {{$ad->order_date}}
                </div>
			</div>
		</div>
		<div class="container-md"style="margin-top: 75px">
			<div class="row align-items-center">
				<div class="col align-self-center">
                    <p align="center"><span style="font-weight:bold; font-style:italic;text-decoration: underline;font-size: 1.5em;">BILL</span></p>
                </div>
			</div>
		</div>
		<div class="container-md">
			<div class="row align-items-center">
				<div class="col table-responsive-md align-self-center">
					<table class="table table-bordered ">
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
								<td style="vertical-align: middle">{{$ad->inch}}X{{$ad->colum}}</td>
								<td style="vertical-align: middle">{{$ad->total_size}}"</td>
								<td style="vertical-align: middle"><?php echo number_format((float)$ad->rate, 2, '.', ''); ?></td>

								{{-- <td style="vertical-align: middle">{{$ad->extra_charge > 0 ? $ad->extra_charge : '--'}}</td> --}}
								<td style="vertical-align: middle">
                                    @php
                                        $ads_amount = $ad->rate * $ad->total_size;
                                        $page_charge = 0;

                                        if($ad->calculation_type == 'regular' && $ad->ad_position == 'Front Page'){
                                            echo 'F. page ch: 100% </br>';
                                            $page_charge = $ads_amount;
                                            echo 'Tk. '. number_format((float)$page_charge, 2, '.', '');
                                        }
                                        else if($ad->calculation_type == 'regular' && $ad->ad_position == 'Back Page'){
                                            echo 'Back page charge: 50% </br>';
                                            $page_charge = $ads_amount * 0.50;
                                            echo 'Tk. '. number_format((float)$page_charge, 2, '.', '');
                                        }
                                        else{
                                            echo '--';
                                        }
                                        $total_ads_amount = $ads_amount + $page_charge;
                                    @endphp
                                </td>
								<!-- <td style="vertical-align: middle">{{$ad->amount}}</td> -->
								<td style="vertical-align: middle"><?php echo number_format((float)$total_ads_amount, 2, '.', ''); ?> </td>
								<td style="vertical-align: middle">
                                    -- </br>
                                    @php
                                        if($ad->ad_position != 'Inner Page'){
                                            echo 'Color Ch 45% </br> -- </br> -- </br>';
                                        }
                                    @endphp
                                    + Vat 15% </br>
                                    + IT 10% </br>
                                </td>
								<td style="text-align: center; vertical-align: middle">
                                    @php
                                        $color_charge  = 0;
                                        $sub_total = $total_ads_amount;
                                        echo number_format((float)$total_ads_amount, 2, '.', '').'<br>';

                                        if($ad->ad_position != 'Inner Page'){
                                            echo number_format((float)$color_charge = $total_ads_amount * 0.45, 2, '.', '').'</br>----------------</br>';
                                            echo number_format((float)$sub_total = ($total_ads_amount + $color_charge), 2, '.', '').'</br>';
                                        }
                                    @endphp
                                    <?php $vat = $sub_total * 0.15; echo number_format((float)$vat, 2, '.', ''); ?> <br>
                                    <?php $it = $sub_total * 0.10; echo number_format((float)$it, 2, '.', ''); ?>
                                </td>
							</tr>
							<tr style="background:#ECECEC;">
								<td></td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" style="text-align: center;"><span style="font-weight:bold;">Net Payable Amount:</span></td>
								<td style="text-align: center;"> <?php $total =  $sub_total + $vat + $it; echo number_format((float)$total, 2, '.', ''); ?> </td>
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
						In Word Taka :&nbsp<?php echo ucfirst(NumConvert::word($total))?> only. <br>
					</span>
				</div>
			</div>
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 2px solid #111;">
					<p style="margin-bottom: 0;"><span style="font-weight:bold;font-style:italic;">Company's Tin: 340578460965<br>Vat Reg No: 0027708340203<br>NID No: 19822697556370527</span></p>
				</div>
				<div class="col align-self-center"></div>
				<div class="col align-self-center"></div>
			</div>
		</div>
		<div class="container-md"style="margin-top: 15px;">
			<div class="row align-items-center">
				<div class="col-md-auto align-self-center" style="vertical-align: middle;word-wrap: normal; border: 1px solid #111;">
					<span style="font-weight:bold;">*** Note: Please Make the Cheque to The Bangladesh Today by Cross Account Payee.<br>
					*** Account Name: The Bangladesh Today. Account No: 0117233005016</span>
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
				<div class="col align-self-center"><span style="font-weight:bold;text-decoration: overline;">General Manager (Advt. & Mkt.)</span></div>
			</div>
		</div>

	</div>
</body>
</html>
