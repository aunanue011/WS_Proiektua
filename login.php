<?php
	require 'konexioa.php';
	session_start();
$email = $_POST['posta'];
	$pasahitza = $_POST['pasahitza'];
	$pasahitza = sha1($pasahitza);
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
		//sesioa sortu
				if($row['posta']=='web000@ehu.es'){
	$_SESSION['mota']="admin";
	}else{
	$_SESSION['mota']="user";
	

}
$_SESSION['login_user'] = $row['izenabizen'];
	$_SESSION['posta'] = $row['posta'];

		
		$sql="SELECT * FROM  konexioak where ordua like '$ordua'";
$result = mysqli_query($konexioa, $sql);
	$row = mysqli_fetch_assoc($result);
			$_SESSION['ida'] = $row['id'];
			if(	$_SESSION['mota']=="admin"){
			header("Location: reviewingQuizzes.php");
			}else{
			header("Location: insertQuestion.php");
}
}
else{
				header("Location: login.html");

}
	require 'konexioaItxi.php';
?>