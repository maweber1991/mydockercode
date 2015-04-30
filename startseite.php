<?php 
require_once("constants.php");
require_once("db.class.php");

echo "<h1>&Uuml;bersicht</h1><br/>"; 

$db = new DB(DB_DATABASE, DB_SERVER, DB_USER, DB_PASS);

$abfrage = "SELECT QUIZ_ID,QUIZ_NAME FROM quiz order by quiz_id";
$result = $db->query($abfrage);

while($row = $db->fetchNextRowArray($result, MYSQL_ASSOC)){
	echo '<div id="quiz_' . $row["QUIZ_ID"] . '" style="height:100px;border:1px solid black;" >Quiz ' . $row["QUIZ_ID"] . '</div>';
	echo '<br/>';
}

?>

