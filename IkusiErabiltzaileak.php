
<?php

require 'konexioa.php';


$sql="SELECT * FROM  erabiltzaileak";
$result = mysqli_query($konexioa, $sql);
echo('<center>');
echo('<table>');
echo('<tr> <th>IZENA</th><th>POSTA</th><th>TELEFONOA</th><th>ESPEZIALITATEA</th><th>INTERESAK</th><th>BESTERIK</th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		echo('<tr>');
		echo '<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td>'.$row['telefonoa'] .'</td>'.'<td>'.$row['espezialitatea'] .'</td>'.'<td>'.$row['interesak'] .'</td>'.'<td>'.$row['besterik'] .'</td>';	
		echo('</tr>');
	}
} 

echo('</table>');
echo('</center>');

require 'konexioaItxi.php';

?>