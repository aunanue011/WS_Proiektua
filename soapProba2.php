<?php
require_once("nusoap/lib/nusoap.php");
function pasahitzaSegurua($pass){
$client = new nusoap_client('http://localhost/webSistemak/WS_Proiektua/egiaztatuPasahitza.php?wsdl');
$result = $client->call("konprobatu",array('pass'=>$pass));
return $result;
}
?>