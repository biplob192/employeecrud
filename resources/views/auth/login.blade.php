<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body bgcolor="#520097">
	  <br>
  <form action="{{url('login')}}" method="post" align="center">
  	@csrf
	   <h2> <span style="color: white;">The Bangladesh Today Dashboard</span> </h2>
	   <input type="text" name="email" placeholder="User Email" required>
	   <input type="password" name="password" placeholder="Password" required>
	   <input type="submit" value="Login"><br><br>

	   @if(session()->has('error'))    
	    <h2> <span style="color: white;">{{ session()->get('error') }}</span> </h2>
	   @endif
  </form>  
</body>
</html>