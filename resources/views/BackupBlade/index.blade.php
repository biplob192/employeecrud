<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body bgcolor="black">
	  <br>
  <form action="{{url('login')}}" method="post" align="center">
  	@csrf
	   <h2> <span style="color: white;">The Bangladesh Today Dashboard</span> </h2>
	   <input type="text" name="name" placeholder="User Name" required>
	   <input type="password" name="password" placeholder="Password" required>
	   <input type="submit" value="Login"><br><br>

  </form>
</body>
</html>

<!-- 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body bgcolor="black">
	  <br>
  <form action="{{url('/name')}}" method="post" align="center">
  	@csrf
	   <h2> <span style="color: white;">The Bangladesh Today Dashboard</span> </h2>
	   <input type="text" name="name" placeholder="User Name" required>
	   <input type="password" name="password" placeholder="Password" required>
	   <input type="submit" value="Login"><br><br>

  </form>
</body>
</html> -->