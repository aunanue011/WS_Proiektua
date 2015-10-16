<?php
	require 'konexioa.php';
$email = $_POST['posta'];
	$pasahitza = $_POST['pasahitza'];
	
	$sql="SELECT * FROM  erabiltzaileak where posta like '$email'";
$result = mysqli_query($konexioa, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row!=0 && $pasahitza==$row['pasahitza']){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ondo logeatu zara')
    window.location.href='quiz.html';
   </SCRIPT>");
		
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Erabiltzaile eta pasahitza okerrak. Sahiatu berriro')
    window.location.href='login.html';
    </SCRIPT>");
	}

	
	

	

	
?>
	