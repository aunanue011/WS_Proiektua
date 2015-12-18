<?php
require "../datuBasea/konexioa.php";
if (!isset($_SESSION)) {
    session_start();
}
echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../js/abixuak/dist/sweetalert2.css\"/>
<script src=\"../js/jquery.js\"></script>
<script src=\"../js/abixuak/dist/sweetalert2.min.js\"></script>
<body bgcolor=\"#8A0829\">
<script language=\"JavaScript\">");


$target_dir = "../argazkiak/";
$uploadOk = 1;
$target_file = $target_dir . basename($_FILES["argazki"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$new_image_name = 'argazki_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $imageFileType;

if (isset($_POST["bidali"])) {
    $check = getimagesize($_FILES["argazki"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}

$target_dir = $target_dir . $_SESSION['posta'] . "/";
if (!file_exists("$target_dir")) {
    mkdir("$target_dir", 0755, true);
}
$target_file = $target_dir . $new_image_name;

if ($_FILES["argazki"]["size"] > 5000000) {

    echo("
        swal({
                    title: \"ERROREA\",
                    text: \"Fitxategia handiegia da. Mesedez, sahiatu irudi txikiago batekin.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '../argazkiaIgo.php';
                });
                    window.onclick = function(){
                        window.location.href = '../argazkiaIgo.php';
                        }
      ");
    $uploadOk = 0;
}
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
    echo("
        swal({
                    title: \"ERROREA\",
                    text: \"EJPG, JPEG, PNG & GIF formatuak bakarrik onartzen dira.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '../argazkiaIgo.php';
                });
                    window.onclick = function(){
                        window.location.href = '../argazkiaIgo.php';
                        }
      ");
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo("
      ");
} else {
    if (move_uploaded_file($_FILES["argazki"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO argazkia(izena, erabID, tag, deskribapena, baimena)
        VALUES ('$new_image_name', '$_SESSION[posta]', '$_POST[tag]','$_POST[deskribapena]',$_POST[baimena]);";
        if (mysqli_query($konexioa, $sql)) {


            echo("
        swal({
                    title: \"ARGAZKIA IGOTA\",
                    text: \"Argazkia zuzen igo da\",
                    type: \"success\"
                },
                function(){
                    window.location.href = '../erabPanela.php';
                });
                    window.onclick = function(){
                        window.location.href = '../erabPanela.php';
                        }
      ");
        }


    } else {
        echo("
        swal({
                    title: \"ERROREA\",
                    text: \"Erroreren bat gertatu da fitxategia igo bitartean.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '../argazkiaIgo.php';
                });
                    window.onclick = function(){
                        window.location.href = '../argazkiaIgo.php';
                        }
      ");
    }
}
echo("</script>
</body>");
?>