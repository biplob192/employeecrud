<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>

	<link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
</head>

<!-- background="{{asset('Backend')}}/vendors/images/pattern.png" -->

<body bgcolor="white"> 
	<style type="text/css">
		.tbt-image{
			height: 100vh;
		    z-index: 1000;
		}
	</style>
	<div class="container-fluid fixed-top" style="float: left;background:white;">
		<div class="container-md">
			<div class="row">

				<div class="col-3" >
					<img src="{{asset('Backend')}}/homepage/tbt-home-page-logo.png" style="margin: 5px;margin-left: 0;height: auto;width: 100%;">
				</div>

				<div class="col  align-self-center" style="background: #fff;">
					<div class="row justify-content-end">
						<form action="{{url('login')}}" method="post">
							@csrf
							  <div class="form-row">
							    <div class="col">
							      <input type="text" name="name" class="form-control" placeholder="User Name"required>
							    </div>
							    <div class="col">
							      <input type="password" name="password" class="form-control" placeholder="Password"required>
							    </div>
							    <div class="col-2">
							      <input type="submit" class="form-control" value="Login">
							    </div>
							  </div>
							  @if(session()->has('error'))    
							  	<center><h5> <span style="color: #111;">{{ session()->get('error') }}</span> </h5></center>
							  @endif
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="background: maroon; height: 1px;"></div>

	</div>

	<div class="container-fluid align-self-center"style="float: left;background:white;">
		
		<div class="container-md">
			<div class="row align-items-center tbt-image">
				<div class="col" style="background: #fff;">
					<img src="{{asset('Backend')}}/homepage/tbt-image.svg" class = "img-responsive" style="width:100%;">
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div class="container-md">
		<div class="row align-items-center" style="height: 150px; background: yellow;">
		    <div class="col"style="height: 75px; background: red;">
		      One of three columns
		    </div>
		    <div class="col align-self-start"style="height: 75px; background: green;">
		      One of three columns
		    </div>
		    <div class="col align-self-end"style="height: 75px; background: blue;">
		      One of three columns
		    </div>
		</div>
	</div> -->
</body>
</html>