<!-- resources/views/showdata.blade.php -->
@extends('app')
@section('content')
<div class="container">
      <table class="table table-striped" id="usertable">
       <thead>
               <tr>
                       <th scope="col">#</th>
                       <th scope="col">First Name</th>
                       <th scope="col">Last Name</th>
                       <th scope="col">Username</th>
                       <th scope="col">Email</th>
                       <th scope="col">Created Date</th>
                       <th scope="col">Last Update</th>
                       <th scope="col">Is Active</th>
                       
               </tr>
       </thead>
       <tbody>
       @if ($users)
       @foreach($users as $user)
				 <tr class='clickable-row' id="{{$user->Id}}">
				  <th scope="row">{{$user->Id}}</th>
				  <td class ="fname">{{$user->first_name}}</td>
				  <td class = "lname">{{$user->last_name}}</td>
				  <td class="uname">{{$user->username}}</td>
				  <td class = "email">{{$user->email}}</td>
				  <td class ="cdate">{{$user->created_at}}</td>
           		  <td class="lupdate">{{$user->last_update_time}}</td>
                  <td class = "active">{{$user->is_active}}</td>
                 
				  </tr>
				  <tr id="edit{{$user->Id}}" class="trdisplaynone"><td colspan="8">@include('formedit')</td></tr>d
		@endforeach
		 @endif
       </tbody>
</table>
 <button type="submit" class="btn btn-primary adduser" id="adduser">Add Nwe User</button>
@include('form')
    
</div>
@endsection