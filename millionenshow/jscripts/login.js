img1 = new Image(16, 16);  
img1.src="images/spinner.gif";

$(document).ready(function(){
	
	
	
	$("#status > form").submit(function(){  
		$('#submit').hide();
		$('#ajax_loading').show();
		$('#login_response').html("");
		var str = $(this).serialize(); 
		
		$.ajax({  
			type: "POST",
			url: "do-login.php",  // Send the login info to this page
			data: str,  
			success: function(msg){  
				
				$(document).ajaxComplete(function(event, request, settings){  
				 

					
					if(msg == 'OK') // LOGIN OK?
					 {  
						 var login_response = '<div id="logged_in">' +
							 '<div style="width: 350px; float: left; margin-left: 70px;">' + 
							 '<div style="width: 40px; float: left;">' +
							 '<img style="margin: 10px 0px 10px 0px;" align="absmiddle" src="images/ajax-loader.gif">' +
							 '</div>' +
							 '<div style="margin: 10px 0px 0px 10px; float: right; width: 300px;">'+ 
							 "Sie haben sich erfolgreich angemeldet!<br />Bitte warten Sie werden weitergeleitet...</div></div>";  

						 
						 
						 

						//
						setTimeout(function(){
							$(this).html(login_response); // Refers to 'status'
							window.location = 'index.php';
						}, 3000); 
					 }  
					 else if(msg) // ERROR?
					 {  
						setTimeout(function(){
							$('#submit').show();
							$('#ajax_loading').hide();
							var login_response = msg;
							$('#login_response').html(login_response);
						}, 3000); 
						
						
					 }  
					 
					
					  
				});  
		   
			} 
		});
		
		return false;
		
	});

});