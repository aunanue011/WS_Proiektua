<?php
require "sesioak/userSession.php";
if (konprobatuSaioa("index.php", false)) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Erregistratu</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/formularioak.css">

    <link rel="stylesheet" type="text/css" href="kudeaketa/argazkiak/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="js/abixuak/dist/sweetalert2.css"/>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/helpers/"></script>
    <script src="js/abixuak/dist/sweetalert2.min.js"></script>
    <style>
        body {
            background: url("img/erregistratuAtzekaldea.jpg" ) no-repeat fixed center center;
        }
    </style>
	<script>
	function pasahitzaKonprobatu(){
					var pass1= document.getElementById("password");
					var pass2= document.getElementById("password2");
					//var mezua = document.getElementById('konfirmatu');
	if(pass1.value == pass2.value && pass1.value.length>="6"){
        pass2.style.backgroundColor = "#66cc66";
       
        return true;
    }else{
       
        pass2.style.backgroundColor = "#ff6666";
       swal({
                        title: 'PASAHITZ EZBERDINAK EDO MOTZEGIAK',
                        text: 'Pasahitzek ez dute bat egiten, edo ez dituzte 6 karaktere edo gehiago.',
                        type: 'error'
                    },
                    function () {
                        return false;

                    });
        pass2.focus();
        return false;
    }
	}
	</script>
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
                $erab = $_SESSION['izena'].'('. $_SESSION['posta'].')';                     $luz = (strlen($erab) - 15);                     $zuria="";                     for($i =0;$i<$luz;$i++ ){                     $zuria=$zuria."&nbsp";                     }                     $desk = $zuria.'DESKONEKTATU'.$zuria;                     echo("<a style='{display: inline-block}' onmouseover=\"this.innerHTML ='$desk'\" onmouseout=\"this.innerHTML = '$erab'\"  href=\"datuBasea/logout.php\" class=\"login_btn\"  >".$erab."</a>");
            } else {
                echo("<a href='login.php' class=\"login_btn\"> Login</a>");

            }
            ?>

        </nav>
    </div>
	
</header>

<div class="logo"></div>
<div class="login-block">
    <h1>Erregistratu</h1>
    <form action="datuBasea/erabiltzaileaErregistratu.php" method="post" onSubmit="return pasahitzaKonprobatu();" enctype="multipart/form-data">
    <input type="text" value="" placeholder="Izen Abizenak" id="izenabizen" name="izenabizen"/>
    <input type="email" value="" placeholder="Posta Helbidea" id="posta" name="posta"/>
    <input type="password" value="" placeholder="Pasahitza" id="password" name="password" />
    <input type="password" value="" placeholder="Konfirmatu Pasahitza" id="password2" />
    <input type="submit" value="Erregistratu"/>
    </form>
</div>
</body>
</html>