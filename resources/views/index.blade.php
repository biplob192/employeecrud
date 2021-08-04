<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 </head>
 <body>
  <br /><br />
    <div>
      <div class="container" style="width:600px;">
       <h2 align="center">Autocomplete Textbox using Bootstrap with Ajax PHP</h2>
       <br /><br />
       <label>Search Country</label>
       <input type="text" name="search" id="search" class="form-control input-lg" autocomplete="off" placeholder="Type Country Name" />
      </div>
      <div id = "search_list"></div>
    </div>
    <div class="col-lg-3"></div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

 </body>
</html>

<script>
$(document).ready(function(){
$('#search').on('keyup',function(){
    var quary=$(this).val();
    $.ajax({
    url : "{{url('search')}}",
    type : "GET",
    data:{'search':quary},
    success:function(data){
    $('#search_list').html(data);
    }
});
}); 
});
</script>