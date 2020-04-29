<?php
include("engine/post/cabeca.php");
$exibicoesporpag = $row['epp'];
$numincial = $p4 * $exibicoesporpag;

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
	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
	<div style=\"right: 6px; position: absolute;\">
	<a href=\"#menu" . $e . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>
	</div>
	<div style=\"margin-right: 30px;\">
	<span class=\"textoinfo\">
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $escrever1['id_ar'] . "','ar');\"><img src=\"fotos/min/" . $escrever['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $escrever1['id_ar'] . "','ar');\"><span class=\"nome\">" . $escrever['nome'] . "</span></a>

	<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('par','" . $escrever1['id'] . "','1');\" id=\"par" . $escrever1['id'] . "1\"><img src=\"engine/imgs/like.png\"></a> 
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever1['id'] . "','btn_ar_like');\">(" . $rlike . ")</a>

	<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('par','" . $escrever1['id'] . "','0');\" id=\"par" . $escrever1['id'] . "0\"><img src=\"engine/imgs/nlike.png\"></a> 
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever1['id'] . "','btn_ar_nlike');\">(" . $rnlike . ")</a>

	</span><br>
	<span class=\"texto\">" . $escrever1['msg'] . "</span>
	
	";
	include("engine/post/menusar.php");


	//}
  		///////////////////////AREA DO REPOSTE
  		////////////////////////
  		////////////////////////
 	$tabelagostar = "gostar_ar";
 	$btn = "btn_ar_";
 	$rp = "rpar";
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
$cnumdepags = $rcontagemdepags['count(*)'] / $exibicoesporpag;
$numdepags = ceil($cnumdepags);
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
	echo "<a href=\"index.php?indexband&p4=" . $iepg . "\" class=\"classe1\">" . $ndp . "</a>";
	$iepg++;
}
echo "</center></span>";
}
?>
