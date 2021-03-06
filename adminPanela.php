<?php
require "sesioak/adminSession.php";
if (!konprobatuSaioa("index.php", true)) {
    // header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Argazki Bilduma</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="kudeaketa/argazkiak/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="js/abixuak/dist/sweetalert2.css"/>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="kudeaketa/argazkiak/helpers/"></script>
    <script src="js/abixuak/dist/sweetalert2.min.js"></script>
    <script language="JavaScript">
        function ajax() {
            var azk = document.getElementById('azAjax').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200 && xhttp.responseText.length >0) {
                    document.getElementById("argpanel").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open('GET', 'kudeaketa/ajaxFormAdmin.php?azkena='+azk, true);
            xhttp.send();
        }
        var balioa = false;

        function mezua(m, a) {
            if (m == "Editatu") {
                return true;
            }
            else if (m == "Ezabatu") {
                swal({
                        title: 'Ziur zaude?',
                        text: 'Argazkia borratzen baduzu, ezin izango duzu berreskuratu.',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#8A0829',
                        cancelButtonColor: '#1C1C1C',
                        confirmButtonText: 'Ezabatu!',
                        cancelButtonText: 'Ezeztatu!',
                        closeOnConfirm: false
                    },
                    function () {
                        document.forms[a].submit();

                    });
            }
            return false;
        }


        $(document).ready(function () {
            $("a#single_image").fancybox();
        });
        jQuery(document).ready(function () {
            jQuery('.tabs .tab-links a').on('click', function (e) {
                var currentAttrValue = jQuery(this).attr('href');

                // Show/Hide Tabs
                jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
                // Change/remove current tab to active
                jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

                e.preventDefault();
            });
        });

    </script>
    <style>
        /*----- Tabs -----*/
        .tabs {
            width: 100%;
            display: inline-block;
            font-family: "lato-regular", Helvetica, Arial, sans-serif;
        }

        /*----- Tab Links -----*/
        /* Clearfix */
        .tab-links:after {
            display: block;
            clear: both;
            content: '';
        }

        .tab-links li {
            margin: 0px 5px;
            float: left;
            list-style: none;
        }

        .tab-links a {
            padding: 9px 15px;
            display: inline-block;
            border-radius: 3px 3px 0px 0px;
            background: rgba(54, 54, 54, 0.98);
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            transition: all linear 0.15s;
            text-decoration: none;

        }

        .tab-links a:hover {
            background: #ffffff;
            color:#000000;
            text-decoration: none;
        }

        li.active a, li.active a:hover {
            background: #e1e1e1;
            color: #393939;
            text-decoration: none;

        }

        /*----- Content of Tabs -----*/
        .tab-content {
            padding: 15px;
            border-radius: 3px;
            box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);
            background: #fff;
        }

        .tab {
            display: none;
        }

        .tab.active {
            display: block;
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
                            <li><a href=\"erabPanela.php\">Nire Panela</a></li>

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
<section class="listings">
    <div class="wrapper">

        <div class="tabs">
            <ul class="tab-links">
                <li class="active"><a href="#tab1">ERABILTZAILEAK</a></li>
                <li><a href="#tab2">ARGAZKIAK</a></li>
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab active">

                    <?php
                    require "datuBasea/konexioa.php";

                    $sql = "SELECT * FROM  erabiltzaileak";
                    $result = mysqli_query($konexioa, $sql);
                    echo('<table id="imagetable">');
                    echo('<tr><th id="erregistroa">IZENA</th><th id="erregistroa">POSTA</th><th id="erregistroa">AKTIBATUTA</th><th id="erregistroa">BAIMEN MAILA</th><th id="erregistroa1">EZABATU</th></tr>');
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['baimena'] == true) {
                                $akt = "Aktibatuta";
                            } else {
                                $akt = "Desaktibatuta";
                            }
                            echo('<form method="post" action="kudeaketa/erabiltzaileKudeaketa.php" id="update" name="update" enctype="multipart/form-data">');
                            echo("<input type=\"hidden\" name=\"posta\" value=\"$row[posta]\"/>");
                            echo('<tr name ="erabiltzailea" id="erabiltzailea">');
                            echo('<td>' . $row['izenabizen'] . '</td>' . '<td>' . $row['posta'] . '</td>' . '<td><input type="submit" name="agindua" id="ezabatu" value="' . $akt . '"/></td>' . '<td><input type="submit" id="ezabatu" name="agindua" value="' . $row['mota'] . '"/></td><td><input type="submit"  name="agindua" value="Ezabatu" id="ezabatu" />');
                            echo('</tr>');
                            echo('</form>');
                        }
                        echo "</table>";
                    }

                    ?>

                </div>
                <div id="tab2" class="tab">

                    <?php
                    require "datuBasea/konexioa.php";
                    //         $sql = "SELECT * FROM (
                    //       SELECT * FROM argazkia where erabID = \"$_SESSION[posta]\" ORDER BY argID DESC LIMIT 9
                    //       ) sub
                    //       ORDER BY argID DESC;";
                    //         $result = mysqli_query($konexioa, $sql);
                    //         if ($result) {
                    //             $kont = 0;
                    $sql = "select max(argID) as k from argazkia;";
                    $result = mysqli_query($konexioa, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<ul  class=\"properties_list\" id='argpanel'>
                       <input type='hidden' id='azAjax' value=\"$row[k]\"/>";

                        //             echo "<ul class=\"properties_list\">";
                        //             while ($row = mysqli_fetch_assoc($result)) {
                        //                 $form = "formularioa" . $kont;
                        //                 $kont++;
                        //                 echo("<form id=\"$form\" method=\"post\" action=\"kudeaketa/editatu.php\" name=\"update\"  onSubmit=\"return mezua(this.submited,this.id);\"  enctype=\"multipart/form-data\">");
                        //                 echo("<li><a title='$row[deskribapena]' class=\"grouped_elements\" id=\"single_image\" rel=\"group1\" href=\"argazkiak\\$row[erabID]\\$row[izena]\"><img class=\"property_img\" src=\"argazkiak\\$row[erabID]\\$row[izena]\"  /></a>");
                        //                 echo("<input type=\"hidden\" name=\"irudia\" id=\"irudia\" value=\"$row[izena]\" />");
                        //                 echo("<input type=\"submit\" onclick=\"this.form.submited=this.value;\" value=\"Editatu\" id=\"editatu\" name='action'/><input type='submit' onclick=\"this.form.submited=this.value;\" value='Ezabatu' name='action' id='ezabatu' /></li>");
                        //                 echo "</form>";
                        //             }
                        //             echo "</ul>";
                        //         }

                        echo "</ul>";
                    }
                    require "datuBasea/konexioaItxi.php";
                    ?>
                    <div class="more_listing">
                        <?php echo("<button onclick=\"ajax()\" class=\"more_listing_btn\">Argazki Gehiago</button>");?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="JavaScript">
        ajax();
    </script>
</section>
</body>
</html>