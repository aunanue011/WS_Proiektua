<?php
	
	//HTML egitura zuzena mantentzeko.
echo '<html>', "\n";
echo '<head>', "\n";
echo '<style>
textarea {
    resize: none;
}
</style>
    	<link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />
';
echo '
<script>
function nireGalderakIkusi(posta) {
	      document.getElementById("txertaketa").innerHTML="";

     if (posta=="") {
    document.getElementById("niregalderak").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  }
  
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("niregalderak").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ajax.php?eposta="+posta,true);
  xmlhttp.send();
  
}

function galderaTxertatu() {
	    document.getElementById("niregalderak").innerHTML="";

      if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  }
  
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txertaketa").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","galderaGorde.php",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var a = document.getElementById("galdera").value;
   var b = document.getElementById("erantzuna").value;
   var c = document.querySelector(\'input[name = "puntuak"]:checked\').value;
   var d = document.getElementById("logina").value;
   var e = document.getElementById("ida").value;
  xmlhttp.send("galdera="+a+"&erantzuna="+b+"&puntuak="+c+"&logina="+d+"&ida="+e);
  //alert("galdera="+a+"&erantzuna="+b+"&puntuak="+c+"&logina="+d+"&ida="+e);
}


</script>

';
echo '</head>', "\n";
echo '<body>', "\n";

echo '<form method="post" action="galderaGorde.php" id="galderaGehitu" name="galderaGehitu" enctype="multipart/form-data">';

echo 'Galdera: <br/>
		<textarea rows="4" cols="50" name="galdera" id="galdera"></textarea><br/><br/>
		Erantzuna: <br/>
		<input type="text"	name="erantzuna" id="erantzuna" /><br/><br/>
		Zailtasun Maila:<br/>
		  <input type="radio" name="puntuak" id="puntuak" value="1" align="right" checked> 1 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" id="puntuak" value="2" > 2 &nbsp; &nbsp; - &nbsp; &nbsp;
   		  <input type="radio" name="puntuak" id="puntuak" value="3" > 3 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" id="puntuak" value="4" > 4 &nbsp; &nbsp; - &nbsp; &nbsp;
  		  <input type="radio" name="puntuak" id="puntuak" value="5" > 5
<br/><br/>
    <input type="hidden" name="logina" id ="logina" value="'.$_GET['logina'].'">
    <input type="hidden" name="ida" id="ida" value="'.$_GET['ida'].'">
        <input type="button" class="ikusi" name="txertatu" value="Galdera Txertatu" onClick="galderaTxertatu()">    
    <input type="button" class="ikusi" name="gikusi" value=" Nire galderak ikusi" onClick="nireGalderakIkusi(\''.$_GET["logina"].'\')"> ';




echo '</form>';



echo '<div name="niregalderak" id="niregalderak"></div>';
echo '<div name="txertaketa" id="txertaketa"></div>';
echo '<br/><br/><br/>';
echo '<div class="go"><a href="layout.html">Atzera</a></div> </body>';
echo '</html>';
	
	
?>