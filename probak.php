<?php

$re = "/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/"; 
$str = "posta@gmail.com"; 
$postakop=preg_match( $re, $str ) ? true : false;



if (preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $str))
{
    echo 'Betetzen da'.$str;
}
	
	
	
	$str = "aunanue011@ikasle.ehu.es"; 

if (preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $str))
{
    echo 'Betetzen da - '.$str;
}
	
	
	/*
		
		if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $email))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Posta formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}

		if (!preg_match('/^[0-9]{9}$/', $telefonoa))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Telefono formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}

		if (!preg_match('/^[A-z]+\s+[A-z]+\s+[A-z].*[A-z]$/', $izena))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Izen Abizen formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}

		if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $email))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Posta formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}

		if (!preg_match('/^[a-z]*[0-9]{3}\\@ikasle\\.ehu+(\\.es|\\.eus)$/', $email))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Posta formatu okerra.')
    window.location.href='signUp.html';
    </SCRIPT>");
}


		
		
		
		*/
	
	?>