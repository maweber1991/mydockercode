/*
   * Millionenshow - Login
   * 2015, Weber Manuel
   *
   *  This program is free software: you can redistribute it and/or modify
   *  it under the terms of the GNU General Public License as published by
   *  the Free Software Foundation, either version 3 of the License, or
   *  (at your option) any later version.
   *
   *  This program is distributed in the hope that it will be useful,
   *  but WITHOUT ANY WARRANTY; without even the implied warranty of
   *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   *  GNU General Public License for more details.
   *
   *  You should have received a copy of the GNU General Public License
   *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
   * 
*/

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
			url: "do-login.php",  // Login-Informationen an do-login.php senden
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