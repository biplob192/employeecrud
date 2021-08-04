<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 </head>
 <body>

<div class="container">
  <div class="row">
    <div class="col-md-7">

        <input type="text" id="emailx" name="email">
        <input type="text" id="gd_no" name="gd_no">
        <button id="btn" class="btn btn-success">Submit</button>

    </div>
  </div>


<input type="text" id="d" name="">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



<script>


  jQuery("#btn").on('click',function(e){
    e.preventDefault();

    var emaily = $("#emailx").val();
    $.ajax({
      url:"/ajaxcall",
      type:"GET",
      data:{email:emaily},
      success: function(res){
        console.log(res);
        $("#d").text(res);
      }
    });

    


});


  jQuery("#gd_no").on('blur',function(e){
    e.preventDefault();
    var gd_no = $("#gd_no").val();
    $.ajax({
      url:"/ajaxcall",
      type:"GET",
      data:{gd_no:gd_no},
      success: function(res){
        console.log(res);
        $("#d").val(res.correspondent_name + res.client);
        // $("#d").text(res);
      }
    });

  });

</script>

 </body>
</html>
