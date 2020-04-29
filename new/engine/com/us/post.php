<?php
$e = $e + 1;
$csql_user = mysql_query("select * from user where id = '$com_rsql[id_us]'");
$rsql_user = mysql_fetch_array($csql_user);
$datatempo = explode(" ", $com_rsql['data']);
$dat = explode("-", $datatempo[0]);
$like = mysql_query("select * from gt where id_post = '$com_rsql[id]' and gostei = '1'");
$rlike = mysql_num_rows($like);
$nlike = mysql_query("select * from gt where id_post = '$com_rsql[id]' and gostei = '0'");
$rnlike = mysql_num_rows($nlike);

if($user_logado_valor == 1){
echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
<div style=\"right: 6px; position: absolute;\">
<a href=\"#menu" . $e . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>
</div>
<div style=\"margin-right: 30px;\">
<span class=\"textoinfo\">
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_us'] . "','us');\"><img src=\"fotos/min/" . $rsql_user['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_us'] . "','us');\"><span class=\"nome\">" . $rsql_user['nome'] . " " . $rsql_user['sobrenome'] . "</span></a>
<a href=\"" . $pagina . "&p1=1&p2=" . $com_rsql['id'] . "&p3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a> <a href=\"#gostou" . $e . "\" name=\"abremenu\" class=\"classe1\">(" . $rlike . ")</a>
<a href=\"" . $pagina . "&p1=1&p2=" . $com_rsql['id'] . "&p3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a> <a href=\"#ngostou" . $e . "\" name=\"abremenu\" class=\"classe1\">(" . $rnlike . ")</a>
</span><br>
<span class=\"texto\">" . $com_rsql['msg'] . "</span>

";

include ("engine/com/us/menu.php");
}else{
	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
<div style=\"margin-right: 30px;\">
<span class=\"textoinfo\">
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_us'] . "','us');\"><img src=\"fotos/min/" . $rsql_user['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_us'] . "','us');\"><span class=\"nome\">" . $rsql_user['nome'] . " " . $rsql_user['sobrenome'] . "</span></a>
<img src=\"engine/imgs/like.png\"> (" . $rlike . ")
<img src=\"engine/imgs/nlike.png\"> (" . $rnlike . ")
</span><br>
<span class=\"texto\">" . $com_rsql['msg'] . "</span>

";
}




///////////////////////////////////////////////////////////
////////////////////////AREA REPOSTE
////////////////////////////////////////////////////////////
$tabelagostar = "gt";
$ar = 0;
echo "</div></div><div style=\"position: relative; border: 0px solid #000000; left: 55px; /*width: 520px;*/ margin-right: 55px;\">";
$res3 = mysql_query("SELECT * FROM `com` where id_tipo = '$com_idtipo' and id_subtipo = '$com_idsubtipo' and id_post = '$com_rsql[id]' ORDER BY id asc LIMIT 0 , 30");
	while($escrever3=mysql_fetch_array($res3)){
		$i = $i + 1;
		if($escrever3['id_us'] != null){
		include ("engine/com/us/repost.php");
		}else{
		include ("engine/com/ar/repost.php");	
		}
}


if($user_logado_valor == 1){

echo "
<form action=\"\" method=\"post\" name=\"coment\">
<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
<input type=\"hidden\" name=\"id_post\" value=\"" . $com_rsql['id'] . "\">
<input type=\"hidden\" name=\"id_tipo\" value=\"" . $com_idtipo . "\">
<input type=\"hidden\" name=\"id_subtipo\" value=\"" . $com_idsubtipo . "\">
<input type=\"submit\" name=\"post\" id=\"cordoinput\" value=\"Postar\">
</form>
";
}
echo "</div></div>";


?>