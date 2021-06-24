<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>All Banners</h1>
<table>
	
	<tbody>
		@isset($bannerget)
			@foreach($bannerget as $object)
				<tr>
					<td>{{ $object->title}}</td>
					<td>{{ $object->content}}</td>
					<td>{{ $object->banner_image}}</td>
				</tr>
			@endforeach
		@endisset
	</tbody>
</table>
@isset($banner)
	{{ $banner->title }} <br/>
	{{ $banner->content }}<br/>
	{{ $banner->banner_image }}<br/>
@endisset

</body>
</html>

