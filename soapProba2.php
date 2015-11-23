<?php
require_once("nusoap/lib/nusoap.php");
$client = new nusoap_client('http://localhost/webSistemak/WS_Proiektua/egiaztatuPasahitza.php?wsdl');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$result = $client->call("konprobatu",array('pass'=>'1234567'));
echo $client->getError() . "\n";

print_r($result);

?>