<?php
$res2 = mysql_query("SELECT * FROM `seguir` where deid = '$id'");
$contatos = $id;
while($escrever2=mysql_fetch_array($res2)){
	// echo "<br>" . $escrever2['cotid'] . "<br>";
	$contatos = $contatos . "," . $escrever2['artid'];
}

echo "<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">";
include ("engine/postagemar.php");


echo "</div>";



echo "<div id=\"publicidade\" style=\" width: 198px; position: absolute; left: 594px; top: 0px;\">";
echo "
propaganda<br>


</div>";
?>