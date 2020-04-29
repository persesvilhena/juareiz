<?php
if ($ar == 1){
	$linkdo1 = 15;
	$linkdo2 = 17;
	$linkdo3 = 13;
} else{
	$linkdo1 = 5;
	$linkdo2 = 7;
	$linkdo3 = 3;
}

$csqlus = mysql_query("select * from user where id = '$escrever3[id_us]';");
 		$rsqlus = mysql_fetch_array($csqlus);
 		$datatempo2 = explode(" ", $escrever3['data']);
		$dat2 = explode("-", $datatempo2[0]);
		$like2 = mysql_query("select * from $tabelagostar where id_post = '$escrever3[id]' and gostei = '1'");
		$rlike2 = mysql_num_rows($like2);
		$nlike2 = mysql_query("select * from $tabelagostar where id_post = '$escrever3[id]' and gostei = '0'");
		$rnlike2 = mysql_num_rows($nlike2);

		if($user_logado_valor == 1){
		echo "<div style=\"min-height: 40px; position: static;\">
		<div style=\"right: 0px; position: absolute;\">
		<a href=\"#rmenu" . $i . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>
		</div>
		<div style=\"margin-right: 30px;\">
		<span class=\"textoinfo\">
		
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\"><img src=\"fotos/min/" . $rsqlus['foto'] . "\" width=\"35\" height=\"35\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\">" . $rsqlus['nome'] . " " . $rsqlus['sobrenome'] . "</a>";

		echo "
		<a href=\"" . $pagina . "&p1=1&p2=" . $escrever3['id'] . "&p3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a> <a href=\"#rgostou" . $i . "\" name=\"modal\" class=\"classe1\">(" . $rlike2 . ")</a>
		<a href=\"" . $pagina . "&p1=1&p2=" . $escrever3['id'] . "&p3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a> <a href=\"#rngostou" . $i . "\" name=\"modal\" class=\"classe1\">(" . $rnlike2 . ")</a>
		</span>";
		echo "<br><span class=\"texto\">" . $escrever3['msg'] . "</span></div>";


  		include ("engine/com/us/remenu.php");
  	}else{
  		echo "<div style=\"min-height: 40px; position: static;\">
			<div style=\"margin-right: 30px;\">
				<span class=\"textoinfo\">
				
				<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\"><img src=\"fotos/min/" . $rsqlus['foto'] . "\" width=\"35\" height=\"35\" align=\"left\" class=\"pr1\"></a>
				<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\">" . $rsqlus['nome'] . " " . $rsqlus['sobrenome'] . "</a>
				<img src=\"engine/imgs/like.png\"> (" . $rlike2 . ")
				<img src=\"engine/imgs/nlike.png\"> (" . $rnlike2 . ")
				</span>
				<br><span class=\"texto\">" . $escrever3['msg'] . "</span>
			</div>
		</div>
		";
  	}
?>