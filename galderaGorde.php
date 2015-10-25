<?php
	require 'konexioa.php';
$galdera = $_POST['galdera'];
$erantzuna = $_POST['erantzuna'];
$puntuak = $_POST['puntuak'];
$logina = $_POST['logina'];
$ida=$_POST['ida'];
$ordua = date('d/m/Y H:i:s a', time());
$ip = $_SERVER['REMOTE_ADDR'];
	$sql = "INSERT INTO galderak(galdera, erantzuna, zailtasuna, posta)
VALUES ('$galdera', '$erantzuna', '$puntuak','$logina')";
	if (mysqli_query($konexioa, $sql))
		{
			$sql = "INSERT INTO ekintzak(konexio_id, erabiltzaile_posta, ekintza_mota, ordua,ip) VALUES ('$ida','$logina', 'galdera txertatu','$ordua', '$ip')";
if (!mysqli_query($konexioa, $sql))
		{
			echo "$sql";
					echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);

			}
			
			
		echo "Galdera ondo erregistratua";
		echo ("<br/>");
		echo ("<a href=insertQuestion.php?logina=$logina&ida=$ida>Galdera gehiago gehitu</a>");
		}
	  else
		{
		echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
		}

	require 'konexioaItxi.php';

	
	
	
	
	?>