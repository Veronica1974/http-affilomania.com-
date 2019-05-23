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
		 if ($('#is_active').is(':checked')) {
			 is_active = 1;
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
            		  $("#usertable tbody").append(newrow);
            		  $("#usertable tbody").append(newrowform);
                	  }
            	},
            	error: function(data){
              	  console.log(data);
            		
          	}
                
              });
	  });

	  
	  $(".clickable-row").click(function(){
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
    