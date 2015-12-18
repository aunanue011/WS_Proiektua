<?php
require "../sesioak/adminSession.php";
    if (!konprobatuSaioa("../index.php", true)) {
    // header("Location: ../index.php");
        exit;
    }
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Argazki Bilduma</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../kudeaketa/argazkiak/jquery.fancybox.css">

        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../kudeaketa/argazkiak/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="../kudeaketa/argazkiak/helpers/"></script>
        <title>Argazki Albuma</title>
        <script language="JavaScript">
                $(document).ready(function() {
                $("a#single_image").fancybox();
            });
        </script>
    </head>

<body>
<header style="background: #8A0829">
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
                           </ul>
                         ");
                echo("<a href=\"../datuBasea/logout.php\" class=\"login_btn\" >" . $_SESSION['izena'] . " (" . $_SESSION['posta'] . ")</a>");
            } else {
                echo("<a href='../erregistratu.php' class=\"login_btn\"> Erregistratu</a>");

            }
            ?>

        </nav>
    </div>
</header>
<?php

?>