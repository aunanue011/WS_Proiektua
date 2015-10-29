<?php
	
	//HTML egitura zuzena mantentzeko.
echo '<html>', "\n";
echo '<head>', "\n";
echo '<style>
textarea {
    resize: none;
}
</style>
    	<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />
';
echo '</head>', "\n";
echo '<body>', "\n";

echo '<form method="post" action="galderaGorde.php" id="galderaGehitu" name="galderaGehitu" enctype="multipart/form-data">';

echo 'Galdera: <br/>
		<textarea rows="4" cols="50" name="galdera" id="galdera"></textarea><br/><br/>
		Erantzuna: <br/>
		<input type="text"	name="erantzuna" id="erantzuna" /><br/><br/>
		Zailtasun Maila:<br/>
		  <input type="radio" name="puntuak" value="1" align="right" checked> 1 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" value="2" > 2 &nbsp; &nbsp; - &nbsp; &nbsp;
   		  <input type="radio" name="puntuak" value="3" > 3 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" value="4" > 4 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" value="5" > 5
<br/><br/>
    <input type="hidden" name="logina" value="'.$_GET['logina'].'">
    <input type="hidden" name="ida" value="'.$_GET['ida'].'">

		<input type="submit" value="Gorde" />';



echo '</form>';



echo '</body>', "\n";
echo '</html>', "\n";
	
	
?>