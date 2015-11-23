<?php
require_once("nusoap/lib/nusoap.php");

function bezeroa($posta){
	$soapclient = new nusoap_client('http://wsrosaas.hol.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);
	$result = $soapclient->call('egiaztatu', array('x'=>$posta));

return $result;

}
?>