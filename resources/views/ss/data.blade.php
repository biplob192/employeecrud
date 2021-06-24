<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@foreach($data as $value)

{{ $value->name }}

<br/>
@endforeach
</body>
</html>