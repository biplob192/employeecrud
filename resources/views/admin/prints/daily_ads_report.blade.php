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
    <style type="text/css">
		@media print {
            .noprint {
                display: none;
            }
            body {
                margin: 30px;
                box-shadow: none;
                background: transparent;
                -webkit-print-color-adjust: exact;
            }
            /* .bgcol{
                background-color: #ECECEC !important
            } */
        }

        body {
            -webkit-print-color-adjust: exact;
        }
        /* table>thead>tr>th {
            background-color: #ECECEC !important
        } */
        .bgcol{
            background-color: #ECECEC !important
        }

	</style>
</head>
<body>
	<div class="container-fluid" style="margin-top: 50px;">
		<div class="full_width">
			<div class="row align-items-center">
				<div class="col align-self-center"></div>
				<div class="col-md-auto align-self-center"><img src="{{asset('Backend')}}/vendors/images/tbt-logo.svg" style="width: 400px;"></div>
				<div class="col align-self-center">
					<center><br>
						{{-- <a href="" class="btnprn btn"><button class="btn btn-outline-dark noprint">Print Preview</button></a> --}}
						<a href=""><button class="btn btn-outline-dark noprint" onclick="window.print()">Print Report</button></a>
					</center>
					{{-- <script type="text/javascript">
						$(document).ready(function(){
						$('.btnprn').printPage();
						});
					</script> --}}
				</div>
			</div>
		</div>
		<div class="full_width">
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

		<div class="full_width"style="margin-top: 75px">
			<div class="row align-items-center">
				<div class="col">
                </div>
				<div class="col text-right">
                    <p> <span style="font-weight:bold; font-size: 1em;">Publication date: {{ $form_date }}</span></p>
                </div>
			</div>
		</div>
		<div class="full_width">
			<div class="row align-items-center">
				<div class="col table-responsive-md align-self-center">
					<table class="table table-bordered ">
						<thead>
							<tr style="text-align: center;">
								<th style="background-color: #ECECEC">SN</th>
								<th style="background-color: #ECECEC">GD No</th>
								<th style="background-color: #ECECEC">Advertisers</th>
								<th style="background-color: #ECECEC">Color/Bw</th>
								<th style="background-color: #ECECEC">INCH-COL</th>
								<th style="background-color: #ECECEC">RATE</th>
								<th style="background-color: #ECECEC">AMOUNT</th>
								<th style="background-color: #ECECEC">NAME</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($ads as $ad)
							<tr style="height:auto; text-align: center;">
								<td style="vertical-align: middle">{{$loop->iteration}}</td>
								<td style="vertical-align: middle">{{$ad->gd_no}}</td>
								<td style="vertical-align: middle; width:30%; text-align: left">{{$ad->client}}</td>
								<td style="vertical-align: middle">BW</td>
								<td style="vertical-align: middle">{{$ad->inch}}"X{{$ad->colum}}col</td>
								<td style="vertical-align: middle"><?php echo number_format((float)$ad->rate, 2, '.', ''); ?></td>
								<td style="text-align: center; vertical-align: middle"><?php echo number_format((float)$ad->amount, 2, '.', ''); ?></td>
								<td style="text-align: center; vertical-align: middle">{{$ad->correspondent_name}}</td>
							</tr>
                            @endforeach
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" style="text-align: center;"><span style="font-weight:bold;">Total Amount:</span></td>
								<td style="text-align: center;"> <?php $total =  $total_amount; echo number_format((float)$total, 2, '.', ''); ?> </td>
                                <td></td>
							</tr>
							<tr>
								<td colspan="8" style="text-align: right; background-color: #ECECEC !important">
                                    <span style="font-weight:bold">Taka :&nbsp
                                    <?php echo ucfirst(NumConvert::word($total_amount))?> only.
                                    </span>
                                </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
