<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('Title')</title>
	@include('inc.cssFavicon')
	@yield('Style')
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img width="100%" src="{{asset('Backend')}}/vendors/images/deskapp-logo.svg" alt=""></div>
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
            @include('inc.developer')
		</div>
	</div>
	@include('inc.script')
	@yield('Script')
</body>
</html>
