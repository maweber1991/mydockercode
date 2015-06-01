/*
   * Millionenshow
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

// Funktion lasst den Ladebalken verschwinden, sodass wieder der Inhalt angezeigt wird
function fadein(){
	
	$("#background_loading").fadeOut(wait);
}

// Funktion um die Startseite einzublenden
function startseiteAnzeigen(){
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'isactivequiz'},function(data){
			$("#all").html(data);	
			$.post("contents.php",{'action':'viewadministratorlinks'},function(data){
				$("#navigation").html(data);	
				fadein();
			});
		});
	});
}

// Funktion um ein neues Quiz zu starten
function startQuiz(quizID) {
	$("#background_loading").fadeIn(wait,function() {
		
		$.post("contents.php",{'action':'createquiz', 'quizID': quizID},function(data){

			if(data=="OK"){
				$("#all").html("Quiz erfolgreich angelegt!");
				
				$.post("contents.php",{'action':'showquiz','ebene':1},function(data){
					$("#all").html(data);
				});
				
			}
			else{
				data = data + "<br/><a href='index.php'>Zurück zur Quiz-Übersicht</a>";
				$("#all").html(data);
				//todo fehlermeldung
			}
			
			fadein();
		});
	});
	
	
}


// Funktion um alle Benutzer anzuzeigen
function viewAdminUsers() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'viewadminusers'},function(data){	
			$("#all").html(data);
			fadein();
			
		});
	});
}

// Funktion Editiermaske für Benutzer anzuzeigen
function editUser(userId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'edituser','userId':userId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

// Funktion die Neuanlage eines Benutzers anzuzeigen
function newUser() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newuser'},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

// Funktion die Übersicht der Verfügbaren Quiz anzuzeigen
function viewAdminQuizes() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'viewadminquizes'},function(data){	
			$("#all").html(data);
			fadein();
			
		});
	});
}

// Funktion um die Editiermaske eines Quiz anzuzeigen
function editQuiz(quizId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'editquiz','quizId':quizId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

// Funktion um die Neuanlage eines Quiz anzuzeigen
function newQuiz() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newquiz'},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

// Funktion um die Editiermaske von Fragen anzuzeigen
function editQuestion(quizId,frageNr) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'editquestion','quizId':quizId,'frageNr':frageNr},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

// Funktion um die Neuanlage eines Quiz anzuzeigen
function newQuestion(quizId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newquestion','quizId':quizId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}
