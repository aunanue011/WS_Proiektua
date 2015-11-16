<?php
require_once('nusoap/lib/nusoap.php');
function bezeroa($pass){
$client = new nusoap_client('egiaztatuPasahitza.php',false);
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$result = $client->call("konprobatu", "123123");
//echo $client->debug_str;
//echo $client->getError() . "\n";
//print_r($result);
//echo $client->request . "\n";
//echo $client->response . "\n";
//print_r($result);
//if($result=="NO"){
//	return "Ez";
//}else{
//return "Bai";
//}
echo($client);
echo($result);
}
?>