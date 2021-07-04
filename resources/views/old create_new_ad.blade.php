<center> <br>
	<h2>Insert New Ad</h2>
	@foreach($errors->all() as $error)
        <div>
           {{$error}}
        </div>
   	@endforeach
<form action="ad" method="post">
	@csrf
	<input type="text" name="name" value="{{old('name')}}" placeholder="Correspondent Name" >	
	<select name="ad_type">
			<option value ="govt">Government)</option>
			<option value ="private">Private</option>
			<option value ="commercial">Commercial</option>			
	</select>
	<select name="ad_position">
			<option value ="front">Front Page (Color)</option>
			<option value ="back">Back Page (Color)</option>
			<option value ="inner">Inner Page</option>
			<option value ="inner_color">Inner Page (Color)</option>
	</select>
	
	<input type="text" name="rate" value="{{old('rate')}}" placeholder="Rate Per I/C" >
	<input type="text" name="extra_charge" value="0" placeholder="Extra Charge" > <br><br>	
	<input type="text" name="division" value="{{old('division')}}" placeholder="Division Name" >
	<input type="text" name="district" value="{{old('district')}}" placeholder="District Name" >
	<input type="text" name="upazila" value="{{old('upazila')}}" placeholder="Upazila Name" >
	<input type="text" name="client" value="{{old('client')}}" placeholder="Client Name" > <br><br>
	<input type="text" name="gd_no" value="{{old('gd_no')}}" placeholder="GD No" >
	<input type="text" name="order_no" value="{{old('order_no')}}" placeholder="Order No" >
	<input type="text" name="inch" value="{{old('inchi')}}" placeholder="Inch" >
	<input type="text" name="colum" value="{{old('colum')}}" placeholder="Colum" ><br><br>
	<input type="text" name="total_size" value="{{old('total_size')}}" placeholder="Total Size" >
	<input type="text" name="amount" value="{{old('amount')}}" placeholder="Amount" >	
	
  	| Payment Status:
	<input type="radio" id="paid" name="payment_status" value="1"><label for="paid"> <span style="color:green; font-weight: bold;" >PAID</span> </label>
	<input type="radio" id="un_paid" name="payment_status" value="0" checked><label for="un_paid"><span style="color:red; font-weight: bold;" >UN-PAID</span></label><br><br>

	<input type="submit" name="" value="Submit Data">
	<button type="button"> <a href="/" style="text-decoration:none"> <strong>Go Home</strong> </a></button>
</form>	
</center>