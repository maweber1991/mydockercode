<?php
session_start();
require_once ("init.php");

if (isset($_POST['action']))
{

	$content = new Contents();
	switch($_POST['action']) {
		case 'viewallusers':
			$users = $content->getUsers();
			echo $content->displayTableUsers($users);
			break;	
		
		case 'viewadminquestions':	

			if($content->isAdmin()){
				$questions = $content->getQuestions($_POST["quizId"]);
				echo $content->viewAdminQuestions($_POST["quizId"],$questions);
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'viewquizes':	
			$quizes = $content->getQuizes();
			echo $content->displayTableQuizes($quizes);
			break;
			
		case 'createquiz':
			$meldung = $content->createQuiz($_POST['quizID']);
			echo $meldung;
			break;
			
		case 'showquiz':
			echo $content->showQuiz();
			break;
			
		case 'isrightanswer':
			if(isset($_POST['antwort_id'])){
				echo $content->checkAnswer($_POST['antwort_id'],$_POST['frage_nr']);
			}
			else{
				echo "0";
			}
			break;
			
		case 'usejoker':
			if(isset($_POST['frage_nr'])){
				echo $content->useJoker($_POST['frage_nr']);
			}
			else{
				echo "FEHLER";
			}
			
			break;
		case 'isactivequiz':
			$meldung = $content->isActiveQuiz();
			if($meldung=="OK"){
				echo $content->showQuiz();
			}
			else{
				$quizes = $content->getQuizes();
				echo $content->displayTableQuizes($quizes);
			}
			break;
			
		case 'quizbeenden':
			$content->quizBeenden();
			$quizes = $content->getQuizes();
			echo $content->displayTableQuizes($quizes);
			break;
			
		case 'viewadministratorlinks':
			if($content->isAdmin()){
				echo $content->viewAdministratorLinks();
			}
			else
			{
				echo '<div id="adminlinks"><ul>
				<li><a href="logout.php">Abmelden</a></li>
				<li><a class="internal" href="path=startseiteAnzeigen">Home</a></li>
				</ul>	</div>';
			}
			break;
			
		
		case 'viewadminusers':
			if($content->isAdmin()){
				$users = $content->getUsers();
				echo $content->viewAdminUsers($users);
			}
			else{
				echo "<div id='error'>Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!</div>";
			}
			break;
			
		case 'deleteuser':
			
			if($content->isAdmin()){
				if ($_POST['userId']) {
					echo $content->deleteUser($_POST['userId']);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		
		case 'edituser':
			if($content->isAdmin()){
				if ($_POST['userId']) {
					$userdata =  $content->getUser($_POST['userId']);
					echo $content->viewEditUserForm($_POST['userId'], $userdata);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'editusersubmit':
			if($content->isAdmin()){
				if ($_POST['userid']) {
					echo $content->editUser($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
			
		case 'newuser':
			if($content->isAdmin()){
				echo $content->viewNewUserForm();
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'newusersubmit':
			if($content->isAdmin()){
				if ($_POST['username']) {
					echo $content->newUser($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
			
		//---------------------
			
		case 'viewadminquizes':
			if($content->isAdmin()){
				$quizes = $content->getAllQuizes();
				echo $content->viewAdminQuizes($quizes);
			}
			else{
				echo "<div id='error'>Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!</div>";
			}
			break;
			
		case 'deletequiz':
			
			if($content->isAdmin()){
				if ($_POST['quizId']) {
					echo $content->deleteQuiz($_POST['quizId']);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		
		case 'deletequestion':
			
			if($content->isAdmin()){
				if ($_POST['quizId'] && $_POST['frageNr']) {
					echo $content->deleteQUestion($_POST['quizId'],$_POST['frageNr']);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		
		case 'editquiz':
			if($content->isAdmin()){
				if ($_POST['quizId']) {
					$quizdata =  $content->getQuiz($_POST['quizId']);
					echo $content->viewEditQuizForm($_POST['quizId'], $quizdata);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'editquizsubmit':
			if($content->isAdmin()){
				if ($_POST['quizId']) {
					echo $content->editQuiz($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
		
		case 'editquestion':
			if($content->isAdmin()){
				if ($_POST['quizId'] && $_POST['frageNr']) {
					$questiondata =  $content->getQuestion($_POST['quizId'],$_POST['frageNr']);
					echo $content->viewEditQuestionForm($_POST['quizId'], $_POST['frageNr'], $questiondata);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'editquestionsubmit':
			if($content->isAdmin()){
				if ($_POST['quizId'] && $_POST['frageNr']) {
					echo $content->editQuestion($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
		
		case 'newquiz':
			if($content->isAdmin()){
				echo $content->viewNewQuizForm();
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'newquizsubmit':
			if($content->isAdmin()){
				if ($_POST['bezeichnung']) {
					echo $content->newQuiz($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
		case 'newquestion':
			if($content->isAdmin()){
				if ($_POST['quizId']) {
					echo $content->viewNewQuestionForm($_POST);
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}
			break;
		case 'newquestionsubmit':
			if($content->isAdmin()){
				if ($_POST['quizId']) {
					echo $content->newQuestion($_POST);
				}	
				else{
					echo "Beim speichern ist ein Fehler aufgetreten!";
				}
			}
			else{
				echo "Sie haben keine Berechtigungen zum Ausführen dieses Bereiches!";
			}			
			break;
	}
}

class Contents {

	var $sql = null;
	var $tpl = null;

	var $error = null;
	
	function Contents() {
		$this->tpl = new TemplatesEngine();
		$this->sql = new DB(DB_DATABASE, DB_SERVER, DB_USER, DB_PASS);
	}
	
	
	function editQuiz($data = array()) {
	
		$quizId = $data['quizId'];
		$bezeichnung = $this->sql->dbquote($data['bezeichnung']);	
		$beschreibung = $this->sql->dbquote($data['beschreibung']);
		
		$query = "UPDATE quiz set ";
		$query .= "
		bezeichnung = $bezeichnung, 
		beschreibung = $beschreibung";
		
		$query .= " WHERE quiz_id = " . $quizId;
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Das Quiz konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function editQuestion($data = array()) {
	
		$quizId = $data['quizId'];
		$frageNr = $data['frageNr'];
		$frage = $this->sql->dbquote($data['frage']);	
		$antwort_richtig = $this->sql->dbquote($data['antwort_richtig']);
		$antwort_falsch1 = $this->sql->dbquote($data['antwort_falsch1']);
		$antwort_falsch2 = $this->sql->dbquote($data['antwort_falsch2']);
		$antwort_falsch3 = $this->sql->dbquote($data['antwort_falsch3']);
		$ebene = $this->sql->dbquote($data['ebene']);
		
		$query = "UPDATE quiz_fragen set ";
		$query .= "
		antwort_falsch1 = $antwort_falsch1, 
		antwort_falsch2 = $antwort_falsch2, 
		antwort_falsch3 = $antwort_falsch3, 
		ebene = $ebene, 
		frage = $frage, 
		antwort_richtig = $antwort_richtig";
		
		$query .= " WHERE quiz_id = $quizId and frage_nr = $frageNr ";
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Die Frage konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function newQuiz($data = array()) {
	
		
		$bezeichnung = $this->sql->dbquote($data['bezeichnung']);	
		$beschreibung = $this->sql->dbquote($data['beschreibung']);
		
		
		$query = "insert into quiz (bezeichnung,beschreibung) values( ";
		$query .= "
		$bezeichnung, $beschreibung)";
		
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Das Quiz konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function newQuestion($data = array()) {
	
		
		$quizId = $data['quizId'];
		$frageNr = 1;
		$frage = $this->sql->dbquote($data['frage']);	
		$antwort_richtig = $this->sql->dbquote($data['antwort_richtig']);
		$antwort_falsch1 = $this->sql->dbquote($data['antwort_falsch1']);
		$antwort_falsch2 = $this->sql->dbquote($data['antwort_falsch2']);
		$antwort_falsch3 = $this->sql->dbquote($data['antwort_falsch3']);
		$ebene = $this->sql->dbquote($data['ebene']);
		
		$query = "SELECT ifnull(max(frage_nr),0)+1 as frage_nr from quiz_fragen 
			where quiz_id = $quizId";
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		$frageNr = $row["frage_nr"];
		
		$query = "insert into quiz_fragen (quiz_id,frage_nr,frage,antwort_richtig,antwort_falsch1,
			antwort_falsch2,antwort_falsch3, ebene) values( ";
		$query .= "
		$quizId, $frageNr,$frage,$antwort_richtig, $antwort_falsch1, $antwort_falsch2, $antwort_falsch3 ,$ebene)";
		
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Die Frage konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function viewEditQuizForm($quizId, $formvars = array()) {
		
		$this->tpl->assign('post',$formvars);
		$this->tpl->assign('error', $this->error);
		$this->tpl->assign('ACTION', "editquizsubmit");
		$this->tpl->assign('QUIZID', $quizId);
		$this->tpl->display('edit_quiz.tpl');
	}
	
	
	
	function viewEditQuestionForm($quizId,$frageNr, $formvars = array()) {
		
		$this->tpl->assign('post',$formvars);
		$this->tpl->assign('error', $this->error);
		$this->tpl->assign('ACTION', "editquestionsubmit");
		$this->tpl->assign('QUIZID', $quizId);
		$this->tpl->assign('FRAGENR', $frageNr);
		$this->tpl->display('edit_question.tpl');
	}
	
	function viewNewQuizForm() {
		
		$this->tpl->assign('ACTION', "newquizsubmit");
		$this->tpl->display('edit_quiz.tpl');
	}
	
	function viewNewQuestionForm($formvars = array()) {
		
		$this->tpl->assign('ACTION', "newquestionsubmit");
		$this->tpl->assign('QUIZID', $formvars["quizId"]);
		$this->tpl->display('edit_question.tpl');
	}
	
	function getQuestions($quizId) {
		$ret = array();
		$query = "SELECT * from quiz_fragen 
			where quiz_id = $quizId order by frage_nr, ebene ";
		$result = $this->sql->query($query);
		while ($frage = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC))
		{
			
			$ret[] = $frage;
		}
		return $ret;
	}
	
	function getQuestion($quizId,$frageNr) {
		$ret = array();
		$query = "SELECT * from quiz_fragen 
			where quiz_id = $quizId and frage_nr = $frageNr order by frage_nr, ebene ";
		$result = $this->sql->query($query);
		$frage = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		return $frage;
	}
	
	function viewAdminQuestions($quizId,$data = array()) {
		$this->tpl->assign('QUIZID', $data);
		$this->tpl->assign('data', $data);
		$this->tpl->display('viewadminquestions.tpl');
	}
	
	function getQuizes() {
		$ret = array();
		// nur quizes anzeigen bei denen pro ebene mindestens 1 frage definiert ist (sum = 120)
		$query = "SELECT 	* from quiz 
		WHERE quiz_id
			IN (

			SELECT quiz_id summe
			FROM quiz_fragen
			WHERE quiz_id = quiz.quiz_id
			HAVING SUM( DISTINCT ebene ) =120
			)
		order by quiz_id 
		";
		$result = $this->sql->query($query);
		while ($quiz = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC))
		{
			//echo $user["username"];
			$ret[] = $quiz;
		}
		return $ret;
	}
	
	function getAllQuizes() {
		$ret = array();
		$query = "SELECT 	* from quiz order by quiz_id ";
		$result = $this->sql->query($query);
		while ($quiz = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC))
		{
			//echo $user["username"];
			$ret[] = $quiz;
		}
		return $ret;
	}
	
	function getQuiz($quizId) {
		$ret = array();
		$query = "SELECT * from quiz WHERE quiz_id = " . $quizId;
		$result = $this->sql->query($query);
		$quiz = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		return $quiz;
	}
	
	function deleteQuiz($quizId) {
		$query = "DELETE FROM quiz WHERE quiz_id = " . $quizId;
		$result = $this->sql->execute($query);
		if (!$result) {
			return "Das Quiz konnte nicht gel&ouml;scht werden!";
		}
		
		return "OK";
	}
	
	function deleteQuestion($quizId,$frageNr) {
		$query = "DELETE FROM quiz_fragen WHERE quiz_id = $quizId and frage_nr = $frageNr ";
		$result = $this->sql->execute($query);
		if (!$result) {
			return "Diese Frage konnte nicht gel&ouml;scht werden!";
		}
		
		return "OK";
	}
		
	function viewAdminQuizes($data = array()) {
		$this->tpl->assign('data', $data);
		$this->tpl->display('viewadminquizes.tpl');
	}
	
	
	function viewAdministratorLinks() {
		$this->tpl->display('adminlinks.tpl');
	}
	
	function editUser($data = array()) {
	
		$userIdToUpdate = $data['userid'];
		$username = $this->sql->dbquote($data['username']);	
		$passwort = $this->sql->dbquote($data['passwort']);
		$passwortMd5 = $this->sql->dbquote(md5($data['passwort']));
		$email = $this->sql->dbquote($data['email']);
		
		$is_admin=0;
		if(isset($data['is_admin'])){
			$is_admin = 1;
		}
		
		
		$query = "UPDATE users set ";
		$query .= "
		username = $username, 
		passwort = $passwortMd5,
		email = $email,
		is_admin = $is_admin";
		
		$query .= " WHERE user_id = " . $userIdToUpdate;
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Der User konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function newUser($data = array()) {
	
		
		$username = $this->sql->dbquote($data['username']);	
		$passwort = $this->sql->dbquote($data['passwort']);
		$passwortMd5 = $this->sql->dbquote(md5($data['passwort']));
		$email = $this->sql->dbquote($data['email']);
		$is_admin=0;
		if(isset($data['is_admin'])){
			$is_admin = 1;
		}
		
		$query = "insert into users (username,passwort,email,is_admin) values( ";
		$query .= "
		$username, $passwortMd5, $email, $is_admin)";
		
			
		$result = $this->sql->execute($query, false);
		if (!$result) {
			return "Der User konnte nicht in der Datenbank gespeichert werden!" . $query;
		}
			
		return "OK";
	}
	
	function viewEditUserForm($userId, $formvars = array()) {
		
		$this->tpl->assign('post',$formvars);
		$this->tpl->assign('error', $this->error);
		$this->tpl->assign('ACTION', "editusersubmit");
		$this->tpl->assign('USERID', $userId);
		$this->tpl->display('edit_user.tpl');
	}
	
	function viewNewUserForm() {
		

		$this->tpl->assign('ACTION', "newusersubmit");

		$this->tpl->display('edit_user.tpl');
	}
	
	function getUsers() {
		$ret = array();
		$query = "SELECT * from users  order by  user_id ";
		$result = $this->sql->query($query);
		while ($user = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC))
		{
			$ret[] = $user;
		}
		return $ret;
	}
	
	function getUser($userId) {
		$ret = array();
		$query = "SELECT * from users WHERE user_id = " . $userId;
		$result = $this->sql->query($query);
		$user = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		return $user;
	}
	
	function deleteUser($userId) {
		$query = "DELETE FROM users WHERE user_id = " . $userId;
		$result = $this->sql->execute($query);
		if (!$result) {
			return "Der User konnte nicht gel&ouml;scht werden!";
		}
		
		return "OK";
	}
		
	function viewAdminUsers($data = array()) {
		$this->tpl->assign('data', $data);
		$this->tpl->display('viewadminusers.tpl');
	}
	
	function isAdmin() {
		$user_id = $_SESSION["user_id"];
		$ret = array();
		$query = "SELECT is_admin from users where user_id =$user_id ";
		$result = $this->sql->query($query);
		$user = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		if($user["is_admin"]==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	function isActiveQuiz(){
		
		$user_id = $_SESSION["user_id"];
		//sessions löschen die abgeschlossen sind
		$query = " delete from sessions
				 where  sessions.user_id = $user_id and 
					(sessions.is_ende = 1 
						or exists(select 1 from sessions_fragen sf where sessions.session_id = 
							sf.session_id and is_beantwortet = 2)
						or not exists (select 1 from sessions_fragen sf where sessions.session_id = 
							sf.session_id and is_beantwortet is null))" ;
		$result = $this->sql->execute($query);
		

		$query = "SELECT 1 as bexists
			from sessions 
			left join sessions_fragen sf on sessions.session_id = sf.session_id
			where sessions.user_id = $user_id ";
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		$exists =  $row["bexists"];
		
		if($exists == 1){
			
			return "OK";
		}
		else{
			return "NOT OK";
		}
		
	}
	
	function quizBeenden(){
		
		$user_id = $_SESSION["user_id"];
		//sessions löschen die abgeschlossen sind
		$query = "update sessions set is_ende = 1 
					where user_id = $user_id " ;
			$result = $this->sql->execute($query);
		
	}
	
	function useJoker($frage_nr){
		
		$user_id = $_SESSION["user_id"];
		$query = "SELECT sf.richtige_antwort_id as richtige_antwort_id,
			sf.session_id as session_id,
			sessions.anz_verw_joker as anz_verw_joker
			from sessions 
			left join sessions_fragen sf on sessions.session_id = sf.session_id
			where sf.frage_nr = $frage_nr and sessions.user_id = $user_id 
				and is_beantwortet is null ";
				
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		$richtige_antwort =  intval($row["richtige_antwort_id"]);
		$anz_verw_joker =  intval($row["anz_verw_joker"]);
		if(is_null($anz_verw_joker)){
			$anz_verw_joker = 0;
		}


		if($anz_verw_joker<3){
		
			$session_id =  $row["session_id"];
			$erst_falsche_antwort = 5;
			$ret = "";
			
			for($i=1;$i<=2;){
				$zufallszahl = mt_rand( 1 , 4 );
				
				if ($zufallszahl!==$richtige_antwort && $zufallszahl !== $erst_falsche_antwort){
					
					$ret = $ret . $zufallszahl . ";";
					$erst_falsche_antwort = $zufallszahl;
					$i++;
				}
			}
			
			if (strcmp($ret, "")== 0){
				//keine Antworten
			}
			else{
				$anz_verw_joker++;
				
				$query = "update sessions set anz_verw_joker = $anz_verw_joker
					where session_id = $session_id " ;
				$result = $this->sql->execute($query);
				
			}
		}
		else{
			$ret = "FEHLER";
		}
		return $ret;
		
		
	}
	
	function checkAnswer($answer_id,$frage_nr){
		
		$user_id = $_SESSION["user_id"];
		$query = "SELECT sf.richtige_antwort_id as richtige_antwort_id,
			sf.session_id as session_id
			from sessions 
			left join sessions_fragen sf on sessions.session_id = sf.session_id
			where sf.frage_nr = $frage_nr and sessions.user_id = $user_id 
				and is_beantwortet is null ";
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		$zufallszahl =  $row["richtige_antwort_id"];
		$session_id =  $row["session_id"];
		
		if($answer_id == $zufallszahl){
		
			$query = "update sessions_fragen set is_beantwortet = 1 
					where session_id = $session_id and frage_nr = $frage_nr " ;
			$result = $this->sql->execute($query);
		
			return "RICHTIG";
		}
		else{
			$query = "update sessions_fragen set is_beantwortet = 2 
					where session_id = $session_id and frage_nr = $frage_nr " ;
			$result = $this->sql->execute($query);
			return $zufallszahl;
		}
		
	}
	
	function showQuiz() {
		
		$user_id = $_SESSION["user_id"];
		$query = "SELECT sessions.session_id as session_id,
			sessions.anz_verw_joker as anz_verw_joker,
			qf.frage as frage,
			qf.antwort_richtig as antwort_richtig,
			qf.antwort_falsch1 as antwort_falsch1,
			qf.antwort_falsch2 as antwort_falsch2,
			qf.antwort_falsch3 as antwort_falsch3,
			sf.richtige_antwort_id as richtige_antwort_id,
			sf.frage_nr as frage_nr,
			qf.ebene as ebene
			from sessions 
			left join sessions_fragen sf on sessions.session_id = sf.session_id
			left join quiz_fragen qf on sf.quiz_id = qf.quiz_id and sf.frage_nr = qf.frage_nr
			where 
			(sf.is_beantwortet is null)
			 and sessions.user_id = $user_id 
			 order by qf.ebene";
			
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		$sesison_id = $row["session_id"];
		$anz_verw_joker = $row["anz_verw_joker"];
		$frage = $row["frage"];
		
		$this->tpl->assign('SESSION_ID', $sesison_id);
		$this->tpl->assign('ANZ_VERW_JOKER', $anz_verw_joker);
		$this->tpl->assign('FRAGE', $row["frage"]);
		$this->tpl->assign('FRAGE_NR', $row["frage_nr"]);
		$this->tpl->assign('EBENE', $row["ebene"]);
		
		$zufallszahl =  $row["richtige_antwort_id"];
		
		
		
		if ($zufallszahl == 1){
			$this->tpl->assign('ANTWORT1', $row["antwort_richtig"]);
			$this->tpl->assign('ANTWORT2', $row["antwort_falsch1"]);
			$this->tpl->assign('ANTWORT3', $row["antwort_falsch2"]);
			$this->tpl->assign('ANTWORT4', $row["antwort_falsch3"]);
		}
		else if ($zufallszahl == 2){
			$this->tpl->assign('ANTWORT2', $row["antwort_richtig"]);
			$this->tpl->assign('ANTWORT4', $row["antwort_falsch1"]);
			$this->tpl->assign('ANTWORT1', $row["antwort_falsch2"]);
			$this->tpl->assign('ANTWORT3', $row["antwort_falsch3"]);
		}
		else if ($zufallszahl == 3){
			$this->tpl->assign('ANTWORT3', $row["antwort_richtig"]);
			$this->tpl->assign('ANTWORT1', $row["antwort_falsch1"]);
			$this->tpl->assign('ANTWORT4', $row["antwort_falsch2"]);
			$this->tpl->assign('ANTWORT2', $row["antwort_falsch3"]);
		}
		else if ($zufallszahl == 4){
			$this->tpl->assign('ANTWORT4', $row["antwort_richtig"]);
			$this->tpl->assign('ANTWORT2', $row["antwort_falsch1"]);
			$this->tpl->assign('ANTWORT3', $row["antwort_falsch2"]);
			$this->tpl->assign('ANTWORT1', $row["antwort_falsch3"]);
		}

		
		
		$this->tpl->display('quiz.tpl');
		
		
	}

	
	function createQuiz($quiz_id){
	
	
		$user_id = $_SESSION["user_id"];
		$ret = "NOT OK";
		
		$query = "select sum(distinct ebene) as summe from quiz_fragen where quiz_id = " . $quiz_id;
		
		
		
		//120
		//$query = "SELECT USERNAME from users ";
		$result = $this->sql->query($query);
		$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
		
		if (isset($row["summe"]) && $row["summe"] == 120){
		
			$query = "delete from sessions where user_id = $user_id" ;
			$result = $this->sql->execute($query);
			$query = "INSERT INTO sessions (user_id) values ($user_id)" ;
			$result = $this->sql->execute($query);
			
			$query = "select session_id from sessions where user_id = " . $user_id;
			$result = $this->sql->query($query);
			$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
			$session_id = $row["session_id"];
			
			if($session_id >=1){
		
				for($i =1; $i<=15;$i++){
				
					$query = "select count(*) as count from quiz_fragen where ebene= " . $i . " and quiz_id = " . $quiz_id ;
					$result = $this->sql->query($query);
					
					$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
					
					$anzahl = $row["count"];
					//$ret = $query;
					if($anzahl >= 1){
						$zufallszahl =  mt_rand ( 1 , $anzahl );
						$zufallszahl--; //offset
						//$ret = $ret . "<br>Ebene " . $i . ": X " . $zufallszahl;
						
						
						$query = "select quiz_id,frage_nr from quiz_fragen where ebene= " . $i . " and quiz_id = " . $quiz_id 
							. " limit 1 offset " . $zufallszahl ;
						$result = $this->sql->query($query);
						$row = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC);
						$frage_nr = $row["frage_nr"];
						$quiz_id = $row["quiz_id"];
						
						$richtige_antwort_id =  mt_rand ( 1 , 4 );
						
						$query = "INSERT INTO sessions_fragen (session_id,quiz_id,frage_nr,richtige_antwort_id) 
							values ($session_id,$quiz_id,$frage_nr,$richtige_antwort_id)" ;
						$result = $this->sql->execute($query);
						
						
						
					}
					else{
						$ret = $ret . "<br>Fehler beim erstellen des Quiz aufgetreten!";
						return $ret;
					}
					
				}
			}
			else {
			
				$ret = $ret . "<br>Fehler beim erstellen des Quiz aufgetreten!";
			}
			
			$ret = "OK";
		}
		else{
			$ret = "F&uuml;r das ausgew&auml;hlte Quiz wurden zu wenige Fragen definiert!";
		
		}
		//while ($user = $this->sql->fetchNextRowArray($result, MYSQL_ASSOC))
		//{
			//echo $user["username"];
		//	$ret[] = $user;
		//}
		return $ret;
		
		
	}

	
	function displayTableQuizes($data = array()) {

		$this->tpl->assign('data', $data);

		$this->tpl->display('quizes.tpl');
	}

}

?>