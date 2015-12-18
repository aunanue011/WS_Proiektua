<link rel="stylesheet" type="text/css" href="../js/abixuak/dist/sweetalert2.css" />
<script src="../js/jquery.js"></script>
<script src="../js/abixuak/dist/sweetalert2.min.js"></script>
<body bgcolor="#2f4f4f">
<script language="JavaScript">
<?php
require 'konexioa.php';
$pasahitzEnkriptatua = sha1($_POST['password']);

$sql = "INSERT INTO erabiltzaileak(izenabizen, posta, pasahitza, mota)
        VALUES ('$_POST[izenabizen]', '$_POST[posta]', '$pasahitzEnkriptatua','User');";
if (mysqli_query($konexioa, $sql))
{
    echo "  swal({
            title: \"Zorionak\",
            text: \"Erabiltzailea zuzen erregistratu da\",
            type: \"success\",
            confirmButtonColor: '#8A0829'
        },
        function(){
            window.location.href = '../index.php';
        });";

}
else if($konexioa->errno === 1062){
echo "  swal({
            title: \"Mmmmmm........\",
            text: \"Dagoeneko, posta hori gure sisteman erregistratuta dago.\",
            type: \"error\",
            confirmButtonColor: '#8A0829'

        },
        function(){
            window.location.href = '../erregistratu.php';
        });";
}else
{

    echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
}

require 'konexioaItxi.php';


?>
</script>
</body>