<?php
require 'konexioa.php';

$pass = sha1($_POST['pasahitza']);
$sql = "UPDATE erabiltzaileak set pasahitza = '".$pass."';";
if (!mysqli_query($konexioa, $sql))
		{
			echo "$sql";
					echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);

			}
			
require 'konexioaItxi.php';

echo '<script language=javascript>
alert("Eskaera erregistratua");
window.location.href ="layout.html";

</script>';

//header("Location: layout.html");

?>