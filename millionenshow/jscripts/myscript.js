function fadein(){
	
	$("#background_loading").fadeOut(wait);
}

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

function startQuiz(quizID) {

	

	$("#background_loading").fadeIn(wait,function() {
	
		/*var createQuizPage = "contents.php?action=createquiz&quizID=" + quizID;
			$.get(createQuizPage, {'action':'createquiz', 'quizID': quizID}, function(data){
				 $("#all").html(data);
				 fadein();
			});
	*/
	
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
	
	//$("#quiz_"+id).html("");
	
	
}



function viewAdminUsers() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'viewadminusers'},function(data){	
			$("#all").html(data);
			fadein();
			
		});
	});
}

function editUser(userId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'edituser','userId':userId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}
function newUser() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newuser'},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

function viewAdminQuizes() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'viewadminquizes'},function(data){	
			$("#all").html(data);
			fadein();
			
		});
	});
}

function editQuiz(quizId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'editquiz','quizId':quizId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}
function newQuiz() {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newquiz'},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}

function editQuestion(quizId,frageNr) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'editquestion','quizId':quizId,'frageNr':frageNr},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}
function newQuestion(quizId) {
	$("#background_loading").fadeIn(wait,function() {
		$.post("contents.php",{'action':'newquestion','quizId':quizId},function(data){	
			$("#all").html(data);
			fadein();
		});
	});
}
