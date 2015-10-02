
<?php




$dbzerbitzaria = "localhost";
$dberabiltzailea = "root";
$dbpass = "";
$dbizena = "Quiz";

$konexioa = new mysqli($dbzerbitzaria, $dberabiltzailea, $dbpass, $dbizena);

// konexioa konprobatu

if (!$konexioa) {
	die("Konexioa ezin izan da ezarri.: " . mysqli_connect_error());
}


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

mysqli_close($konexioa);

?>