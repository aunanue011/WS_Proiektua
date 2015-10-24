
<?php

require 'konexioa.php';
echo '<head>', "\n";
echo '<style>
td {
    text-align:center; 
    vertical-align:middle;
    }
</style>

    	<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />

';
echo '</head>', "\n";

$sql="SELECT * FROM  galderak";
$result = mysqli_query($konexioa, $sql);
echo('<center>');
echo('<div id="banner"><p> GALDERAK </p> </div>');
echo('<table id="taula1">');
echo('<tr><th id="erregistroa">GALDERAREN ENUNTZIATUA</th><th id="erregistroa">ZURE ERANTZUNA</th><th id="erregistroa1">ZAILTASUNA</th><th></th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		

		
		echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
		echo '<td>'.$row['galdera'] .'</td>'.'<td><input type="text" name="erantzun'.$row['kodea'].'"</td>'.'<td id="tde">'.$row['zailtasuna'] .'</td><td id="zuzendu"><input type="button" value="ZUZENDU" id="bidali" /></td>';	
		echo('</tr>');
	}
} 

echo('</table>');
echo('<br/><br/>');
echo('<div class="go"><a href="layout.html">Atzera</a></div>');
echo('<br/><br/>');
echo('</center>');

require 'konexioaItxi.php';

?>