@extends('master')

@section('Title')
Ad Prices
@endsection

@section('Style')
@endsection

@section('Content')

<style>
	.emptable{
		font-size: 19px;

	}
</style>


<br>
<center>
	<h2>{{$correspondent->name}}</h2>

<table border="1" class="emptable">
	<tr>
		<td><strong>Correspondent ID:</strong></td>
		<td align="center">{{$correspondent->id}}</td>
	</tr>	
	<tr align="">
		<td><strong>Fathe'r Name:</strong></td>
		<td>{{$correspondent->fathers_name}}</td>
	</tr>
	<tr align="">
		<td><strong>Upazila:</strong></td>
		<td>{{$correspondent->upazila}}</td>
	</tr>
	<tr align="">
		<td><strong>District:</strong></td>
		<td>{{$correspondent->district}}</td>
	</tr>
	<tr align="">
		<td><strong>Mobile:</strong></td>
		<td>{{$correspondent->mobile}}</td>
	</tr>
	
</table> <br>
<button type="button" style="text-decoration: none;"> <a href="{{url('correspondent').'/'.$correspondent->id.'/edit'}}" style="text-decoration:none"> <strong>Edit</strong> </a></button>
<button type="button" style="text-decoration: none;"> <a href="/correspondent" style="text-decoration:none"> <strong>Add New</strong> </a></button>
</center>

@endsection

@section('Script')
@endsection
