<div class="modal fade" id="walletOverwriteModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Overwrite Correspondent Wallet Balance</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>

        <!-- Modal Body-->
        <div class="modal-body">
          @if(session()->has('error'))    
            <center><h5> <span style="color: red;">{{ session()->get('error') }}</span> </h5></center> <br>
          @endif

          <form action="{{url('/overwrite-wallet')}}" method="post">
            @csrf                        
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Update</label>
              <div class="col-sm-12 col-md-10">
                <select class="form-control custom-select2" id="update_list" name="update_list" style="width: 100%" required>
                  <option value="" selected disabled>Select Option</option>
                  <option value="1">Previous Due Bill</option>
                  <option value="2">Correspondent Balance</option>
                </select>
              </div>
            </div>

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
                <input class="form-control" type="number" id="amount" name="amount" value="{{old('amount')}}" placeholder="Enter Amount" required>
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Submit</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="submit" value="Submit Amount">
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
