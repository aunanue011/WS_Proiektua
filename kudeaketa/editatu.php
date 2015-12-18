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
if (isset($_POST['action'])&& $_POST['action'] == 'Editatu') {
    ?>
    <!DOCTYPE html>
    <html lang="eu">
    <head>
        <title>Argazki Bilduma</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../css/formularioak.css">

        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>

        <style>
            body {
                background: url("../img/editatuAtzekaldea.jpg" ) no-repeat fixed center center;


            }
            textarea {
                width: 315px;
                height: 120px;
                resize: none;
            }
            #argazki {
                height: 0;
                width: 0;
            }

            #argazki-label {
                border: 1px solid #cccccc;
                padding: 5px;
            }
        </style>
    </head>
<body>
<header style="background: #8a0829">
    <div class="wrapper">
        <nav style="float: left;">
            <a href="../index.php" class="login_btn"> Hasiera</a>
        </nav>
    </div>
    <div class="wrapper">
        <a href="#" class="hamburger"></a>
        <nav>

            <?php
            if (isset($_SESSION['posta']) && $_SESSION['posta'] == true) {
                echo("
                           <ul>
                            <li><a href=\"../argazkiaIgo.php\">Argazkia Igo</a></li>
                            <li><a href=\"../erabPanela.php\">Nire Panela</a></li>");
                if($_SESSION['mota']=='admin')
                    echo("<li><a href=\"../adminPanela.php\">Admin Panela</a></li>");
                    echo("</ul>");
                echo("<a href=\"../datuBasea/logout.php\" class=\"login_btn\" >" . $_SESSION['izena'] . " (" . $_SESSION['posta'] . ")</a>");
            }
            ?>

        </nav>
    </div>
</header>

<div class="logo"></div>
<div class="login-block">
    <h1>Argazkia Editatu</h1>
    <?php
   // require "../datuBasea/konexioa.php";
    $er="";
    $buelta="";
    if($_SESSION['mota']=="admin"){
        $er=$_POST['erab'];
        $buelta="adminPanela.php";
    }else{
        $er=$_SESSION['posta'];
        $buelta="erabPanela.php";

    }
    $sql = "select * from argazkia where erabID = \"$er\" and izena = \"$_POST[irudia]\"";
    $result = mysqli_query($konexioa, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $baimena = $row['baimena'];
        $tag = $row['tag'];
        $deskribapena = $row['deskribapena'];

    }

    echo("<form action=\"update.php?nora=$buelta\" method=\"post\" enctype=\"multipart/form-data\">");

        echo "<img name='img' id='img' src=\"../argazkiak/$er/$_POST[irudia]\" />

        <input type='hidden' id='irudia' name='irudia' value='$_POST[irudia]' />
        ";

        ?>
    <br /><br />
        <label for="bainena">Baimena</label>
        <select name="baimena" id="baimena">
            <option value="0" selected="selected">Pribatua</option>
            <option value="1">Mugatua</option>
            <option value="2">Publikoa</option>
        </select><br /><br />
        <label for="deskribapena">Deskribapena</label>
        <textarea name="deskribapena" id="deskribapena"></textarea><br/><br/>
        <label for="tag">Tag-a</label>
                <input type="text" name="tag" id="tag"/><br/><br/>
        <input type="submit" id="bidali" name="bidali" value="Aldaketak gorde" />
    <?php
        echo("<input type=\"hidden\" name=\"idposta\" id=\"idposta\" value=\"$er\"/>");
    ?>
    </form>

    <?php

    echo "<script language=\"javascript\">
        $(\"#baimena\").val($baimena);
        $(\"#deskribapena\").val(\"$deskribapena\");
        $(\"#tag\").val(\"$tag\");


</script>";
 //   require "../datuBasea/konexioaItxi.php";

    ?>
</div>
</body>
    </html>

<?php

} else {

    $er="";
    $buelta="";
    if(isset($_POST['erab'])){
        $er=$_POST['erab'];
        $buelta="adminPanela.php#tab2";
    }else{
        $er=$_SESSION['posta'];
        $buelta="erabPanela.php#tab2";

    }
unlink("../argazkiak/$er/$_POST[irudia]");
   $sql = "Delete from argazkia where erabID = \"$er\" and izena = \"$_POST[irudia]\"";

    echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../js/abixuak/dist/sweetalert2.css\"/>
<script src=\"../js/jquery.js\"></script>
<script src=\"../js/abixuak/dist/sweetalert2.min.js\"></script>
<body bgcolor=\"#8A0829\">
<script language=\"JavaScript\">");

    if ($konexioa->query($sql) === TRUE) {

        echo("
        swal({
                    title: \"ARGAZKIA EZABATUTA\",
                    text: \"Argazkia zuzen ezabatu da\",
                    type: \"success\"
                },
                function(){
                    window.location.href = '../$buelta';
                });
                    window.onclick = function(){
                        window.location.href = '../$buelta';
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
                    window.location.href = '../$buelta';
                });
                    window.onclick = function(){
                        window.location.href = '../$buelta';
                        }
      ");
    }
    echo("</script>
</body>");

}
require "../datuBasea/konexioaItxi.php";

?>