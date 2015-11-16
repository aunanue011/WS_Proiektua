<?php
require_once("nusoap/lib/nusoap.php");
$client = new nusoap_client('http://localhost/webSistemak/WS_Proiektua/egiaztatuPasahitza.php?wsdl');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$result = $client->call("konprobatu",array('pass'=>'Arete'));
//echo $client->debug_str;
echo $client->getError() . "\n";
//print_r($result);
//echo $client->request . "\n";
//echo $client->response . "\n";
//print_r($result);
//if($result=="NO"){
//	return "Ez";
//}else{
//return "Bai";
//}
//echo($client);
print_r($result);

?>