
<?php

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
echo '</head>', "\n";

$sql="SELECT * FROM  galderak";
$result = mysqli_query($konexioa, $sql);
echo('<center>');
echo('<table width="100%" align="center">');
echo('<tr><th>GALDERAREN ENUNTZIATUA</th><th>ZURE ERANTZUNA</th><th>ZAILTASUNA</th><th></th></tr>');

if($result) {
	while($row = mysqli_fetch_assoc($result)) {
		

		
		echo('<tr name ="galdera'.$row['kodea'].'" id="galdera'.$row['kodea'].'">');
		echo '<td>'.$row['galdera'] .'</td>'.'<td><input type="text" name="erantzun'.$row['kodea'].'"</td>'.'<td>'.$row['zailtasuna'] .'</td><td><input type="button" value="ZUZENDU" /></td>';	
		echo('</tr>');
	}
} 

echo('</table>');
echo('</center>');

require 'konexioaItxi.php';

?>