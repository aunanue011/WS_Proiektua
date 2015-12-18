<?php
require "sesioak/userSession.php";
if (konprobatuSaioa("index.php", false)) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/formularioak.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Argazki Albuma</title>
    <style>
        body {
            background: url("img/loginAtzekaldea.jpg") no-repeat fixed center center;
        }
    </style>
</head>

<body>
<header style="background: #8A0829">
    <div class="wrapper">
        <nav style="float: left;">
            <a href="index.php" class="login_btn"> Hasiera</a>
        </nav>
    </div>
    <div class="wrapper">
        <a href="#" class="hamburger"></a>
        <nav>

            <?php
            if (isset($_SESSION['posta']) && $_SESSION['posta'] == true) {
                echo("
                           <ul>
                            <li><a href=\"argazkiaIgo.php\">Argazkia Igo</a></li>
                           </ul>
                         ");
                $erab = $_SESSION['izena'] . '(' . $_SESSION['posta'] . ')';
                $luz = (strlen($erab) - 15);
                $zuria = "";
                for ($i = 0; $i < $luz; $i++) {
                    $zuria = $zuria . "&nbsp";
                }
                $desk = $zuria . 'DESKONEKTATU' . $zuria;
                echo("<a style='{display: inline-block}' onmouseover=\"this.innerHTML ='$desk'\" onmouseout=\"this.innerHTML = '$erab'\"  href=\"datuBasea/logout.php\" class=\"login_btn\"  >" . $erab . "</a>");
            } else {
                echo("<a href='erregistratu.php' class=\"login_btn\"> Erregistratu</a>");

            }
            ?>

        </nav>
    </div>
</header>

<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <form action="datuBasea/loginEgin.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Posta Helbidea" id="username" name="username"/>
        <input type="password" placeholder="Pasahitza" id="password" name="password"/>
        <input type="submit" value="Logeatu"/>
    </form>
</div>
</body>

</html>