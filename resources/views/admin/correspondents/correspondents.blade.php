@extends('master')

@section('Title')
Correspondents
@endsection

@section('Style')
@endsection

@section('Content')

<style type="text/css">
	.menu{width: 100%;float: left;text-align: center;}
	.edit{width: 50%;float: left;text-align: center;}
	.delete{width: 50%;float: left;text-align: center;}
</style>
<center> <h5>TBT CORRESPONDENT LIST ({{$correspondentCount}})</h5> </center> <br>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<div class="pd-20 card-box mb-30">
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
		    <tr>
				<th>Name</th>
				<th>Division</th>
				<th>District</th>
				<th>Upazila</th>	
				<th>Mobile</th>	
				<th class="text-center" >Action</th>
		    </tr>
		  </thead>
		  <tbody id="myTable">

		     	@foreach($correspondent as $correspondent)
					<tr>						
						<!-- <td>{{$correspondentCount}}</td>			 -->
						<td><a href="{{url('correspondent').'/'.$correspondent->id}}"> <strong>{{$correspondent->name}}</strong> </a></td>	
						<td>{{$correspondent->division_name}}</td>			
						<td>{{$correspondent->district_name}}</td>			
						<td>{{$correspondent->upazila_name}}</td>			
						<td>{{$correspondent->mobile}}</td>			

						<td>
							<div class="menu">		
								<div class="edit">
									<form action="{{url('correspondent').'/'.$correspondent->id.'/edit'}}" method="get">	
										<button class="btn btn-outline-dark" onclick="confirmEdit()">Edit</button>				
									</form>
								</div>
								@hasanyrole('super_admin|admin|editor')
								<div class="delete">
									<form action="{{url('correspondent') .'/'.$correspondent->id}}" method="post">
										@csrf
										{{ method_field('delete') }}
										<button class="btn btn-outline-danger" onclick="confirmDelete()">Delete</button>				
									</form>
								</div>
								@endhasanyrole
							</div>
						</td>
					</tr>
				@endforeach

		  </tbody>
		</table>
	</div>
</div>



@endsection

@section('Script')
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
	function confirmEdit() {
	  	var result = confirm("Are you sure, you want to edit this record?");
		if (result) {
		    alert("Confirmed !!");
		}else{
			event.preventDefault();
		}
	}
	function confirmDelete() {
	  	var result = confirm("Are you sure, you want to delete this record?\nDeleted record will not be recover!");
		if (result) {
		    alert("Confirmed !!");
		}else{
			event.preventDefault();
		}
	}
</script>
@endsection
