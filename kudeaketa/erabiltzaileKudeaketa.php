<?php

require "../sesioak/userSession.php";
if (konprobatuSaioa("../login.php", true)) {

} else {
    exit;
}
if (!isset($_SESSION)) {
    session_start();
}
function ezabatu($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            ezabatu(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}
require "../datuBasea/konexioa.php";
if($_POST['agindua'] == 'Ezabatu'){
$sql="Delete from erabiltzaileak where posta = \"$_POST[posta]\"";
    ezabatu("../argazkiak/$_POST[posta]");


}
if($_POST['agindua'] == 'Aktibatuta' || $_POST['agindua'] == 'Desaktibatuta'){
$ag=true;
    if($_POST['agindua'] == 'Aktibatuta'){
    $ag=false;
}

    $sql="update erabiltzaileak set baimena = \"$ag\" where posta = \"$_POST[posta]\"";

}

if($_POST['agindua'] == 'User' || $_POST['agindua'] == 'admin'){
$ag = "User";
    if($_POST['agindua'] == 'User'){
        $ag = "admin";
    }
    $sql="update erabiltzaileak set mota = \"$ag\" where posta = \"$_POST[posta]\"";


}


$result = mysqli_query($konexioa, $sql);

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../js/abixuak/dist/sweetalert2.css\"/>
<script src=\"../js/jquery.js\"></script>
<script src=\"../js/abixuak/dist/sweetalert2.min.js\"></script>
<body bgcolor=\"#8A0829\">
<script language=\"JavaScript\">");
if ($result) {
    echo("
        swal({
                    title: \"ALDAKETAK EGUNERATUTA\",
                    text: \"Aldaketa zuzen erregistratu da\",
                    type: \"success\"
                },
                function(){
                    window.location.href = '../adminPanela.php';
                });
                    window.onclick = function(){
                        window.location.href = '../adminPanela.php';
                        }
      ");
}else{
    echo("
        swal({
                    title: \"ERROREA\",
                    text: \"Errore bat gertatu da zure eskaera prozesatzean.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '../adminPanela.php';
                });
                    window.onclick = function(){
                        window.location.href = '../adminPanela.php';
                        }
      ");
}

echo("</script>
</body>");


require "../datuBasea/konexioaItxi.php";

?>