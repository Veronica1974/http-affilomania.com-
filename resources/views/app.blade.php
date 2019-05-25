<!-- resources/views/welcome.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
       
    </head>
    <body>
    <div class="container">
      @yield('content')     
    </div>
 <script>
 $(document).ready(function(){
	  $("#adduser").click(function(){
	    $(".containerform").toggle();
	  });

	  $("#cancel").click(function(){
		  $("#adduserform")[0].reset();
		  $(".containerform").hide();
	  });


	  $("#insertuser").click(function(){
		 // e.preventDefault();
		 var is_active = 0;
		 var checked =  "";
		 if ($('#is_active').is(':checked')) {
			 is_active = 1;
			 var checked =  "checked";
		 }
		 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
		  $.ajax({
              url: "{{ url('/create') }}",
              method: 'post',
              data: {
            	  first_name: $('#first_name').val(),
            	  last_name:  $('#last_name').val(),
            	  username:   $('#username').val(),
            	  email:      $('#email').val(),
            	  password:   $('#password').val(),
            	  is_active:  is_active
              },
              success: function(data){
            	 
            	  if(data.error){
                	  $.each(data.error, function(key, value){
                    	  $('.alert-danger').show();
                    	  $('.alert-danger').append('<p>'+value+'</p>');
                		});
            	  }else{
            		 
            		  $('.alert-danger').hide();
            		  var result = data.data[0];
            		  var newrow = '<tr class="clickable-row" id="'+result.Id+'"><th scope="row">'+result.Id+'</th><td>'+result.first_name+'</td><td>'+result.last_name+'</td><td>'+result.username+'</td><td>'+result.email+'</td><td>'+result.created_at+'</td><td>'+result.last_update_time+'</td><td>'+result.is_active+'</td></tr>';
            		  var newrowform = ' <tr id="edit"'+result.Id+'" class="trdisplaynone"><td colspan="8"></td></tr>';
            		  var newrowformtropen = '<tr id="edit'+result.Id+'" class="trdisplaynone"><td colspan="8">';
            		  var formtagopen = '<div class="containereditform"><form class="form-signin" id="editform_{{$user->id}}">';
            		  var tophtml = ' <div class="text-center mb-4"><p></p></div><div class="alert-danger"></div>';
            		  var formtagfirstname = '<div class="form-label-group">'+
            		   '<input type="text" id="first_name_'+result.Id+'" name="first_name" class="form-control" value="'+result.first_name+'" required autofocus>'+
            		    '<label for="inputEmail">Firs Name</label></div>';
            		   var formtaglastname = ' <div class="form-label-group">'+
            			    '<input type="text" id="last_name_'+result.Id+'" name="last_name" class="form-control"  value="'+result.last_name+'" required autofocus>'+
            		    '<label for="inputEmail">Last Name</label></div>';
            		    var formtagemail = ' <div class="form-label-group">'+
            		        '<input type="email" id="email_'+result.Id+'" name="email" class="form-control"  value="'+result.email+'" required autofocus>'+
            		    '<label for="inputEmail">Email address</label></div>';
            		  /*  var formtapassword = ' <div class="form-label-group">'+
            		        '<input type="password" id="password_'+result.Id+'" name="password" class="form-control" value="'+result.password+'" required>'+
            		    '<label for="inputPassword">Password</label></div>';*/

            		    var formtagactive = '<div class="checkbox mb-3"><label><input type="checkbox" id="is_active_'+result.Id+'" name="is_active" value="1" '+checked+'> Active me</label></div>';
              		    var formtagid = ' <input type="hidden" id="custid_'+result.Id+'" name="custid"   value="'+result.Id+'">';   
            		    var formbuttontag = ' <button type="button" class="btn btn-primary edituser" id="edituser_'+result.Id+'">Edit user</button>  '+
            		        '<button type="button" class="btn btn-primary deleteuser" id="deleteuser_'+result.Id+'">Delete use</button>';
            		    var formclosetag = ' </form></div>';
                        var newrowformclose = '</td></tr>';
            		    
            		 // $("#usertable tbody").append(newrow);
            		  $("#usertable tbody").append(newrow+newrowformtropen+formtagopen+tophtml+formtagfirstname+formtaglastname+formtagemail+formtagactive+formtagid+formbuttontag+formclosetag+newrowformclose);
            		  $("#adduserform")[0].reset();
            		  $(".containerform").hide();
            		 
                	  }
            	},
            	error: function(data){
              	  console.log(data);
            		
          	}
                
              });
	  });

	  
	  $(document).on("click", ".clickable-row" , function() {
		  if($("#edit"+this.id).attr('class') == 'trdisplaynone'){
			  $("#edit"+this.id).attr('class', 'trdisplay');
			  
		   }else{
			$("#edit"+this.id).attr('class', 'trdisplaynone');
		    }
		});

		
	  $(".edituser").click(function(){
			 var idarr = $(this).attr('id').split('_');
			 console.log(idarr);
			 console.log($('#first_name_'+idarr[1]).val());
			 var is_active = 0;
			 if ($('#is_active_'+idarr[1]).is(':checked')) {
				 is_active = 1;
			 }
			 $.ajaxSetup({
            	  headers: {
            	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	  }
	          });
			  $.ajax({
	              url: "{{ url('/update') }}",
	              method: 'post',
	              data: {
	            	  first_name: $('#first_name_'+idarr[1]).val(),
	            	  last_name:  $('#last_name_'+idarr[1]).val(),
	            	  username:   $('#username_'+idarr[1]).val(),
	            	  email:      $('#email_'+idarr[1]).val(),
	            	//  password:   $('#password_'+idarr[1]).val(),
	            	  Id:         $('#custid_'+idarr[1]).val(),
	            	  is_active:  is_active
	              },
	              success: function(data){
	            	  console.log(data);
	            	  if(data.error){
	                	  $.each(data.error, function(key, value){
	                    	  $('.alert-danger').show();
	                    	  $('.alert-danger').append('<p>'+value+'</p>');
	                		});
	            	  }else{
        	            		  var result = data.data;
        		            	  $('#'+result.Id+'> .fname').html(result.first_name);
        		            	  $('#'+result.Id+'> .lname').html(result.last_name);
        		            	  $('#'+result.Id+'> .uname').html(result.username);
        		            	  $('#'+result.Id+'> .email').html(result.email);
        		            	  $('#'+result.Id+'> .lupdate').html(result.last_update_time);
        		            	  $('#'+result.Id+'> .active').html(result.is_active);
        		            	  $("#edit"+result.Id).attr('class', 'trdisplaynone');
	                	  }
	            	},
	            	error: function(data){
	              	  console.log(data);
	            		
	          	}
	                
	          });
		  });

	  $(".deleteuser").click(function(){
		  var idarr = $(this).attr('id').split('_');
		  $.ajaxSetup({
        	  headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	  }
          });

		  $.ajax({
              url: "{{ url('/delete') }}",
              method: 'post',
              data: {
            	  Id:         $('#custid_'+idarr[1]).val(),
              },
              success: function(data){
            	  console.log(data);
            	  if(data.error){
                	  $.each(data.error, function(key, value){
                    	  $('.alert-danger').show();
                    	  $('.alert-danger').append('<p>'+value+'</p>');
                		});
            	  }else{
            		  $("#edit"+result.Id).attr('class', 'trdisplaynone');
            		  $('#'+data.Id).remove();
            		  $('#edit'+data.Id).remove();
                	  }
            	},
            	error: function(data){
              	  console.log(data);
            		
          	}
                
          });
          
		 
		});
	});
 </script>
  </body>
</html>
   
