<!-- resources/views/formedit.blade.php -->
<div class="containereditform">
    <form class="form-signin" id="editform_{{$user->Id}}">
    
  <div class="text-center mb-4">
  
    <p></p>
  </div>
  <div class='alert-danger'></div>
 <div class="form-label-group">
   <input type="text" id="first_name_{{$user->Id}}" name='first_name' class="form-control" value="{{$user->first_name}}" required autofocus>
    <label for="inputEmail">Firs Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="text" id="last_name_{{$user->Id}}" name='last_name' class="form-control"  value="{{$user->last_name}}" required autofocus>
    <label for="inputEmail">Last Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="text" id="username_{{$user->Id}}" name='username' class="form-control"  value="{{$user->username}}" required autofocus>
    <label for="inputEmail">Username</label>
  </div>

  <div class="form-label-group">
    <input type="email" id="email_{{$user->Id}}" name='email' class="form-control"  value="{{$user->email}}" required autofocus>
    <label for="inputEmail">Email address</label>
  </div>

 
 <!--   <div class="form-label-group">
    <input type="password" id="password_{{$user->Id}}" name='password' class="form-control" value="{{$user->password}}" required>
    <label for="inputPassword">Password</label>
  </div> -->

 <div class="checkbox mb-3">
    <label>
      <input type="checkbox" id='is_active_{{$user->Id}}' name='is_active' value="1"> Active me
    </label>
  </div>
 
    <input type="hidden" id="custid_{{$user->Id}}" name='custid'   value="{{$user->Id}}">
    <button type="button" class="btn btn-primary edituser" id="edituser_{{$user->Id}}">Edit user</button>
    <button type="button" class="btn btn-primary deleteuser" id="deleteuser_{{$user->Id}}">Delete use</button>
  </form>
</div>