<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{url('/savebanner')}}" method="post">
	@csrf
	<input type="text" name="title">
	<select name="country">
		<option value="BD">BD</option>
		<option value="IN">IN</option>
	</select>
	<input type="submit" name="" value="Store">
</form>
</body>
</html>