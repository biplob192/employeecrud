  <br>
  <form action="{{url('login')}}" method="post" align="center">
  	@csrf
	   <h2 >The Bangladesh Today Dashboard</h2>
	   <input type="text" name="email" placeholder="email" required>
	   <input type="password" name="password" placeholder="Password" required>
	   <input type="submit" value="Login"><br><br>	   
	   <button type="button"> <a href="/addstaff" style="text-decoration:none" target="_blank"> <strong>Register Here</strong> </a></button>
	   <button type="button"> <a href="/mlist" style="text-decoration:none" target="_blank"> <strong>Correspondent List</strong> </a></button>
  </form>