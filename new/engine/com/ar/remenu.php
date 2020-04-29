<?php		
		echo "
		<div id=\"boxes\">
		<div id=\"rgostou" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rgostou" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div>";
		while($rrlike2 = mysql_fetch_array($like2)){
			if($rrlike2['id_us'] != null){
			$csqlrlk2 = mysql_query("select * from user where id = '$rrlike2[id_us]'");
			$rsqlrlk2 = mysql_fetch_array($csqlrlk2);
			$datatempo3 = explode(" ", $rrlike2['data']);
			$dat3 = explode("-", $datatempo3[0]);
			if($rrlike2['id_us'] == $row['id']){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrlike2['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk2['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk2['id'] . "\" class=\"linkus\">" . $rsqlrlk2['nome'] . " " . $rsqlrlk2['sobrenome'] . "</a><br>
			<span class=textoinfo>" . $dat3[2] . "/" . $dat3[1] . "/" . $dat3[0] . " " . $datatempo3[1] . "  " . $msgapg . "
			</div>
			";
			}else{
			$csqlrlk2 = mysql_query("select * from artista where id = '$rrlike2[id_ar]'");
			$rsqlrlk2 = mysql_fetch_array($csqlrlk2);
			$datatempo3 = explode(" ", $rrlike2['data']);
			$dat3 = explode("-", $datatempo3[0]);
			$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rrlike2[id_ar]'");
			$rsecveradm = mysql_fetch_array($secveradm);
			if($rsecveradm['adm'] == 1){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrlike2['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"index.php?verart&i1=1&i2=" . $rsqlrlk2['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"index.php?verart&i1=1&i2=" . $rsqlrlk2['id'] . "\" class=\"linkus\">" . $rsqlrlk2['nome'] . "</a><br>
			<span class=textoinfo>" . $dat3[2] . "/" . $dat3[1] . "/" . $dat3[0] . " " . $datatempo3[1] . " " . $msgapg . "
			</div>
			";
			}
		}
		echo "
		</div>
  		</div>


  		<div id=\"boxes\">
		<div id=\"rngostou" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rngostou" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div>";
		while($rrnlike2 = mysql_fetch_array($nlike2)){
			if($rrnlike2['id_us'] != null){
			$csqlrnlk2 = mysql_query("select * from user where id = '$rrnlike2[id_us]'");
			$rsqlrnlk2 = mysql_fetch_array($csqlrnlk2);
			$datatempo4 = explode(" ", $rrnlike2['data']);
			$dat4 = explode("-", $datatempo4[0]);
			if($rrnlike2['id_us'] == $row['id']){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrnlike2['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"index.php?user&i1=1&i2=" . $rsqlrnlk2['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrnlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"index.php?user&i1=1&i2=" . $rsqlrnlk2['id'] . "\" class=\"linkus\">" . $rsqlrnlk2['nome'] . " " . $rsqlrnlk2['sobrenome'] . "</a><br>
			<span class=textoinfo>" . $dat4[2] . "/" . $dat4[1] . "/" . $dat4[0] . " " . $datatempo4[1] . " " . $msgapg . "
			</div>

			";
			}else{
			$csqlrnlk2 = mysql_query("select * from artista where id = '$rrnlike2[id_ar]'");
			$rsqlrnlk2 = mysql_fetch_array($csqlrnlk2);
			$datatempo4 = explode(" ", $rrnlike2['data']);
			$dat4 = explode("-", $datatempo4[0]);
			$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rrnlike2[id_ar]'");
			$rsecveradm = mysql_fetch_array($secveradm);
			if($rsecveradm['adm'] == 1){ $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrnlike2['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = ""; }
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"index.php?verart&i1=1&i2=" . $rsqlrnlk2['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrnlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"index.php?verart&i1=1&i2=" . $rsqlrnlk2['id'] . "\" class=\"linkus\">" . $rsqlrnlk2['nome'] . "</a><br>
			<span class=textoinfo>" . $dat4[2] . "/" . $dat4[1] . "/" . $dat4[0] . " " . $datatempo4[1] . " " . $msgapg . "
			</div>

			";
			}
		}
		echo "
		</div>
  		</div>
  		

  		<div id=\"boxes\">
		<div id=\"rmenu" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rmenu" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div><center>
				<span class=textoinfo>" . $dat2[2] . "/" . $dat2[1] . "/" . $dat2[0] . " " . $datatempo2[1] . " ";
		$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$escrever3[id_ar]'");
		$rsecveradm = mysql_fetch_array($secveradm);
		if($rsecveradm['adm'] == 1){
			echo "<br>
			<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"ocmenualt('" . $i . "')\">
			<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"ocmenuapa('" . $i . "')\">";
		}

		echo "
		</center>
		</span>
		<div id=\"roalterar" . $i . "\" style=\"display: none;\">";
		echo "<form action=\"" . $pagina . "&p1=4&p2=" . $escrever3['id'] . "\" method=\"post\">
			<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever3['msg'] . "</textarea>
			<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
			</form>";
		echo "
		</div>
		<div id=\"roapagar" . $i . "\" style=\"display: none;\">
		<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
		<a href=\"" . $pagina . "&p1=3&p2=" . $escrever3['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a>
		</center>
		</div>

		</div>
  		</div>



  		</div>
";
?>