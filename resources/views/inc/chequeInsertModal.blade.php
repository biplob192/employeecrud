<div class="modal fade" id="CommissionModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Make a Correspondent Commission</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>

        <!-- Modal Body-->
        <div class="modal-body">
          @if(session()->has('error'))    
            <center><h5> <span style="color: red;">{{ session()->get('error') }}</span> </h5></center> <br>
          @endif

          <form action="{{url('/commission')}}" method="post">
            @csrf           
            
            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
              <div class="col-sm-12 col-md-10 dropdown">
                <input type="" name="corr_id" id="corr_id" value="">
                <select class="form-control form-select" id="corr_name" name="corr_name" required>                  
                </select>
              </div>
            </div> -->
             
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
              <div class="col-sm-12 col-md-10">
                <input type="hidden" name="correspondent_id" id="correspondent_id" value="">
                <select class="form-control custom-select2" id="corr_name2" name="corr_name2" style="width: 100%" required>
                  <option value="" selected disabled>Select Name</option>
                  @foreach ($correspondents as $correspondent)
                  <option value="{{$correspondent->id}}">{{$correspondent->name}}, {{$correspondent->upazila_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Amount</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" id="commission_amount" name="commission_amount" value="{{old('commission_amount')}}" placeholder="Enter Commission Amount" required>
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Submit</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="submit" value="Submit Commission">
              </div>
            </div>
          </form>
        </div>

        <!-- Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div> 
