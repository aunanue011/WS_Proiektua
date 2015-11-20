
<?php

require 'sesionAdmin.php';
require 'konexioa.php';

echo '<head>', "\n";
echo '<style>
td {
    text-align:center; 
    vertical-align:middle;
    }
</style>

    	<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />

';
echo '</head><body>', "\n";
$ordua = date('d/m/Y H:i:s a', time());
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "INSERT INTO ekintzak(ekintza_mota,ordua,ip) VALUES ('Irakasleak Galderak Konprobatu','$ordua', '$ip')";
if (!mysqli_query($konexioa, $sql))
		{
			echo "$sql";
					echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);

			}
$sql="SELECT * FROM  galderak natural join erabiltzaileak";
$result = mysqli_query($konexioa, $sql);
echo('<center>');
echo('<div id="banner"><p> GALDERAK </p> </div>');
echo '<div align="right"> 
<form method="post" action="logout.php" id="logout" name="logout">
'.$_SESSION["login_user"].' barruan da.&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="ikusi" name="lgout" value="Deskonektatu" />
</form></div><br/><br/>';

echo('<table id="taula1">');
echo('<tr><th id="erregistroa">EGILEA</th><th id="erregistroa">POSTA</th><th id="erregistroa">GALDERAREN ENUNTZIATUA</th><th id="erregistroa">ZURE ERANTZUNA</th><th id="erregistroa1">ZAILTASUNA</th><th></th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		echo('<form method="post" action="editatu.php" id="update" name="update" enctype="multipart/form-data">');
		echo('<input type="hidden" name="gkodea" value="'.$row['kodea'].'">');
		echo('<tr name ="galdera" id="galdera">');
		echo('<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td><input type="text" name="enuntziatua" value="'.$row['galdera'].'"/></td>'.'<td><input type="text" name="eran" value="'.$row['erantzuna'].'"/></td>'.'<td><input type="text" name="konplex" value="'.$row['zailtasuna'].'"/></td><td id="zuzendu"><input type="submit" value="Editatu" id="aldatu" />');
		echo('</tr>');
		echo('</form>');


//Bedazpada
//		echo('<form method="post" action="eguneratu.php" id="update" name="update" enctype="multipart/form-data">');
//		echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
//		echo( '<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td><input type="text" name="galdera'.$row['kodea'].'" value="'.$row['galdera'].'"/></td>'.'<td><input type="text" name="galdera'.$row['kodea'].'" value="'.$row['erantzuna'].'"/></td>'.'<td><input type="text" name="galdera'.$row['kodea'].'" value="'.$row['zailtasuna'].'"/></td><td id="zuzendu"><input type="submit" value="Editatu" id="aldatu" />');
//		echo('</tr>');
//		echo('</form>');
		
	//	echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
	//	echo '<td>'.$row['izenabizen'] .'</td>'.'<td>'.$row['posta'] .'</td>'.'<td>'.$row['galdera'] .'</td>'.'<td>'.$row['erantzuna'] .'</td>'.'<td id="tde">'.$row['zailtasuna'] .'</td><td id="zuzendu"><input type="button" value="Editatu" id="bidali" /></td>';	
	//	echo('</tr>');
	}
} 

echo('</table>');
echo('<br/><br/>');
echo('<div class="go"><a href="layout.html">Atzera</a></div>');
echo('<br/><br/>');
echo('</center></body>');

require 'konexioaItxi.php';

?>