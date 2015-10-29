
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

//fitxategi tamaina MB-ekin konparatzeko, MB 1 zenbat den adierazi eta gero biderketa egingo dugu
define('MB', 1048576);


// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------

$email = $_POST['posta'];
$telefonoa = $_POST['telefonoa'];
$izena = $_POST['izena'];
$pasahitza = $_POST['pasahitza'];


		if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $email))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Posta formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}else{

		if (!preg_match('/^[0-9]{9}$/', $telefonoa))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Telefono formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}else{

		if (!preg_match('/^[A-z]+\s+[A-z]+\s+[A-z].*[A-z]$/', $izena))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Izen Abizen formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}		
else{
	if (strlen($pasahitza)<6)
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Pasahitz luzera okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}		
else{
	
if ($_FILES['argazkia']['size'] > 5*MB){
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Argazki tamaina okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}


  else
	{

	// $argazkia = $_POST['argazkia'];

	$posta = $_POST['posta'];
	
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
}
}	
}
}
?>
