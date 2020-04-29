<?php
include("engine/post/cabeca.php");
$exibicoesporpag = $row['epp'];
$numincial = $i4 * $exibicoesporpag;

//echo $numincial;

// echo $contatos;

$res1 = mysql_query("SELECT * FROM `post_ar` where id_ar in ($contatos) ORDER BY id DESC LIMIT $numincial , $exibicoesporpag");
while($escrever1=mysql_fetch_array($res1)){
	$e = $e + 1;
	$res = mysql_query("select * from artista where id = '$escrever1[id_ar]'");
	$escrever=mysql_fetch_array($res);
	$datatempo = explode(" ", $escrever1['data']);
	$dat = explode("-", $datatempo[0]);
	$like = mysql_query("select * from gostar_ar where id_post = '$escrever1[id]' and gostei = '1'");
	$rlike = mysql_num_rows($like);
	$nlike = mysql_query("select * from gostar_ar where id_post = '$escrever1[id]' and gostei = '0'");
	$rnlike = mysql_num_rows($nlike);
	$iddouser = $escrever1['id_ar'];
	$estmus = mysql_query("select * from est_musical where id = '$escrever[est_musical]';");
	$restmus = mysql_fetch_array($estmus);
		if ($escrever['musicas'] == 1){ $mus = "Proprias"; }
		if ($escrever['musicas'] == 2){ $mus = "Covers"; }
		if ($escrever['musicas'] == 3){ $mus = "Mistas"; }
		if($numidar[$iddouser] == 0){
			$numidar[$iddouser] = 1;
			$pfdiv = $pfdiv . "

			<div id=\"pfardialog" . $escrever1['id_ar'] . "\" class=\"pfwindow\">
			<div align=\"right\">
			<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a>
			</div>
			<img src=\"fotos/" . $escrever['foto'] . "\" width=\"250\" height=\"250\" align=\"left\">
			<div align=\"left\">
			<span class=\"titulo\">" . $escrever['nome'] . " - <a href=\"index.php?verart&i1=1&i2=" . $escrever1['id_ar'] . "\" class=\"classe1\">Visitar Perfil</a></span>
			<hr size=\"1\" color=\"#cccccc\">
			<span class=\"texto\">
			<b>Descrição:</b> " . $escrever['descricao'] . "<br>
			<b>Musicas:</b> " . $mus . "<br>
			<b>Estilo Musical:</b> " . $restmus['nome'] . "<br>
			<b>Cidade:</b> " . $escrever['cidade'] . "<br>
			<b>Estado:</b> " . $escrever['estado'] . "<br>
			</span></div>
			</div>";
		}
	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
	<div style=\"right: 6px; position: absolute;\">
	<a href=\"#menu" . $e . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>
	</div>
	<div style=\"margin-right: 30px;\">
	<span class=\"textoinfo\">
	<a href=\"#pfardialog" . $escrever1['id_ar'] . "\" class=\"linkus\" name=\"pfmodal\"><img src=\"fotos/" . $escrever['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
	<a href=\"#pfardialog" . $escrever1['id_ar'] . "\" class=\"linkus\" name=\"pfmodal\"><span class=\"nome\">" . $escrever['nome'] . "</span></a>
	<a href=\"" . $pagina . "&p1=12&p2=" . $escrever1['id'] . "&p3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a> <a href=\"#gostou" . $e . "\" name=\"abremenu\" class=\"classe1\">(" . $rlike . ")</a>
	<a href=\"" . $pagina . "&p1=12&p2=" . $escrever1['id'] . "&p3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a> <a href=\"#ngostou" . $e . "\" name=\"abremenu\" class=\"classe1\">(" . $rnlike . ")</a>
	</span><br>
	<span class=\"texto\">" . $escrever1['msg'] . "</span>
	
	";
	include("engine/post/menusar.php");


	//}
  		///////////////////////AREA DO REPOSTE
  		////////////////////////
  		////////////////////////
 	$tabelagostar = "gostar_ar";
 	$ar = 1;
	echo "</div></div><div style=\"position: relative; border: 0px solid #000000; left: 55px; /*width: 520px;*/ margin-right: 55px;\">";
	$res3 = mysql_query("SELECT * FROM `repost_ar` where id_post = '$escrever1[id]' ORDER BY id asc LIMIT 0 , 30");
 	while($escrever3=mysql_fetch_array($res3)){
 		$i = $i + 1;
 		if($escrever3['id_us'] != null){
 		include ("engine/post/usrepost.php");
 		}else{
 		include ("engine/post/arrepost.php");	
 		}
	}
	if($row['idart'] == null){
	echo "
	<form action=\"" . $pagina . "&i2=" . $escrever1['id_ar'] . "\" method=\"post\" name=\"coment\">
	<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
	<input type=\"hidden\" name=\"idpost\" value=\"" . $escrever1['id'] . "\">
	<input type=\"hidden\" name=\"idartista\" value=\"" . $escrever1['id_ar'] . "\">
	<input type=\"submit\" name=\"arrepost\" id=\"cordoinput\" value=\"Postar\">
	</form>
	";
	}else{
	echo "
	<form action=\"" . $pagina . "&i2=" . $escrever1['id_ar'] . "\" method=\"post\" name=\"coment\">
	<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
	<input type=\"hidden\" name=\"idpost\" value=\"" . $escrever1['id'] . "\">
	<input type=\"hidden\" name=\"idartista\" value=\"" . $escrever1['id_ar'] . "\">
	<input type=\"submit\" name=\"arrepost1\" id=\"cordoinput\" value=\"Postar\">
	</form>
	";
	}
	echo "</div></div>";
}
$contagemdepags = mysql_query("SELECT count(*) FROM `post_ar` where id_ar in ($contatos);");
$rcontagemdepags = mysql_fetch_array($contagemdepags);
//echo $rcontagemdepags['count(*)'];
$numdepags = $rcontagemdepags['count(*)'] / $exibicoesporpag;
$iepg = 0;
if($numdepags > 1){
if ($numdepags > 19){
	$numdepags = 19;
}
echo "<span class=\"texto\"><center>";
while ($iepg != $numdepags){
	$ndp = $iepg + 1;
	if($iepg != 0){
		echo " - ";
	}
	echo "<a href=\"index.php?indexband&i4=" . $iepg . "\" class=\"classe1\">" . $ndp . "</a>";
	$iepg++;
}
echo "</center></span>";
}
?>
