<link rel="stylesheet" type="text/css" href="../js/abixuak/dist/sweetalert2.css"/>
<script src="../js/jquery.js"></script>
<script src="../js/abixuak/dist/sweetalert2.min.js"></script>
<body bgcolor="#2f4f4f">
<script language="JavaScript">
    <?php
    require 'konexioa.php';
    if(!isset($_SESSION)) {      session_start(); }

    $email = $_POST['username'];
    $pasahitzEncriptatua = sha1($_POST['password']);

    $sql = "SELECT * FROM  erabiltzaileak where posta like '$email'";
    $result = mysqli_query($konexioa, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row != 0 && $pasahitzEncriptatua == $row['pasahitza']&& $email!="")
    {
        if($row['baimena']==true){
        $_SESSION['mota']=$row['mota'];
        $_SESSION['izena']=$row['izenabizen'];
        $_SESSION['posta']=$row['posta'];


    echo("
    swal({
                title: \"BAIMEN ZUZENAK\",
                text: \"Erabiltzaile eta pasahitza zuzenak. Saioa hasten....\",
                type: \"success\",
                timer: 3000
            },
            function(){
                window.location.href = '../index.php';
            });

    ");
    }else{
            echo("
    swal({
                title: \"BAIMEN OKERRAK\",
                text: \"Zure kontua blokeatuta dago. Mesedez, jar zaitez kontaktuan administrari batekin.\",
                type: \"error\",
                timer: 3000
            },
            function(){
                window.location.href = '../index.php';
            });

    ");
    }}else{

    echo("
    swal({
                title: \"ERABILTZAILE DATU OKERRAK\",
                text: \"Erabiltzaile eta pasahitza ez datoz bat. Saiatu berriro mesedez.\",
                type: \"error\",
                timer: 3000
            },
            function(){
                window.location.href = '../login.php';
            });

    ");
    }


    require 'konexioaItxi.php';
    ?>
</script>
</body>
