<?php /* Smarty version 2.6.26, created on 2015-04-29 14:24:00
         compiled from quiz.tpl */ ?>
<script type="text/javascript"> 
<?php echo '
	var jokerused = false;
	function pruefeAntwort(antwort_id){
		
		var frage_nr = $("#hiddenfrage_nr").val();
		var ebene = parseInt($("#hiddenebene").val());
		
		$.post("contents.php",{\'action\':\'isrightanswer\', \'antwort_id\': antwort_id,\'frage_nr\': frage_nr},function(data){
			
			if(data == "RICHTIG" || data !=="0"){
				if (data == "RICHTIG"){
					$("#antwort" + antwort_id).css(\'background-color\', \'green\');
				}
				else{
					$("#antwort" + antwort_id).css(\'background-color\', \'red\');
					$("#antwort" + data).css(\'background-color\', \'green\');
				}
				
				showWaiting();
				
				
				setTimeout(function() {
					$("#waiting6").hide();
					setTimeout(function() {
						$("#waiting5").hide();
						setTimeout(function() {
							$("#waiting4").hide();
							setTimeout(function() {
								$("#waiting3").hide();
								setTimeout(function() {
									$("#waiting2").hide();
									setTimeout(function() {
										$("#waiting1").hide();
										$("#waiting").hide();
										
										if (data == "RICHTIG"){
											if(ebene < 15){
													$("#background_loading").fadeIn(quizWait,function() {
								
													$.post("contents.php",{\'action\':\'showquiz\'},function(data){
														$("#all").html(data);
														fadein();
													});
												});
											}
											else{
												showdialog("Quiz erfolgreich beendet!","startseiteAnzeigen()","green");
											}	
										}
										else{
											quizBeenden();
										}
										
									},waitNext);
								},waitNext);
							},waitNext);
						},waitNext);
					},waitNext);
				},waitNext);
				
				
				
			}
			else{
				showdialog("Es ist ein Fehler aufgetreten!","startseiteAnzeigen()","red");
			}
			
			
		});
	}
	

	
	function showWaiting(){
		$("#waiting1").show();
		$("#waiting2").show();
		$("#waiting3").show();
		$("#waiting4").show();
		$("#waiting5").show();
		$("#waiting6").show();
		$("#waiting").show();
	}
	
	function fadein(){
	
		$("#background_loading").fadeOut(quizWait);
	}
	
	function quizBeenden(){
		$("#background_loading").fadeIn(quizWait,function() {
			
			$.post("contents.php",{\'action\':\'quizbeenden\'},function(data){
				$("#all").html(data);
				fadein();
				$.post("contents.php",{\'action\':\'viewadministratorlinks\'},function(data){
					$("#navigation").html(data);	
				});
			});
		});
	
	}
	
	function useJoker(jokerId){
		if(jokerused)
		{
			showdialog("Es kann nur ein Joker pro Frage verwendet werden","","red");
			
		}
		else{
		
			var jokeranz = parseInt($("#hiddenjokeranz").val());
			if(jokeranz){
			
			}
			else
			{
				jokeranz = 0;
			}
		
			
			var frage_nr = $("#hiddenfrage_nr").val();
			
			if(jokerId>jokeranz ){
				
				$.post("contents.php",{\'action\':\'usejoker\',\'frage_nr\': frage_nr},function(data){
		
					if(data=="FEHLER"){
						showdialog("Es ist ein Fehler aufgetreten!","","red");
					}
					else{
						var res = data.split(";");

						
						$("#joker_end" + jokerId).show();
						$("#antwort" + res[0]).html("");
						$("#antwort" + res[1]).html("");
						jokerused=true;
					}
				});
			
			
				
				
			}	
		}
		
	}
	
	$(document).ready(function() 
	{		
		
		jokeranz = parseInt($("#hiddenjokeranz").val());
		if(jokeranz>=1){
			$("#joker_end1").show();
		}
		if(jokeranz>=2){
			$("#joker_end2").show();
		}
		if(jokeranz>=3){
			$("#joker_end3").show();
		}
		
		ebene = $("#hiddenebene").val();
		$("#stufe" + ebene).css(\'background-color\', \'green\');
	}	
	); 

	
	
'; ?>

</script>
<input type="hidden" id="hiddenfrage_nr" name="frage_nr" value="<?php echo $this->_tpl_vars['FRAGE_NR']; ?>
"></input>
<input type="hidden" id="hiddenebene" name="ebene" value="<?php echo $this->_tpl_vars['EBENE']; ?>
"></input>
<input type="hidden" id="hiddenjokeranz" name="joker" value="<?php echo $this->_tpl_vars['ANZ_VERW_JOKER']; ?>
"></input>
<div id="all_quiz" style="" >
	<div id="stufen">
		<ul>
			<li><div class="stufe" id="stufe15">15</div></li>
			<li><div class="stufe" id="stufe14">14</div></li>
			<li><div class="stufe" id="stufe13">13</div></li>
			<li><div class="stufe" id="stufe12">12</div></li>
			<li><div class="stufe" id="stufe11">11</div></li>
			<li><div class="stufe" id="stufe10">10</div></li>
			<li><div class="stufe" id="stufe9">9</div></li>
			<li><div class="stufe" id="stufe8">8</div></li>
			<li><div class="stufe" id="stufe7">7</div></li>
			<li><div class="stufe" id="stufe6">6</div></li>
			<li><div class="stufe" id="stufe5">5</div></li>
			<li><div class="stufe" id="stufe4">4</div></li>
			<li><div class="stufe" id="stufe3">3</div></li>
			<li><div class="stufe" id="stufe2">2</div></li>
			<li><div class="stufe" id="stufe1">1</div></li>
		</ul>
	</div>
	<div id="joker">
		<div id="joker1">
			<div id="joker_end1" class="joker_end">
				X
			</div>
			<a href="javascript:void(0);" onClick="javascript:useJoker(1);">
				<div class="jokertext">
					50:50
				</div>
			</a>
		</div>	
		<div id="joker2">
			<div id="joker_end2" class="joker_end">
				X
			</div>
			<a href="javascript:void(0);" onClick="javascript:useJoker(2);">
				<div class="jokertext">
					50:50
				</div>
			</a>

		</div>	
		<div id="joker3">
			<div id="joker_end3" class="joker_end">
				X
			</div>
			<a href="javascript:void(0);" onClick="javascript:useJoker(3);">
				<div class="jokertext">
					50:50
				</div>
			</a>

			
		</div>	
	</div>
	<div id="frageFenster">
	<?php echo $this->_tpl_vars['FRAGE']; ?>

	</div>
	<a href="javascript:void(0);" onClick="javascript:pruefeAntwort(1);">
		<div class="antwort" id="antwort1">
			A: <?php echo $this->_tpl_vars['ANTWORT1']; ?>

		</div>
	</a>
	<a href="javascript:void(0);" onClick="javascript:pruefeAntwort(2);">
		<div class="antwort" id="antwort2">
			B: <?php echo $this->_tpl_vars['ANTWORT2']; ?>

		</div>
	</a>
	<a href="javascript:void(0);" onClick="javascript:pruefeAntwort(3);">
		<div class="antwort" id="antwort3">
			C: <?php echo $this->_tpl_vars['ANTWORT3']; ?>

		</div>
	</a>
	<a href="javascript:void(0);" onClick="javascript:pruefeAntwort(4);">
		<div class="antwort" id="antwort4">
			D: <?php echo $this->_tpl_vars['ANTWORT4']; ?>

		</div>
	</a>
	
	<a href="javascript:void(0);" onClick="javascript:quizBeenden();">
		<div id="ende">
			<img src="images/end.png" alt="Beenden" height="32" width="32">
			
		</div>
	</a>
</div>