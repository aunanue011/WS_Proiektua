<?php
require "../sesioak/userSession.php";
if (konprobatuSaioa("../login.php", true)) {

} else {
    exit;
}
if (!isset($_SESSION)) {
    session_start();
}
require "../datuBasea/konexioa.php";
echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../js/abixuak/dist/sweetalert2.css\"/>
<script src=\"../js/jquery.js\"></script>
<script src=\"../js/abixuak/dist/sweetalert2.min.js\"></script>
<body bgcolor=\"#8A0829\">
<script language=\"JavaScript\">");

$sql = "Update argazkia set deskribapena =\"$_POST[deskribapena]\", baimena =\"$_POST[baimena]\", tag =\"$_POST[tag]\" where erabID = \"$_POST[idposta]\" and izena = \"$_POST[irudia]\";";
if ($konexioa->query($sql) === TRUE) {
    echo("
        swal({
                    title: \"ALDAKETAK EGUNERATUTA\",
                    text: \"Argazkia zuzen eguneratu da\",
                    type: \"success\"
                },
                function(){
                    window.location.href = '../$_GET[nora]';
                });
                    window.onclick = function(){
                        window.location.href = '../$_GET[nora]';
                        }
      ");
} else {
    echo("
        swal({
                    title: \"ERROREA\",
                    text: \"Erroreren bat gertatu da.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '../$_GET[nora]';
                });
                    window.onclick = function(){
                        window.location.href = '../$_GET[nora]';
                        }
      ");
}
echo("</script>
</body>");
require "../datuBasea/konexioaItxi.php";

?>