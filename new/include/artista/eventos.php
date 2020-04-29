<?php
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
	if (user_logado()){
		$endereco_da_pagina = "index.php?eventos";
	}else{
		$endereco_da_pagina = "home.php?p=eventos";
	}
echo "<span class=\"titulo\">Eventos:</span><br>";
$agendasql = mysql_query("SELECT * FROM agenda where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 100");
 while($ragendasql=mysql_fetch_array($agendasql)){
 	$dat = explode("-", $ragendasql['data']);
echo "<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . ": </span><span class=texto><a href=" . $endereco_da_pagina . "&i1=2&i2=" . $ragendasql['id'] . " class=classe1>" . $ragendasql['descricao'] . "</a></span><br>";
}
}






if ($i1 == 2){
$sql = mysql_query("select * from agenda where id = '$i2'");
$rsql = mysql_fetch_array($sql);
$sql2 = mysql_query("select * from artista where id = '$rsql[id_ar]'");
$rsql2 = mysql_fetch_array($sql2);
$sql3 = mysql_query("select * from est_musical where id = '$rsql2[est_musical]'");
$rsql3 = mysql_fetch_array($sql3);
$dat = explode("-", $rsql['data']);
	if ($rsql['rev'] == 0){ $rev = "Nao Revisada"; }
	if ($rsql['rev'] == 1){ $rev = "Revisada"; }
echo "<span class=titulo>" . $rsql['descricao'] . "</span>
<hr color=\"#cccccc\" size=\"1\">
<span class=texto>
<b>Data: </b>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . "<br>
<b>Hora: </b>" . $rsql['hora'] . "<br>
<b>Local: </b>" . $rsql['local'] . "<br>
<b>Banda: </b>" . $rsql2['nome'] . "<br>
<b>Estilo Musical: </b>" . $rsql3['nome'] . "<br>
<b>Revisado: </b>" . $rev . "<br>
<a href=\"" . $rsql['link'] . "\" target=\"_top\" class=\"botao\">Comprar Ingresso<a><br>
<img src=\"fotos/" . $rsql2['foto'] . "\" style=\"max-width: 400px; max-height: 400px;\">




";
	$com_idtipo = "12";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}
?>