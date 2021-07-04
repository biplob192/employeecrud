<center> <br>
	<h2>Update Ad Data</h2>
	
<form action="{{url('/ad').'/'.$ad->id}}" method="post">
	{{ method_field('PUT') }}
	@csrf
	<input type="hidden" name="id" value="{{$ad->id}}">

	<input type="text" name="name" value="{{$ad->correspondent_name}}" placeholder="Correspondent Name" >
	<input type="text" name="ad_type" value="{{$ad->ad_type}}" placeholder="Ad Type" >
	<input type="text" name="rate" value="{{$ad->rate}}" placeholder="Rate Per I/C" >
	<input type="text" name="extra_charge" value="{{$ad->extra_charge}}" placeholder="Extra Charge" > <br><br>	
	<input type="text" name="division" value="{{$ad->division}}" placeholder="Division Name" >
	<input type="text" name="district" value="{{$ad->district}}" placeholder="District Name" >
	<input type="text" name="upazila" value="{{$ad->upazila}}" placeholder="Upazila Name" >
	<input type="text" name="client" value="{{$ad->client}}" placeholder="Client Name" > <br><br>
	<input type="text" name="gd_no" value="{{$ad->gd_no}}" placeholder="GD No" >
	<input type="text" name="order_no" value="{{$ad->order_no}}" placeholder="Order No" >
	<input type="text" name="inch" value="{{$ad->inch}}" placeholder="Inch" >
	<input type="text" name="colum" value="{{$ad->colum}}" placeholder="Colum" ><br><br>
	<input type="text" name="total_size" value="{{$ad->total_size}}" placeholder="Total Size" >
	<input type="text" name="amount" value="{{$ad->amount}}" placeholder="Amount" >	
	
  	Payment Status:
	<input type="radio" id="paid" name="payment_status" value="1"><label for="paid"> <span style="color:green; font-weight: bold;" >PAID</span> </label>
	<input type="radio" id="un_paid" name="payment_status" value="0" checked><label for="un_paid"><span style="color:red; font-weight: bold;" >UN-PAID</span></label><br><br>

	<input type="submit" name="" value="Update Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>