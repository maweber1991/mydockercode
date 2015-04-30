<script type="text/javascript"> 
{literal}
	
	
	
{/literal}
</script>

<div id="quiz_all">
<h1>W&auml;hlen Sie das gew&uuml;nschte Quiz aus</h1>
	{foreach from=$data item="entry"}
		<a class="internal" href="path=startQuiz&id={$entry.QUIZ_ID|escape}">
			<div class="quiz" id="quiz_{$entry.QUIZ_ID|escape}" style="" >Quiz {$entry.QUIZ_ID|escape}: {$entry.BEZEICHNUNG|escape}
				<br/><br/>
				{$entry.BESCHREIBUNG|escape}
		
			</div>
		</a>
	{/foreach}
</div>
