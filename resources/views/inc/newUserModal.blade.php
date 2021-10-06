<div class="modal fade" id="userModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Make a New System User</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          
          <form action="{{url('/user')}}" method="post">
            @csrf             
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="user_name" id="user_name" value="{{old('user_name')}}" placeholder="User Full Name Here" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Email</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="email" id="user_email" name="user_email" value="{{old('user_email')}}" placeholder="Enter Email" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Password</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="Password" id="user_password" name="user_password" placeholder="Enter Password" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">User Level</label>
              <div class="col-sm-12 col-md-10">
                <select class="form-control" type="text" id="user_role" name="user_role"required>
                  <option value="super_admin">Super Admin</option>
                  <option value="admin">Admin</option>
                  <option value="editor">Editor</option>
                  <option value="user" selected>User</option>
                </select>
              </div>
            </div> 

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Submit</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="submit" value="Submit New User">
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

<div class="modal fade" id="EditUserModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <!-- <form action="{{url('/user').'/'.$user->id}}" method="post"> -->
      <form action="{{url('/user_update')}}" method="post">
        @csrf 
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update System User</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>          
          </div>
          <!-- Modal Body-->
          <div class="modal-body">           
                        
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                <div class="col-sm-12 col-md-10">
                  <input class="form-control" type="hidden" name="id" id="edit_user_id" value="" required>
                  <input class="form-control" type="text" name="user_name" id="edit_user_name" value="{{old('user_name')}}" placeholder="User Full Name Here" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                  <input class="form-control" type="email" id="edit_user_email" name="user_email" value="{{old('user_email')}}" placeholder="Enter Email" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                  <input class="form-control" type="Password" id="edit_user_password" name="user_password" placeholder="Enter Password">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">User Level</label>
                <div class="col-sm-12 col-md-10">
                  <select class="form-control" type="text" id="edit_user_role" name="edit_user_role"required>
                    @foreach($roles as $role)
                    <option value="{{$role->id }}" {{$role->name == 'user' ? 'selected' : ''}}>{{ucfirst($role->name) }}</option>
                    @endforeach
                  </select>
                </div>
              </div> 

              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Submit</label>
                <div class="col-sm-12 col-md-10">
                  <input class="form-control" type="submit" value="Update User Information">
                </div>
              </div>
            
          </div>
          <!-- Modal Footer-->
          <div class="modal-footer">
            <!-- <button type="submit" class="btn btn-outline-dark">Submit New User</button> -->
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
</div> 