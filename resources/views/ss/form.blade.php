<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="{{url('request')}}">
	@csrf
<input type="text" name="name">	
<input type="text" name="age">	

<button>Submit</button>	
</form>
@isset($namex)
{{$namex}}

<form method="post" action="{{url('request')}}">
	@csrf
<input type="text" name="name">	
<input type="text" name="age">	

<button>Submit</button>	
</form>

@endisset
</body>
</html>