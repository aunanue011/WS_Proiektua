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
    $sql = "SELECT * FROM (
                  SELECT * FROM argazkia where erabID=\"$_SESSION[posta]\" and argID <= \"$_GET[azkena]\" ORDER BY argID DESC LIMIT 9
                  ) sub
                  ORDER BY argID DESC;";
}else{
    $sql = "SELECT * FROM (
                  SELECT * FROM argazkia where baimena = 2 and argID <= \"$_GET[azkena]\" ORDER BY argID DESC LIMIT 9
                  ) sub
                  ORDER BY argID DESC;";
}
require "../datuBasea/konexioa.php";
$result = mysqli_query($konexioa, $sql);
$número_filas = mysqli_num_rows($result);
if ($result && $número_filas>  0) {

    $max =0;
    while ($row = mysqli_fetch_assoc($result)) {
        $form = "formularioa" . $max;
        $max=$row['argID'];
        echo("<form id=\"$form\" method=\"post\" action=\"kudeaketa/editatu.php\" name=\"update\"  onSubmit=\"return mezua(this.submited,this.id);\"  enctype=\"multipart/form-data\">");
        echo("<li><a title='$row[deskribapena]' class=\"grouped_elements\" id=\"single_image\" rel=\"group1\" href=\"argazkiak\\$row[erabID]\\$row[izena]\"><img class=\"property_img\" src=\"argazkiak\\$row[erabID]\\$row[izena]\"  /></a>");
        echo("<input type=\"hidden\" name=\"irudia\" id=\"irudia\" value=\"$row[izena]\" />");
        echo("<input type=\"hidden\" name=\"erab\" id=\"erab\" value=\"$row[erabID]\" />");
        echo("<input type=\"submit\" onclick=\"this.form.submited=this.value;\" value=\"Editatu\" id=\"editatu\" name='action'/><input type='submit' onclick=\"this.form.submited=this.value;\" value='Ezabatu' name='action' id='ezabatu' /></li>");
        echo "</form>";
    }
    echo"<input id='azAjax' type=\"hidden\" value=\"$max\">";
}
require "../datuBasea/konexioaItxi.php";
