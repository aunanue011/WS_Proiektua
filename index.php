<!DOCTYPE html>
<html lang="eu">
<head>
    <title>Argazki Bilduma</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="kudeaketa/argazkiak/jquery.fancybox.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/helpers/"></script>
</head>
<body>
<script language="JavaScript">
    function ajax() {
        var azk = document.getElementById('azAjax').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200 && xhttp.responseText.length >0) {
                document.getElementById("argpanel").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open('GET', 'kudeaketa/ajax.php?azkena='+azk, true);
        xhttp.send();
    }
    function ajaxTag() {
        var azk = document.getElementById('search').value;
		if(azk.length>0){
			 var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200 && xhttp.responseText.length >0) {
                document.getElementById("argpanel").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open('GET', 'kudeaketa/ajaxTag.php?tag='+azk, true);
        xhttp.send();
		}
       
    }
    $(document).ready(function() {
        $("a#single_image").fancybox();

    });
</script>
<section class="hero">
    <header>
        <div class="wrapper">
            <a href="#" class="hamburger"></a>
            <nav>

                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['posta']) && $_SESSION['posta'] == true) {
                    echo("
                           <ul>
                            <li><a href=\"argazkiaIgo.php\">Argazkia Igo</a></li>
                            <li><a href=\"erabPanela.php\">Nire Panela</a></li>");
                    if($_SESSION['mota']=='admin')
                    echo("<li><a href=\"adminPanela.php\">Admin Panela</a></li>");
                    echo("
                           </ul>
                         ");
                    $erab = $_SESSION['izena'].'('. $_SESSION['posta'].')';
                    $luz = (strlen($erab) - 15);
                    $zuria="";
                    for($i =0;$i<$luz;$i++ ){
                    $zuria=$zuria."&nbsp";
                    }
                    $desk = $zuria.'DESKONEKTATU'.$zuria;
                    echo("<a style='{display: inline-block}' onmouseover=\"this.innerHTML ='$desk'\" onmouseout=\"this.innerHTML = '$erab'\"  href=\"datuBasea/logout.php\" class=\"login_btn\"  >".$erab."</a>");
                } else {
                    echo("<a href='erregistratu.php' class=\"login_btn\"> Erregistratu</a>");
                    echo("<a href='login.php' class=\"login_btn\"> Login</a>");

                }
                ?>

            </nav>
        </div>
    </header>

    <section class="caption">
        <h2 class="caption">Argazki Bilduma</h2>

        <h3 class="properties"></h3>
    </section>
</section>


<section class="search">
    <div class="wrapper">
            <input type="text" id="search" name="search" placeholder="Tag-en Bidez argazkiak bilatu"/>
            <input type="button" id="submit_search" name="submit_search" value="Bilatu" onclick="ajaxTag()"/>
    </div>

</section>


<section class="listings">
    <div class="wrapper">
        <!-- <ul class="properties_list">
             <li>
                 <a href="#">
                     <img src="img/property_1.jpg" alt="" title="" class="property_img"/>
                 </a>

                 <div class="property_details">
                     <h1>
                         <a href="#">El album de la gorrina</a>
                     </h1>

                     <h2>102 argazki</h2>
                 </div>
             </li>

         </ul>
         -->
        <?php
        require "datuBasea/konexioa.php";
      //  if (isset($_SESSION['posta']) && $_SESSION['posta'] == true) {
      //      $sql = "SELECT * FROM (
      //            SELECT * FROM argazkia where baimena = 2 or baimena=1 ORDER BY argID DESC LIMIT 9
      //            ) sub
      //            ORDER BY argID DESC;";
      //  }else{
      //      $sql = "SELECT * FROM (
      //            SELECT * FROM argazkia where baimena = 2 ORDER BY argID DESC LIMIT 9
      //            ) sub
      //            ORDER BY argID DESC;";
      //  }

        $sql = "select max(argID) as k from argazkia;";
        $result = mysqli_query($konexioa, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo "<ul  class=\"properties_list\" id='argpanel'>
                       <input type='hidden' id='azAjax' value=\"$row[k]\"/>";

      //      while ($row = mysqli_fetch_assoc($result)) {
      //          $max =$row['argID'];
      //          echo ("<li><a title='$row[deskribapena]' class=\"grouped_elements\" id=\"single_image\" rel=\"group1\" href=\"argazkiak\\$row[erabID]\\$row[izena]\"><img class=\"property_img\" src=\"argazkiak\\$row[erabID]\\$row[izena]\"  /></a></li>");
      //      }


            echo "</ul>";
        }
        require "datuBasea/konexioaItxi.php";
        ?>
        <div class="more_listing">
<?php echo("<button onclick=\"ajax()\" class=\"more_listing_btn\">Argazki Gehiago</button>");?>
        </div>
    </div>
</section>
<script language="JavaScript">
    ajax();
</script>
<footer>
    <div class="wrapper footer">
    </div>
</footer>

</body>
</html>