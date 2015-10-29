<?php
	require 'konexioa.php';
$email = $_POST['posta'];
	$pasahitza = $_POST['pasahitza'];
	
	$sql="SELECT * FROM  erabiltzaileak where posta like '$email'";
$result = mysqli_query($konexioa, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row!=0 && $pasahitza==$row['pasahitza']){
		$ordua = date('d/m/Y H:i:s a', time());
$sql = "INSERT INTO konexioak(eposta, ordua) VALUES ('$email', '$ordua')";
	if (!mysqli_query($konexioa, $sql))
		{
					echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);

		}
		$sql="SELECT * FROM  konexioak where ordua like '$ordua'";
$result = mysqli_query($konexioa, $sql);
	$row = mysqli_fetch_assoc($result);
$ida=$row['id'];
		
		
		
		
	require 'konexioaItxi.php';
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='InsertQuestion.php?logina=$email&ida=$ida';
   </SCRIPT>");
		
	}
	else{
			require 'konexioaItxi.php';

		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Erabiltzaile eta pasahitza okerrak. Sahiatu berriro')
    window.location.href='login.html';
    </SCRIPT>");
	}

	
	

	

	
?>
	