<?php
//LOCALHOST
$dbzerbitzaria = "localhost";
$dberabiltzailea = "root";
$dbpass = "";
$dbizena = "Quiz";



//HOSTINGER
//$dbzerbitzaria = "mysql.hostinger.es";
//$dberabiltzailea = "u396496563_ehuws";
//$dbpass = "wsehuws";
//$dbizena = "u396496563_quiz";




// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------

$izena = $_POST['izena'];

// $argazkia = $_POST['argazkia'];

$posta = $_POST['posta'];
$pasahitza = $_POST['pasahitza'];
$telefonoa = $_POST['telefonoa'];
$espezialitatea = $_POST['espezialitatea'];
$interesa = $_POST['interesa'];
$besterik = $_POST['besterik'];
$guztiak = "";

foreach($interesa as $result) {
	$guztiak.= $result . ';';
}

// konexioa sortu

$konexioa = new mysqli($dbzerbitzaria, $dberabiltzailea, $dbpass, $dbizena);

// konexioa konprobatu

if (!$konexioa) {
	die("Konexioa ezin izan da ezarri.: " . mysqli_connect_error());
}

$sql = "INSERT INTO erabiltzaileak(izenabizen, posta, pasahitza, telefonoa, espezialitatea, interesak, besterik)
VALUES ('$izena', '$posta', '$pasahitza','$telefonoa','$espezialitatea', '$guztiak','$besterik')";

if (mysqli_query($konexioa, $sql)) {
	echo "Erabiltzailea ondo erregistratua";
	echo("<br/>");
	echo("<a href=IkusiErabiltzaileak.php>Erabiltzaileak ikusi</a>");
}
else {
	echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
}

mysqli_close($konexioa);
?>
