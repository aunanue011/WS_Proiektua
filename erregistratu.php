<?php
//LOCALHOST
//$dbzerbitzaria = "localhost";
//$dberabiltzailea = "root";
//$dbpass = "";
//$dbizena = "Quiz";



//HOSTINGER
//$dbzerbitzaria = "mysql.hostinger.es";
//$dberabiltzailea = "u396496563_ehuws";
//$dbpass = "wsehuws";
//$dbizena = "u396496563_quiz";



require 'konexioa.php';
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
if($_POST['espezialitatea']=="Besterik"){
	$espezialitatea = $_POST['besteespezialitatea'];
}else{
	$espezialitatea = $_POST['espezialitatea'];
	
}
$interesa = $_POST['interesa'];
$besterik = $_POST['besterik'];


$guztiak = "";

foreach($interesa as $result) {
	$guztiak.= $result . ';';
}


$fitxategiEdukia =null;
if($_FILES['argazkia']['size'] > 0)
{
$fitxategi = $_FILES['argazkia']['name'];
$fitxategiarenIzena  = $_FILES['argazkia']['tmp_name'];


$fitxategiaIriki      = fopen($fitxategiarenIzena, 'r');
$fitxategiEdukia = fread($fitxategiaIriki, filesize($fitxategiarenIzena));
$fitxategiEdukia = addslashes($fitxategiEdukia);
fclose($fitxategiaIriki);

if(!get_magic_quotes_gpc())
{
    $fitxategi = addslashes($fitxategi);
}




}




$sql = "INSERT INTO erabiltzaileak(izenabizen, posta, pasahitza, telefonoa, espezialitatea, interesak, besterik, argazkia)
VALUES ('$izena', '$posta', '$pasahitza','$telefonoa','$espezialitatea', '$guztiak','$besterik','$fitxategiEdukia')";

if (mysqli_query($konexioa, $sql)) {
	echo "Erabiltzailea ondo erregistratua";
	echo("<br/>");
	echo("<a href=IkusiErabiltzaileak.php>Erabiltzaileak ikusi</a>");
}
else {
	echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
}



require 'konexioaItxi.php';
?>
