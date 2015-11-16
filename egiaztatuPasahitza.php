
<?php
require_once('nusoap/lib/nusoap.php');
$URL       = "http://localhost/webSistemak/WS_Proiektua/";
$namespace = $URL.'?wsdl';
$server    = new soap_server();
//$server->wsdl->schemaTargetNamespace = $namespace;
$server->configureWSDL('Pasahitza_Konprobatu',$namespace);



function konprobatu($pass)
{
$handle = @fopen('./toppasswords.txt', "r");
if ($handle) {
  while (!feof($handle)) {
    $entry_array = fgets($handle);
    if ($entry_array == $pass) {
      return "BALIOGABEA";
      }
    }
  fclose($handle);
  }
return "BALIODUNA";

}

$server->register('konprobatu',array("pass"=>"xsd:string"),array("return"=>"xsd:string"),"Pasahitza");

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);

exit();
?>