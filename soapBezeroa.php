<?php
require_once('nusoap/lib/nusoap.php');
$client = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$result = $client->call('comprobar', 'proba@ikasle.ehu.es');
//echo $client->debug_str;
//echo $client->getError() . "\n";
//print_r($result);
//echo $client->request . "\n";
echo $client->response . "\n";
?>