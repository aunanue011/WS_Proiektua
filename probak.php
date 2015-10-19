<?php

$re = "/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/"; 
$str = "posta@gmail.com"; 
$postakop=preg_match( $re, $str ) ? true : false;



if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $str))
{
    echo 'Betetzen da'.$str;
}
	
	
	
	$str = "aunanue011@ikasle.ehu.es"; 

if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $str))
{
    echo 'Betetzen da - '.$str;
}
	
	
	/*
		
		


		
		
		
		*/
	
	?>