<script type="text/javascript">
{literal}
function removeUser(userId){
		$.post("contents.php",{'action':'deleteuser','userId': userId},function(data){	
			if (data == "OK") {
				showdialog("User wurde erfolgreich gelöscht.","viewAdminUsers()");
			}
			else{
				showdialog(data,"viewAdminUsers()");
			}
			
			
		});
}

$(document).ready(function() 
{		

}	
); 
{/literal}
</script>


<table width="100%" border="0" id="allUsers" cellspacing="1">
<thead> 
    <tr>
		<th>ID</th>
		<th>Username</th>
		<th>Administrator</th>		
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    {foreach from=$data item="entry"}
        <tr bgcolor="{cycle values="#dedede,#eeeeee" advance=false}">
        	<td>{$entry.USER_ID|escape}</td> 
        	<td>{$entry.USERNAME|escape}</td> 
			<td><input onclick="return false;"  onkeydown="return false;" type="checkbox" {if $entry.IS_ADMIN == 1}checked{/if}></td>	
            <td>
	            <a class="internal" href="path=editUser&userId={$entry.USER_ID|escape}" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeUser({$entry.USER_ID|escape});"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    {foreachelse}
        <tr>
            <td style="text-align:center;" colspan="6">Keine User sind zur Zeit angelegt!</td>
        </tr>
    {/foreach}
</tbody>
</table>
<br/>
<div id="new"><a class="internal" href="path=newUser" ><img src="images/edit.png" width="16" height="16" title="Neuer User" />Neuen User anlegen</a></div>
