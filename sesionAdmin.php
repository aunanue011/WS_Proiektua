<?php
require 'konexioa.php';
session_start();
$user_check=$_SESSION['posta'];
$sql="SELECT * FROM  erabiltzaileak where posta like '$user_check'";
$result = mysqli_query($konexioa, $sql);
$row = mysqli_fetch_assoc($result);
$login_session =$row['izenabizen'];
if(!isset($login_session) || $_SESSION['mota']!="admin"){
header('Location: index.php'); 
}
require 'konexioaItxi.php';
?>