
<?php

// LOCALHOST
// $dbzerbitzaria = "localhost";
// $dberabiltzailea = "root";
// $dbpass = "";
// $dbizena = "Quiz";
// HOSTINGER
// $dbzerbitzaria = "mysql.hostinger.es";
// $dberabiltzailea = "u396496563_ehuws";
// $dbpass = "wsehuws";
// $dbizena = "u396496563_quiz";

require 'konexioa.php';

// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------

$email = $_POST['posta'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
	{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Posta okerra :(')
    window.location.href='signUp.html';
    </SCRIPT>");
	}
  else
	{
	$izena = $_POST['izena'];

	// $argazkia = $_POST['argazkia'];

	$posta = $_POST['posta'];
	$pasahitza = $_POST['pasahitza'];
	$telefonoa = $_POST['telefonoa'];
	if ($_POST['espezialitatea'] == "Besterik")
		{
		$espezialitatea = $_POST['besteespezialitatea'];
		}
	  else
		{
		$espezialitatea = $_POST['espezialitatea'];
		}

	$guztiak = "";
	if (isset($_POST['interesa']))
		{
		$interesa = $_POST['interesa'];
		foreach($interesa as $result)
			{
			$guztiak.= $result . ';';
			}
		}

	$besterik = $_POST['besterik'];
	$fitxategiEdukia = null;
	if ($_FILES['argazkia']['size'] > 0)
		{
		$fitxategi = $_FILES['argazkia']['name'];
		$fitxategiarenIzena = $_FILES['argazkia']['tmp_name'];
		$fitxategiaIriki = fopen($fitxategiarenIzena, 'r');
		$fitxategiEdukia = fread($fitxategiaIriki, filesize($fitxategiarenIzena));
		$fitxategiEdukia = addslashes($fitxategiEdukia);
		fclose($fitxategiaIriki);
		if (!get_magic_quotes_gpc())
			{
			$fitxategi = addslashes($fitxategi);
			}
		}

	$sql = "INSERT INTO erabiltzaileak(izenabizen, posta, pasahitza, telefonoa, espezialitatea, interesak, besterik, argazkia)
VALUES ('$izena', '$posta', '$pasahitza','$telefonoa','$espezialitatea', '$guztiak','$besterik','$fitxategiEdukia')";
	if (mysqli_query($konexioa, $sql))
		{
		echo "Erabiltzailea ondo erregistratua";
		echo ("<br/>");
		echo ("<a href=IkusiErabiltzaileak.php>Erabiltzaileak ikusi</a>");
		}
	  else
		{
		echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
		}

	require 'konexioaItxi.php';

	}

?>
