
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
echo('<table>');
echo('<tr><th>ARGAZKIA</th><th>IZENA</th><th>POSTA</th><th>TELEFONOA</th><th>ESPEZIALITATEA</th><th>INTERESAK</th><th>BESTERIK</th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		
		if($row['argazkia']==""){
			//$bereArgazkia='irudiak/argazkigabea.png';
			$bereArgazkia='<img width="120px" height="150px" src="irudiak/argazkigabea.png"/>';
		}else{
		
			//$bereArgazkia=base64_encode($row['argazkia']);
			$bereArgazkia='<img width="120px" height="150px"src="data:image;base64,'.base64_encode( $row['argazkia'] ).'"/>';
		}
		
		echo('<tr>');
		echo '<td>'.$bereArgazkia .'</td>'.'<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td>'.$row['telefonoa'] .'</td>'.'<td>'.$row['espezialitatea'] .'</td>'.'<td>'.$row['interesak'] .'</td>'.'<td>'.$row['besterik'] .'</td>';	
		echo('</tr>');
	}
} 

echo('</table>');
echo('</center>');

require 'konexioaItxi.php';

?>