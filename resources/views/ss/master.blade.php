<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('Title')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/style.css">
	@yield('Style')

	<!-- Global site tag (gtag.js) - Google Analytics -->
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('Backend')}}/vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	@include('inc.header')



	@include('inc.sidebar')

	<div class="main-container">
		<div class="pd-ltr-20">
			@yield('Content')
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/script.min.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/process.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/layout-settings.js"></script>
	<script src="{{asset('Backend')}}/vendors/scripts/dashboard.js"></script>
	@yield('Script')
</body>
</html>