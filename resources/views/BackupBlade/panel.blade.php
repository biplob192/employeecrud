<br>
<form action="{{url('login')}}" method="post" align="center">
  	@csrf
	   <h2> <span style="color: black;">The Bangladesh Today Office Managment Panel</span> </h2>
	   <div><span style="color: black;font-weight: bold;">User: {{Auth::user()->name}}</span> 
	   <button type="button"> <a href="/logout" style="text-decoration:none"> <strong>Log Out</strong> </a></button><br><br><br> </div>  
	   

	   <button type="button"> <a href="/mlist" style="text-decoration:none" target="_blank"> <strong>Correspondent List</strong> </a></button>
	   <button type="button"> <a href="/addstaff" style="text-decoration:none" target="_blank"> <strong>Register Here</strong> </a></button><br><br>

	   <button type="button"> <a href="/employees" style="text-decoration:none" target="_blank"> <strong>Employee List</strong> </a></button>
	   <button type="button"> <a href="/employee" style="text-decoration:none" target="_blank"> <strong>Register Here</strong> </a></button> <br><br>
	   
	   <button type="button"> <a href="/ads" style="text-decoration:none" target="_blank"> <strong>View Ads</strong></a></button>
	   <button type="button"> <a href="/ad" style="text-decoration:none" target="_blank"> <strong>Insert New Ad</strong> </a></button> <br><br>
	   <button type="button"> <a href="/ad_prices" style="text-decoration:none" target="_blank"> <strong>Ad Prices</strong> </a></button> 
	   <button type="button"> <a href="/ad_price" style="text-decoration:none" target="_blank"> <strong>Set Ads Price</strong> </a></button> 
	   
  </form>