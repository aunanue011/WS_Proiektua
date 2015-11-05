<?php
	
	include 'konexioa.php';
	$postaHelbidea = intval($_GET['eposta']);

	$sql="SELECT * FROM  galderak where posta = ".$postaHelbidea;
$result = mysqli_query($konexioa, $sql);
echo('<center>');
//echo('<div id="banner"><p> NIRE GALDERAK </p> </div>');
echo('<table id="taula1">');
echo('<tr><th id="erregistroa">GALDERAREN ENUNTZIATUA</th><th id="erregistroa">ERANTZUNA</th><th id="erregistroa1">ZAILTASUNA</th><th></th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		

		
		echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
		echo '<td>'.$row['galdera'] .'</td>'.'<td>'.$row['erantzuna'] .'</td>'.'<td id="tde">'.$row['zailtasuna'] .'</td>';	
		echo('</tr>');
	}
} 

echo('</table></center>');
	
		include 'konexioaItxi.php';

	
	?>