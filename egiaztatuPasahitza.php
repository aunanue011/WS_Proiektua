
<?php
require_once('nusoap/lib/nusoap.php');
$URL       = "http://localhost/webSistemak/WS_Proiektua/";
$namespace = $URL . '?wsdl';
$server    = new soap_server;
//$server->wsdl->schemaTargetNamespace = $namespace;
$server->configureWSDL('Pasahitza Konprobatu', $namespace);



function konprobatu($pass)
{
	
    if( strpos(file_get_contents("./toppasswords.txt"),$pass) !== false) {
	    
        return "BALIOGABEA";
    }else{
	    return "BALIOZKOA";
    }
}

$server->register('konprobatu',array("pass" => "xsd:string"),array("return" => "xsd:string"),"Pasahitza");

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);

exit();
?>