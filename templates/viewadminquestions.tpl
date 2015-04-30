<script type="text/javascript">
{literal}
function removeQuestion(quizId,frageNr){
		$.post("contents.php",{'action':'deletequestion','quizId': quizId,'frageNr':frageNr},function(data){	
			if (data == "OK") {
				
				showdialog("Frage wurde erfolgreich gelöscht!","loadTableQuestions()","green");
			}
			else{
				showdialog(data,"loadTableQuestions()","red");
			}
			
			
		});
}

function newQuestion_local(){
		newQuestion($("#hiddenquizid").val());
}

$(document).ready(function() 
{		
	
	
}	
); 
{/literal}
</script>


<table width="100%" border="0" id="allQuizes" cellspacing="1">
<thead> 
    <tr>
		<th>Nr</th>
		<th>Frage</th>	
		<th>Ebene</th>	
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    {foreach from=$data item="entry"}
        <tr bgcolor="{cycle values="#dedede,#eeeeee" advance=false}">
        	<td>{$entry.FRAGE_NR|escape}</td> 
			<td>{$entry.FRAGE|escape}</td> 
			<td>{$entry.EBENE|escape}</td> 
            <td>
	            <a class="internal" href="path=editQuestion&quizId={$entry.QUIZ_ID|escape}&frageNr={$entry.FRAGE_NR|escape}" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeQuestion({$entry.QUIZ_ID|escape},{$entry.FRAGE_NR|escape});"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    {foreachelse}
        <tr>
            <td style="text-align:center;" colspan="6">Es sind noch keine Fragen angelegt!</td>
        </tr>
    {/foreach}
</tbody>
</table>
<div id="new"><a class="internal" href="javascript:void(0);" onClick="javascript:newQuestion_local();" ><img src="images/edit.png" width="16" height="16" title="Neues Quiz" />Neue Frage anlegen</a></div>