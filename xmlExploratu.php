<?php

	     define("ERABILTZAILEAK_XML", "erabiltzaileak.xml", $case_insensitive=null);
	     //Hemen fitxategia aukeratuz gero, ez da kodea gehiago ikutu behar beste fitxategi batekin probatzeko.
	     
	     
	     
	     
	echo '<head>', "\n";
	echo '<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />';
	echo '</head>', "\n";
		echo('<body>');

	echo('<center>');
echo('<div id="banner"><p> ERABILTZAILEAK XML </p> </div>');
echo('<table id="taula1">');






$erabiltzaile_guztiak = @simplexml_load_file(ERABILTZAILEAK_XML) or header("location:".FILE_SYSTEM_ERROR);
$mail = $_POST['posta'];
			$bilatutakoa = $erabiltzaile_guztiak->xpath("//erabiltzailea[eposta/text()='$mail']");
						 

						
						
	if(sizeof($bilatutakoa) == 0){
		
		
			   echo('<tr><td rowspan="5">EZ DAGO POSTA HORI DUEN ERABILTZAILERIK</td></tr>');
			}else{
				
						$galdera_umeak = $bilatutakoa[0]->children();

				
								echo('<tr><th id="erregistroa">EPOSTA</th><th id="erregistroa">IZENA</th><th id="erregistroa">ABIZENA 1</th><th id="erregistroa">ABIZENA 2</th><th id="erregistroa">TELEFONOA</th></tr>');
				echo('<tr><td>'.$galdera_umeak[0].'</td><td>'.$galdera_umeak[1].'</td><td>'.$galdera_umeak[2].'</td><td>'.$galdera_umeak[3].'</td><td>'.$galdera_umeak[4].'</td></tr>');
				
				
			}

echo('</table>');
echo('<br/><br/>');
echo('<div class="go"><a href="getUserInform.html">Atzera</a></div>');
echo('<br/><br/>');
echo('</center>');
	echo('</body>');


//
	
?>