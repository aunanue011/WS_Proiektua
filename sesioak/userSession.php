<?php

function konprobatuSaioa($nora, $errorea)
{


    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['posta'])) {
        $user_check = 0;
    } else {
        $user_check = $_SESSION['posta'];
    }
    $sql = "SELECT * FROM  erabiltzaileak where posta like '$user_check'";
    require_once(__DIR__ . '/../datuBasea/konexioa.php');
    $result = mysqli_query($konexioa, $sql);
    $row = mysqli_fetch_assoc($result);
    $login_session = $row['izenabizen'];
    if (!isset($login_session) && !(isset($_SESSION['posta']) && $_SESSION['posta'] == true)) {
        if ($errorea) {
            echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"js/abixuak/dist/sweetalert2.css\"/>
<script src=\"js/jquery.js\"></script>
<script src=\"js/abixuak/dist/sweetalert2.min.js\"></script>
<body bgcolor=\"#8A0829\">
<script language=\"JavaScript\">");
            echo("
        swal({
                    title: \"GUNE PRIBATUA\",
                    text: \"Logeatuta egon behar duzu, atal honetan sartzeko.\",
                    type: \"error\"
                },
                function(){
                    window.location.href = '$nora';
                });
                    window.onclick = function(){
                        window.location.href = '$nora';
                        }
      ");
            echo("</script>
</body>");

            return false;
        }
    } else {

        return true;
    }

}

?>
