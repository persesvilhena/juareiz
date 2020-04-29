<?php
echo "
<div id=\"boxes\">

	<div id=\"gostou" . $com_rsql['id'] . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#gostou" . $com_rsql['id'] . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>";
	while($rrlike = mysql_fetch_array($like)){
		if($rrlike['id_us'] != null){
		$csqlrlk = mysql_query("select * from user where id = '$rrlike[id_us]'");
		$rsqlrlk = mysql_fetch_array($csqlrlk);
		$datatempo5 = explode(" ", $rrlike['data']);
		$dat5 = explode("-", $datatempo5[0]);
		if($rrlike['id_us'] == $row['id']){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrlike['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"linkus\">" . $rsqlrlk['nome'] . " " . $rsqlrlk['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat5[2] . "/" . $dat5[1] . "/" . $dat5[0] . " " . $datatempo5[1] . "  " . $msgapg . "
		</div>
		";
		}else{
		$csqlrlk = mysql_query("select * from artista where id = '$rrlike[id_ar]'");
		$rsqlrlk = mysql_fetch_array($csqlrlk);
		$datatempo5 = explode(" ", $rrlike['data']);
		$dat5 = explode("-", $datatempo5[0]);
		$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rrlike[id_ar]'");
		$rsecveradm = mysql_fetch_array($secveradm);
		if($rsecveradm['adm'] == 1){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrlike['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"index.php?verart&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"index.php?verart&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"linkus\">" . $rsqlrlk['nome'] . "</a><br>
		<span class=textoinfo>" . $dat5[2] . "/" . $dat5[1] . "/" . $dat5[0] . " " . $datatempo5[1] . "  " . $msgapg . "
		</div>
		";
		}
	}
	echo "
	</div>


	<div id=\"ngostou" . $com_rsql['id'] . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#ngostou" . $com_rsql['id'] . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>";
	while($rrnlike = mysql_fetch_array($nlike)){
		if($rrnlike['id_us'] != null){
		$csqlrnlk = mysql_query("select * from user where id = '$rrnlike[id_us]'");
		$rsqlrnlk = mysql_fetch_array($csqlrnlk);
		$datatempo6 = explode(" ", $rrnlike['data']);
		$dat6 = explode("-", $datatempo6[0]);
		if($rrnlike['id_us'] == $row['id']){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrnlike['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrnlk['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrnlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrnlk['id'] . "\" class=\"linkus\">" . $rsqlrnlk['nome'] . " " . $rsqlrnlk['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat6[2] . "/" . $dat6[1] . "/" . $dat6[0] . " " . $datatempo6[1] . " " . $msgapg . "
		</div>
		";
		}else{
		$csqlrnlk = mysql_query("select * from artista where id = '$rrnlike[id_ar]'");
		$rsqlrnlk = mysql_fetch_array($csqlrnlk);
		$datatempo6 = explode(" ", $rrnlike['data']);
		$dat6 = explode("-", $datatempo6[0]);
		$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rrnlike[id_ar]'");
		$rsecveradm = mysql_fetch_array($secveradm);
		if($rsecveradm['adm'] == 1){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrnlike['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"index.php?verart&i1=1&i2=" . $rsqlrnlk['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrnlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"index.php?verart&i1=1&i2=" . $rsqlrnlk['id'] . "\" class=\"linkus\">" . $rsqlrnlk['nome'] . "</a><br>
		<span class=textoinfo>" . $dat6[2] . "/" . $dat6[1] . "/" . $dat6[0] . " " . $datatempo6[1] . " " . $msgapg . "
		</div>
		";
		}
	}
	echo "
	</div>


	<div id=\"menu" . $com_rsql['id'] . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#menu" . $com_rsql['id'] . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div><center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$com_rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $com_rsql['id'] . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $com_rsql['id'] . "')\">";
	}

	echo "
	</center>
	</span>
	<div id=\"palterar" . $com_rsql['id'] . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=4&p2=" . $com_rsql['id'] . "&i2=" . $com_rsql['id_ar'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $com_rsql['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $com_rsql['id'] . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=3&p2=" . $com_rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>
	</div>
	</div>
</div>
 	";

?>