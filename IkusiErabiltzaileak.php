
<?php
echo '<head>', "\n";
echo '
    	<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />
';
echo '</head>', "\n";
require 'konexioa.php';


$sql="SELECT * FROM  erabiltzaileak";
$result = mysqli_query($konexioa, $sql);
echo('<center>');
echo('<div id="banner"><p> ERABILTZAILEAK </p> </div>');
echo('<table id="taula1">');
echo('<tr><th id="erregistroa">ARGAZKIA</th><th id="erregistroa">IZENA</th><th id="erregistroa">POSTA</th><th id="erregistroa">TELEFONOA</th><th id="erregistroa">ESPEZIALITATEA</th><th id="erregistroa">INTERESAK</th><th id="erregistroa1">BESTERIK</th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		
		if($row['argazkia']==""){
			//$bereArgazkia='irudiak/argazkigabea.png';
			$bereArgazkia='<img width="80px" height="80px" src="irudiak/argazkigabea.png"/>';
		}else{
		
			//$bereArgazkia=base64_encode($row['argazkia']);
			$bereArgazkia='<img width="80px" height="80px"src="data:image;base64,'.base64_encode( $row['argazkia'] ).'"/>';
		}
		
		echo('<tr>');
		echo '<td align="center">'.$bereArgazkia .'</td>'.'<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td align="center">'.$row['telefonoa'] .'</td>'.'<td>'.$row['espezialitatea'] .'</td>'.'<td>'.$row['interesak'] .'</td>'.'<td id="tde">'.$row['besterik'] .'</td>';	
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