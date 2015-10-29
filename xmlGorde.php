<?php
   
   
     	define("GALDERAK_XML", "galderak.xml", $case_insensitive=null);

   //errore kontrola, datuak zuzen iritxi direla egiaztatzeko

   
   
 //  if(is_null($_POST['galdera']) || is_null($_POST['erantzuna']) || is_null($_POST['puntuak']){
 //     die("Errorea datuak jasotzean");
 // }
   //formularioko datuak aldagaitan jaso
   $galdera = $_POST['galdera'];
$erantzuna = $_POST['erantzuna'];
$puntuak = $_POST['puntuak'];
   
   //ondoren xml-an for baten bidez aukerak gordetzeko erabiliko den array-a
   $erantzunak = array($galdera, $erantzuna, $puntuak);

   //xml-a kargatu
	$galderak = @simplexml_load_file(GALDERAK_XML) or die("Errorea fitxategiak kudeatzean.");
	
	
	//galderaren enuntziatua gehitu.
	$galdera = $galderak->addChild('assessmentItem');
	$galdera->addAttribute('complexity', $puntuak);
	$item = $galdera->addChild('itemBody');
	$item2 =$item->addChild('element',$_POST['galdera']);
	$item = $galdera->addChild('correctResponse');
	$item2 =$item->addChild('value',$_POST['erantzuna']);

   //xml-an idatzi
	$galderak->asXML(GALDERAK_XML) or die("Errorea fitxategiak kudeatzean.");


	//modu ordenatuan gordetzeko
         $xmlFile = GALDERAK_XML;
         if( !file_exists($xmlFile) ) die('Fitxategia ez da existitzen: ' . $xmlFile);
         else{
            $dom = new DOMDocument('1.0');
            $dom->preserveWhiteSpace = false;
             //Inportanteena, true jarrita, zuhaitz egitura mantentzen du
            $dom->formatOutput = true;
            $dl = @$dom->load($xmlFile); 
            if ( !$dl ) die('Errorea fitxategia atzitzean: ' . $xmlFile);
               $dom->save($xmlFile);
         }


?>
