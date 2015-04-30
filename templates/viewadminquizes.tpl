<script type="text/javascript">
{literal}
function removeQuiz(quizId){
		$.post("contents.php",{'action':'deletequiz','quizId': quizId},function(data){	
			if (data == "OK") {
				showdialog("Quiz wurde erfolgreich gelöscht.","viewAdminQuizes()","green");
			}
			else{

				showdialog(data,"viewAdminQuizes()","red");
			}

			
		});
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
		<th>ID</th>
		<th>Bezeichnung</th>
		<th>Beschreibung</th>		
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    {foreach from=$data item="entry"}
        <tr bgcolor="{cycle values="#dedede,#eeeeee" advance=false}">
        	<td>{$entry.QUIZ_ID|escape}</td> 
        	<td>{$entry.BEZEICHNUNG|escape}</td> 
			<td>{$entry.BESCHREIBUNG|escape}</td> 
			
            <td>
	            <a class="internal" href="path=editQuiz&quizId={$entry.QUIZ_ID|escape}" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeQuiz({$entry.QUIZ_ID|escape});"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    {foreachelse}
        <tr>
            <td style="text-align:center;" colspan="6">Keine Quiz sind zur Zeit angelegt!</td>
        </tr>
    {/foreach}
</tbody>
</table>
<br/>
<div id="new"><a class="internal" href="path=newQuiz" ><img src="images/edit.png" width="16" height="16" title="Neues Quiz" />Neues Quiz anlegen</a></div>