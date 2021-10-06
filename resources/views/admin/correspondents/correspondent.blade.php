@extends('master')

@section('Title')
{{$correspondent->name}}
@endsection

@section('Style')
@endsection

@section('Content')

<style>
	.emptable{
		font-size: 19px;

	}
</style>

<div>
	<center><h5> <span style="color: red;">{{$correspondent->name}}</span> </h5></center> <br>       
</div>
<center>
	<table border="1" class="emptable">
		<tr>
			<td><strong>Correspondent ID:</strong></td>
			<td align="center">{{$correspondent->id}}</td>
		</tr>	
		<tr align="">
			<td><strong>Division:</strong></td>
			<td>{{$correspondent->division_name}}</td>
		</tr>	
		<tr align="">
			<td><strong>District:</strong></td>
			<td>{{$correspondent->district_name}}</td>
		</tr>
		<tr align="">
			<td><strong>Upazila:</strong></td>
			<td>{{$correspondent->upazila_name}}</td>
		</tr>
		<tr align="">
			<td><strong>Email:</strong></td>
			<td>{{$correspondent->email}}</td>
		</tr>
		<tr align="">
			<td><strong>Mobile:</strong></td>
			<td>{{$correspondent->mobile}}</td>
		</tr>
		<tr align="">
			<td><strong>NID:</strong></td>
			<td>{{$correspondent->nid}}</td>
		</tr>
		<tr align="">
			<td><strong>Corr ID:</strong></td>
			<td>{{$correspondent->corrid}}</td>
		</tr>
		<tr align="">
			<td><strong>Appointed:</strong></td>
			<td>{{$correspondent->appointed_date}}</td>
		</tr>
		
	</table> <br>
	<button type="button" style="text-decoration: none;"> <a href="{{url('correspondent').'/'.$correspondent->id.'/edit'}}" style="text-decoration:none"> <strong>Edit</strong> </a></button>
	<button type="button" style="text-decoration: none;"> <a href="/correspondent" style="text-decoration:none"> <strong>Add New</strong> </a></button>
</center>

@endsection

@section('Script')
@endsection
