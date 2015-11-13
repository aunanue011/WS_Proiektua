	<?php
	include 'konexioa.php';
	$postaHelbidea = $_GET['eposta'];

	$sql="SELECT count(*) as kop FROM  galderak where posta = '".$postaHelbidea."';";
$result = mysqli_query($konexioa, $sql);
	$sql2="SELECT count(*) as guztiak FROM  galderak";
$result2 = mysqli_query($konexioa, $sql2);


//echo('<center>');
//echo('<div id="banner"><p> NIRE GALDERAK </p> </div>');
//echo('<table id="taula1">');
//echo('<tr><th id="erregistroa">GALDERAREN ENUNTZIATUA</th><th id="erregistroa">ERANTZUNA</th><th id="erregistroa1">ZAILTASUNA</th><th></th></tr>');

if($result) {
		
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
		echo('Nire galderak: '.$row['kop'].' / Datubase Galdera Kopurua: '.$row2['guztiak']);
		//echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
		//echo '<td>'.$row['galdera'] .'</td>'.'<td>'.$row['erantzuna'] .'</td>'.'<td id="tde">'.$row['zailtasuna'] .'</td>';	
		//echo('</tr>');
	}


//echo('</table></center>');
	
		include 'konexioaItxi.php';

	
	?>