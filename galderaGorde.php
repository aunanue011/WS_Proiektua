<?php
	require 'konexioa.php';
$galdera = $_POST['galdera'];
$erantzuna = $_POST['erantzuna'];
$puntuak = $_POST['puntuak'];
$logina = $_POST['logina'];

	$sql = "INSERT INTO galderak(galdera, erantzuna, zailtasuna, posta)
VALUES ('$galdera', '$erantzuna', '$puntuak','$logina')";
	if (mysqli_query($konexioa, $sql))
		{
		echo "Galdera ondo erregistratua";
		echo ("<br/>");
		echo ("<a href=insertQuestion.php?logina=$logina>Galdera gehiago gehitu</a>");
		}
	  else
		{
		echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
		}

	require 'konexioaItxi.php';

	
	
	
	
	?>