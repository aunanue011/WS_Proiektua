<?php
$dbzerbitzaria = "mysql.hostinger.es";
$dberabiltzailea = "u396496563_ehuws";
$dbpass = "dbpass";
$dbizena = "u396496563_quiz";


$konexioa = new mysqli($dbzerbitzaria, $dberabiltzailea, $dbpass, $dbizena);

// konexioa konprobatu

if (!$konexioa) {
	die("Konexioa ezin izan da ezarri.: " . mysqli_connect_error());
}
?>