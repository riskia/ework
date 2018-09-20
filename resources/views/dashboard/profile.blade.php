@extends('dashboard.index')

@section('nama', 'Profile')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (\Session::has('alert'))
          <br>
            <div class="alert alert-success">
              <div class="alert-link">{{ session()->get('alert') }}</div>
            </div>
        @endif
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Home</a>
                    </li>
                    <li><a href="#profile" data-toggle="tab">Profile</a>
                    </li>
                    <li><a href="#password" data-toggle="tab">Change Password</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">Settings</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <h4>Home Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <h4>Profile Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="password">
                        <h4>Password Tab</h4>
                        <form action="{{ url('/changepassword') }}" method="POST">
                          <div class="form-group col-lg-3 .offset-md-3">
                              <label>New Password</label>
                              <input class="form-control" type="password" name="newpassword1" id="newpassword1" placeholder="New Password" required="required"><br>
                              <label>New Password</label>
                              <input class="form-control" type="password" name="newpassword2" id="newpassword2" placeholder="New Password" required="required" onChange="checkPasswordMatch();"><br>
                              <div class="text-danger" id="divCheckPasswordMatch"></div><br>
                              <button id="button" class="enableOnInput btn btn-primary" type="submit">Save</button>
                              {{ csrf_field() }}
                          </div>
                        </form>  
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h4>Settings Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
@endsection

@section('js')
  <script> 
    function checkPasswordMatch()
    {
      var password = $("#newpassword1").val();
      var confirmPassword = $("#newpassword2").val();

      if (password != confirmPassword)
          {$("#divCheckPasswordMatch").html("Passwords do not match!");
          $('.enableOnInput').prop('disabled', true);}
      else
          {$("#divCheckPasswordMatch").html("Passwords match.");
          $('.enableOnInput').prop('disabled', false)}
    }
  </script>
  <script>
    $(document).ready(function ()
    {
      $("#newpassword1, #newpassword2").keyup(checkPasswordMatch);
    });
  </script>
@endsection