<?php
//require "../sesioak/userSession.php";
//if (konprobatuSaioa("../login.php", true)) {

//} else {
//    exit;
//}
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['posta']) && $_SESSION['posta'] == true) {
    $sql = "SELECT * FROM argazkia where (baimena = 2  or baimena=1) and tag = \"$_GET[tag]\"";
}
require "../datuBasea/konexioa.php";
$result = mysqli_query($konexioa, $sql);
$número_filas = mysqli_num_rows($result);
if ($result && $número_filas>  0) {
    $max =0;
    while ($row = mysqli_fetch_assoc($result)) {
            $max = $row['argID'];

        echo ("<li id='argpanel'><a title='$row[deskribapena]' class=\"grouped_elements\" id=\"single_image\" rel=\"group1\" href=\"argazkiak\\$row[erabID]\\$row[izena]\"><img class=\"property_img\" src=\"argazkiak\\$row[erabID]\\$row[izena]\"  /></a></li>");
    }
    echo"<input id='azAjax' type=\"hidden\" value=\"$max\">";
}
require "../datuBasea/konexioaItxi.php";
