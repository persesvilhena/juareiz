<?php
$user_logado_valor = user_logado();

if(user_logado()){
include("engine/protege.php");
include("engine/com/cabeca.php");
include("engine/com/comentar.php");

$exibicoesporpag = $row['epp'];
$numincial = $p4 * $exibicoesporpag;
}else{
	$exibicoesporpag = 30;
$numincial = $p4 * $exibicoesporpag;
$i = 0;
$e = 0;
$numid = array();
$numidar = array();
$pfdiv = null;
$iddouser = null;
$porra = 0;
while($porra != 10000){
	$numid[$porra] = 0;
	$porra++;
}
$porra = 0;
while($porra != 10000){
	$numidar[$porra] = 0;
	$porra++;
}
}

$com_csql = mysql_query("select * from com where id_tipo = '$com_idtipo' and id_subtipo = '$com_idsubtipo' and (id_post IS NULL) order by id desc limit $numincial, $exibicoesporpag;");
while($com_rsql=mysql_fetch_array($com_csql)){
	if($com_rsql['id_post'] == null){
		if($com_rsql['id_us'] != null){
			include("engine/com/us/post.php");
		}
		if($com_rsql['id_ar'] != null){
			include("engine/com/ar/post.php");
		}
	}
}



$contagemdepags = mysql_query("SELECT count(*) FROM `com` where id_tipo = '$com_idtipo' and id_subtipo = '$com_idsubtipo' and (id_post IS NULL);");
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
		echo "<a href=\"" . $pagina . "&p4=" . $iepg . "\" class=\"classe1\">" . $ndp . "</a>";
		$iepg++;
	}
	echo "</center></span>";
}
?>