<?php
function cabeca(){
	if($row['idart'] == null){
		$idorigem = "id_us";
		$idorigemvalor = $row['id'];
	}else{
		$idorigem = "id_ar";
		$idorigemvalor = $row['idart'];
	}
	if(isset($_POST["post"])) { 
		if(!empty($_POST["msg"]) && !empty($_POST["id_tipo"]) && !empty($_POST["id_subtipo"])) {
			$id_tipo = $class->antisql($_POST["id_tipo"]);
			$id_subtipo = $class->antisql($_POST["id_subtipo"]);
			$msg = $class->antisql($_POST["msg"]);
			if(!empty($_POST['id_post'])){$id_post = "'" . $class->antisql($_POST['id_post']) . "'";} else {$id_post = "NULL";}
			if(!empty($_POST['arquivo'])){$arquivo = "'" . $class->antisql($_POST['arquivo']) . "'";} else {$arquivo = "NULL";}
			$query = "insert into com (id_tipo, id_subtipo, $idorigem, msg, id_post, arquivo, data) values ('$id_tipo', '$id_subtipo', '$idorigemvalor', '$msg', $id_post, $arquivo, '$date');";
			echo $query;
			$insert = mysql_query($query) or die(mysql_error());
			if($insert) {
				echo "<script>window.location='" . $pagina . "';</script>";
			}	
		}
		else {
			echo "<script>alert('Erro, campo em branco');window.location='" . $pagina . "';</script>";
		}		
	}

	if($p1 == 1){
		if($row['idart'] == null){
			$csql = mysql_query("select * from gt where id_us = '$id' and id_post = '$p2';");
			if(mysql_num_rows($csql) > 0){
				$insert = mysql_query("update gt set gostei = '$p3', data = '$date' where id_post = '$p2' and id_us = '$id'");
				if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
			} else {
				$insert = mysql_query("insert into gt (id_post, id_us, gostei, data) values('$p2', '$id', '$p3', '$date')");
				if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
			}
		}else{
			$csql = mysql_query("select * from gt where id_ar = '$row[idart]' and id_post = '$p2';");
			if(mysql_num_rows($csql) > 0){
				$insert = mysql_query("update gt set gostei = '$p3', data = '$date' where id_post = '$p2' and id_ar = '$row[idart]'");
				if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
			} else {
				$insert = mysql_query("insert into gt (id_post, id_ar, gostei, data) values('$p2', '$row[idart]', '$p3', '$date')");
				if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
			}
		}
	}

	if($p1 == 2){
		$alt_csql = mysql_query("SELECT * FROM gt WHERE id = '$p2';");
		$alt_rsql = mysql_fetch_array($alt_csql);
		if($alt_rsql['id_us'] != null){
			if($alt_rsql['id_us'] == $row['id']){
				$altera = mysql_query("delete from gt where id = '$p2';");
				if($altera){ $msgerror = "Gostar apagado com sucesso"; } else { $msgerror = "Houve um problema"; }
			}
		}else{
			$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$alt_rsql[id_ar]'");
			$rsecveradm = mysql_fetch_array($secveradm);
			if($rsecveradm['adm'] == 1){
				$altera = mysql_query("delete from gt where id = '$p2';");
				if($altera){ $msgerror = "Gostar apagado com sucesso"; } else { $msgerror = "Houve um problema"; }
			}
		}
		echo "<script>alert('" . $msgerror . "');window.location='" . $pagina . "';</script>";
	}

	if($p1 == 3){
		$apg_csql = mysql_query("SELECT * FROM com WHERE id = '$p2';");
		$apg_rsql = mysql_fetch_array($apg_csql);
		if($apg_rsql['id_post'] == null){
			if($apg_rsql['id_us'] != null){
				if($apg_rsql['id_us'] == $row['id']){
					$apaga = mysql_query("delete from com where id = '$p2';");
					$apaga = mysql_query("delete from com where id_post = '$p2';");
					if($apaga){ $msgerror = "Postagem apagada com sucesso"; } else { $msgerror = "Houve um problema"; }
				}
			}else{
				$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$apg_rsql[id_ar]'");
				$rsecveradm = mysql_fetch_array($secveradm);
				if($rsecveradm['adm'] == 1){
					$apaga = mysql_query("delete from com where id = '$p2';");
					$apaga = mysql_query("delete from com where id_post = '$p2';");
					if($apaga){ $msgerror = "Postagem apagada com sucesso"; } else { $msgerror = "Houve um problema"; }
				}
			}
		}else{
			if($apg_rsql['id_us'] != null){
				if($apg_rsql['id_us'] == $row['id']){
					$apaga = mysql_query("delete from com where id = '$p2';");
					if($apaga){ $msgerror = "Postagem apagada com sucesso"; } else { $msgerror = "Houve um problema"; }
				}
			}else{
				$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$apg_rsql[id_ar]'");
				$rsecveradm = mysql_fetch_array($secveradm);
				if($rsecveradm['adm'] == 1){
					$apaga = mysql_query("delete from com where id = '$p2';");
					if($apaga){ $msgerror = "Postagem apagada com sucesso"; } else { $msgerror = "Houve um problema"; }
				}
			}
		}
		echo "<script>alert('" . $msgerror . "');window.location='" . $pagina . "';</script>";
	}

	if($p1 == 4){
		$alt_csql = mysql_query("SELECT * FROM com WHERE id = '$p2';");
		$alt_rsql = mysql_fetch_array($alt_csql);
		if($alt_rsql['id_us'] != null){
			if($alt_rsql['id_us'] == $row['id']){
				if(isset($_POST["alterapost"])) {
					if(!empty($_POST["msg"])) {
						$msg = $class->antisql($_POST["msg"]);
						$altera = mysql_query("update com set msg = '$msg' WHERE id='$p2';");
						if($altera){ $msgerror = "Postagem alterada com sucesso"; } else { $msgerror = "Houve um problema"; }
					}else{
						$msgerror = "Campo vazio";
					}
				}
			}
		}else{
			$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$alt_rsql[id_ar]'");
			$rsecveradm = mysql_fetch_array($secveradm);
			if($rsecveradm['adm'] == 1){
				if(isset($_POST["alterapost"])) {
					if(!empty($_POST["msg"])) {
						$msg = $class->antisql($_POST["msg"]);
						$altera = mysql_query("update com set msg = '$msg' WHERE id='$p2';");
						if($altera){ $msgerror = "Postagem alterada com sucesso"; } else { $msgerror = "Houve um problema"; }
					}else{
						$msgerror = "Campo vazio";
					}
				}
			}
		}
		echo "<script>alert('" . $msgerror . "');window.location='" . $pagina . "';</script>";
	}

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

function post_us($func_id){
	$e = $e + 1;
	$com_rsql['id_us'] == $func_id;
	echo $com_rsql['id_us'];
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

	menu_us();
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

	////////////////////////AREA REPOSTE//////////////////////
	$tabelagostar = "gt";
	$ar = 0;
	echo "</div></div><div style=\"position: relative; border: 0px solid #000000; left: 55px; /*width: 520px;*/ margin-right: 55px;\">";
	$res3 = mysql_query("SELECT * FROM `com` where id_tipo = '$com_idtipo' and id_subtipo = '$com_idsubtipo' and id_post = '$com_rsql[id]' ORDER BY id asc LIMIT 0 , 30");
		while($escrever3=mysql_fetch_array($res3)){
			$i = $i + 1;
			if($escrever3['id_us'] != null){
			repost_us();
			}else{
			repost_ar();	
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
}

function post_ar(){
	$e = $e + 1;
	$csql_artista = mysql_query("select * from artista where id = '$com_rsql[id_ar]'");
	$rsql_artista = mysql_fetch_array($csql_artista);
	$datatempo = explode(" ", $com_rsql['data']);
	$dat = explode("-", $datatempo[0]);
	$like = mysql_query("select * from gt where id_post = '$com_rsql[id]' and gostei = '1'");
	$rlike = mysql_num_rows($like);
	$nlike = mysql_query("select * from gt where id_post = '$com_rsql[id]' and gostei = '0'");
	$rnlike = mysql_num_rows($nlike);

	if($user_logado_valor == 1){
	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
	<div style=\"right: 6px; position: absolute;\">
	<a href=\"#menu" . $com_rsql['id'] . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>
	</div>
	<div style=\"margin-right: 30px;\">
	<span class=\"textoinfo\">
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_ar'] . "','ar');\"><img src=\"fotos/min/" . $rsql_artista['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_ar'] . "','ar');\"><span class=\"nome\">" . $rsql_artista['nome'] . "</span></a>
	<a href=\"" . $pagina . "&p1=1&p2=" . $com_rsql['id'] . "&p3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a> <a href=\"#gostou" . $com_rsql['id'] . "\" name=\"abremenu\" class=\"classe1\">(" . $rlike . ")</a>
	<a href=\"" . $pagina . "&p1=1&p2=" . $com_rsql['id'] . "&p3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a> <a href=\"#ngostou" . $com_rsql['id'] . "\" name=\"abremenu\" class=\"classe1\">(" . $rnlike . ")</a>
	</span><br>
	<span class=\"texto\">" . $com_rsql['msg'] . "</span>

	";
	menu_ar();
	}else{
		echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
	<div style=\"margin-right: 30px;\">
	<span class=\"textoinfo\">
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_ar'] . "','ar');\"><img src=\"fotos/min/" . $rsql_artista['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
	<a href=\"#pfdialog\" class=\"linkus\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $com_rsql['id_ar'] . "','ar');\"><span class=\"nome\">" . $rsql_artista['nome'] . "</span></a>
	<img src=\"engine/imgs/like.png\"> (" . $rlike . ")
	<img src=\"engine/imgs/nlike.png\"> (" . $rnlike . ")
	</span><br>
	<span class=\"texto\">" . $com_rsql['msg'] . "</span>

	";
	}

	////////////////////////AREA DO REPOSTE//////////////////////
	$tabelagostar = "gt";
	$ar = 1;
	echo "</div></div><div style=\"position: relative; border: 0px solid #000000; left: 55px; /*width: 520px;*/ margin-right: 55px;\">";
	$res3 = mysql_query("SELECT * FROM `com` where id_tipo = '$com_idtipo' and id_subtipo = '$com_idsubtipo' and id_post = '$com_rsql[id]' ORDER BY id asc LIMIT 0 , 30");
		while($escrever3=mysql_fetch_array($res3)){
			$i = $i + 1;
			if($escrever3['id_us'] != null){
			repost_us();
			}else{
			repost_ar();
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
}

function menu_us(){

echo"
	<div id=\"boxes\">
	<div id=\"gostou" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#gostou" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>";
	while($rrlike = mysql_fetch_array($like)){
		if($rrlike['id_us'] != null){
		$csqlrlk = mysql_query("select * from user where id = '$rrlike[id_us]'");
		$rsqlrlk = mysql_fetch_array($csqlrlk);
		$datatempo5 = explode(" ", $rrlike['data']);
		$dat5 = explode("-", $datatempo5[0]);
		if($rrlike['id_us'] == $row['id']) { $msgapg = "<a href=\"" . $pagina . "&p1=2&p2=" . $rrlike['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>"; } else { $msgapg = $rrlike['id_us']; }
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"classe1\"><img src=\"fotos/min/" . $rsqlrlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"index.php?user&i1=1&i2=" . $rsqlrlk['id'] . "\" class=\"linkus\">" . $rsqlrlk['nome'] . " " . $rsqlrlk['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat5[2] . "/" . $dat5[1] . "/" . $dat5[0] . " " . $datatempo5[1] . " " . $msgapg . "
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
		<span class=textoinfo>" . $dat5[2] . "/" . $dat5[1] . "/" . $dat5[0] . " " . $datatempo5[1] . " " . $msgapg . "
		</div>
		";
		}
	}
	echo "
	</div>
  	</div>


  	<div id=\"boxes\">
	<div id=\"ngostou" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#ngostou" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
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
  	</div>
  		

  	<div id=\"boxes\">
	<div id=\"menu" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#menu" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($com_rsql['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $e . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $e . "')\">";
	}
	echo "
	</center>
	</span>
	<div id=\"palterar" . $e . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=4&p2=" . $com_rsql['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $com_rsql['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $e . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=3&p2=" . $com_rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>
	</div>
	</div>
	</div>
 	";
}

function menu_ar(){
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

}

function repost_us(){

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


  		remenu_us();
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

}

function repost_ar(){
if ($ar == 1){
	$linkdo1 = 15;
	$linkdo2 = 17;
	$linkdo3 = 13;
} else{
	$linkdo1 = 5;
	$linkdo2 = 7;
	$linkdo3 = 3;
}

$csqlar = mysql_query("select * from artista where id = '$escrever3[id_ar]';");
 		$rsqlar = mysql_fetch_array($csqlar);
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
		
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_ar'] . "','ar');\"><img src=\"fotos/min/" . $rsqlar['foto'] . "\" width=\"35\" height=\"35\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_ar'] . "','ar');\">" . $rsqlar['nome'] . "</a>";

		echo "
		<a href=\"" . $pagina . "&p1=1&p2=" . $escrever3['id'] . "&p3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a> <a href=\"#rgostou" . $i . "\" name=\"modal\" class=\"classe1\">(" . $rlike2 . ")</a>
		<a href=\"" . $pagina . "&p1=1&p2=" . $escrever3['id'] . "&p3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a> <a href=\"#rngostou" . $i . "\" name=\"modal\" class=\"classe1\">(" . $rnlike2 . ")</a>
		</span>";
		echo "<br><span class=\"texto\">" . $escrever3['msg'] . "</span></div>";


  		remenu_ar();
  	}else{
  		echo "<div style=\"min-height: 40px; position: static;\">
		<div style=\"margin-right: 30px;\">
		<span class=\"textoinfo\">
		
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_ar'] . "','ar');\"><img src=\"fotos/min/" . $rsqlar['foto'] . "\" width=\"35\" height=\"35\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_ar'] . "','ar');\">" . $rsqlar['nome'] . "</a>
		<img src=\"engine/imgs/like.png\"> (" . $rlike2 . ")
		<img src=\"engine/imgs/nlike.png\"> (" . $rnlike2 . ")
		</span>";
		echo "<br><span class=\"texto\">" . $escrever3['msg'] . "</span></div>";
  	}
}

function remenu_us(){
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
			<span class=textoinfo>" . $dat4[2] . "/" . $dat4[1] . "/" . $dat4[0] . " " . $datatempo4[1] . "  " . $msgapg . "
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
			<span class=textoinfo>" . $dat4[2] . "/" . $dat4[1] . "/" . $dat4[0] . " " . $datatempo4[1] . "  " . $msgapg . "
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
		if($escrever3['id_us'] == $id){
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
}

function remenu_ar(){	
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
}


/////////////////////////COMECO DA PAGINA////////////////

$user_logado_valor = user_logado();

if(user_logado()){
	cabeca();
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
			post_us($com_rsql['id_us']);
		}
		if($com_rsql['id_ar'] != null){
			post_ar();
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