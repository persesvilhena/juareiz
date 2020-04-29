<body>
<?php

if(isset($_POST["post"])) { 
	
	if(!empty($_POST["msg"])) { 
		$msg = $class->antisql($_POST["msg"]);
		if(isset($_GET['foto'])){$foto = $class->antisql($_GET['foto']);} else {$foto = null;}
		if(isset($_GET['arquivo'])){$arquivo = $class->antisql($_GET['arquivo']);} else {$arquivo = null;}

		
			
			$insert = mysql_query("insert into post (id_us, msg, foto, arquivo, data) values ('$row[id]', '$msg', '$foto', '$arquivo', '$date');") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Postagem feita com sucesso!</b>";
			}
		
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
if($i1 == 2){
	//id_post = i2 //////// gostei i3
	$csql = mysql_query("select * from gostar where id_us = '$id' and id_post = '$i2';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar set gostei = '$i3', data = '$date' where id_post = '$i2' and id_us = '$id'");
		if($insert){ echo "<script>window.location='index.php?index';</script>"; }else{ echo "<script>alert('error');window.location='index.php?index';</script>"; }
	} else {
		$insert = mysql_query("insert into gostar (id_post, id_us, gostei, data) values('$i2', '$id', '$i3', '$date')");
		if($insert){ echo "<script>window.location='index.php?index';</script>"; }else{ echo "<script>alert('error');window.location='index.php?index';</script>"; }
	}
}
if($i1 == 3){
	//id_post = i2 //////// gostei i3
	$csql = mysql_query("select * from gostar where id_us = '$id' and id_repost = '$i2';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar set gostei = '$i3', data = '$date' where id_repost = '$i2' and id_us = '$id'");
		if($insert){ echo "<script>window.location='index.php?index';</script>"; }else{ echo "<script>alert('error');window.location='index.php?index';</script>"; }
	} else {
		$insert = mysql_query("insert into gostar (id_repost, id_us, gostei, data) values('$i2', '$id', '$i3', '$date')");
		if($insert){ echo "<script>window.location='index.php?index';</script>"; }else{ echo "<script>alert('error');window.location='index.php?index';</script>"; }
	}
}
if($i1 == 4){
	$sql2 = mysql_query("SELECT * FROM post WHERE id = '$i2' and id_us = '$id';");
	$res2 = mysql_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysql_query("DELETE FROM post WHERE id='$i2' and id_us = '$id'");
		$csql4 = mysql_query("DELETE FROM repost WHERE id_post = '$res2[id]'");
		if($csql4) {
			$msg_erro = "Postagem apagada com sucesso!";
		}
		else {
			$msg_erro = "Houve um erro! relate o erro!";
		}
		echo "<div id=cont>" . $msg_erro . "</div>";
	}
}
if($i1 == 5){
	$sql2 = mysql_query("SELECT * FROM repost WHERE id = '$i2' and id_us = '$id';");
	$res2 = mysql_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysql_query("DELETE FROM repost WHERE id='$i2' and id_us = '$id'");
		if($csql4) {
			$msg_erro = "Postagem apagada com sucesso!";
		}
		else {
			$msg_erro = "Houve um erro! relate o erro!";
		}
		echo "<div id=cont>" . $msg_erro . "</div>";
	}
}
if($i1 == 6){
	$sql2 = mysql_query("SELECT * FROM post WHERE id = '$i2' and id_us = '$id';");
	$res2 = mysql_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["alterapost"])) {
			if(!empty($_POST["msg"])) {
				$msg = $class->antisql($_POST["msg"]);
				$csql4 = mysql_query("update post set msg = '$msg' WHERE id='$i2' and id_us = '$id'");
				if($csql4) {
					echo "<script>alert('Postagem alterada com sucesso!');window.location='index.php?index';</script>";
				}
				else {
					echo "<script>alert('Houve um erro! relate o erro!');window.location='index.php?index';</script>";
				}
			}
		}
	}
}
if($i1 == 7){
	$sql2 = mysql_query("SELECT * FROM repost WHERE id = '$i2' and id_us = '$id';");
	$res2 = mysql_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["alterarepost"])) {
			if(!empty($_POST["msg"])) {
				$msg = $class->antisql($_POST["msg"]);
				$csql4 = mysql_query("update repost set msg = '$msg' WHERE id='$i2' and id_us = '$id'");
				if($csql4) {
					echo "<script>alert('Postagem alterada com sucesso!');window.location='index.php?index';</script>";
				}
				else {
					echo "<script>alert('Houve um erro! relate o erro!');window.location='index.php?index';</script>";
				}
			}
		}
	}
}

if(isset($_POST["repost"])) {
	if(!empty($_POST["idpost"]) && !empty($_POST["msg"])) {
		$id_post = $class->antisql($_POST["idpost"]);
		$msg = $class->antisql($_POST["msg"]);
		$insert = mysql_query("insert into repost (id_post, id_us, msg, data) values('$id_post', '$id', '$msg', '$date')");
		if($insert){ 
			echo "<script>window.location='index.php?index'</script>"; 
		} else {
			echo "<script>alert('Houve um problema!');window.location='index.php?index'</script>";
		}
	}else { echo "<script>alert('Houve um problema!');window.location='index.php?index'</script>"; }
}
$res2 = mysql_query("SELECT * FROM `contato` where deid = '$id'");
$contatos = 0;
while($escrever2=mysql_fetch_array($res2)){
	// echo "<br>" . $escrever2['cotid'] . "<br>";
	$contatos = $contatos . "," . $escrever2['cotid'];
}
// echo $contatos;
echo "<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">";
echo "<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\"><span class=\"texto\">
<form method=\"post\" action=\"\">
<textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"50\"></textarea>
<input id=\"cordoinput\" type=\"submit\" name=\"post\" value=\"Postar\">
</form>
</span></div>";
$res1 = mysql_query("SELECT * FROM `post` where id_us in ($contatos) ORDER BY id DESC LIMIT 0 , 30");
while($escrever1=mysql_fetch_array($res1)){
	$res = mysql_query("select * from user where id = '$escrever1[id_us]'");
	$escrever=mysql_fetch_array($res);
	$datatempo = explode(" ", $escrever1['data']);
	$dat = explode("-", $datatempo[0]);
	$like = mysql_query("select * from gostar where id_post = '$escrever1[id]' and gostei = '1'");
	$rlike = mysql_num_rows($like);
	$nlike = mysql_query("select * from gostar where id_post = '$escrever1[id]' and gostei = '0'");
	$rnlike = mysql_num_rows($nlike);
	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\"><span class=\"texto\">
	<a href=\"index.php?user&i1=1&i2=" . $escrever1['id_us'] . "\" class=\"classe1\"><img src=\"fotos/" . $escrever['foto'] . "\" width=\"50\" height=\"50\" align=\"left\"></a>
	<a href=\"index.php?user&i1=1&i2=" . $escrever1['id_us'] . "\" class=\"linkus\"><span class=\"nome\">" . $escrever['nome'] . " " . $escrever['sobrenome'] . "</span></a>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($escrever1['id_us'] == $id){
		echo "<a href=\"index.php?index&i1=4&i2=" . $escrever1['id'] . "\" class=\"classe1\" align=\"right\"><font color=\"#ff0000\">Apagar</font></a>
		 <a href=\"index.php?index&i1=6&i2=" . $escrever1['id'] . "\" class=\"classe1\" align=\"right\"><font color=\"#ff0000\">Alterar</font></a>";
	}
	echo "
	<a href=\"index.php?index&i1=2&i2=" . $escrever1['id'] . "&i3=1\" class=\"classe1\">Gostei</a> (" . $rlike . ")
	<a href=\"index.php?index&i1=2&i2=" . $escrever1['id'] . "&i3=0\" class=\"classe1\">Não Gostei</a> (" . $rnlike . ")
	</span>";
	if($i1 == 6 && $i2 == $escrever1['id']){
		echo "<form action=\"index.php?index&i1=6&i2=" . $escrever1['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever1['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	}else{
		echo "</span><br>
		<span class=\"texto\">" . $escrever1['msg'] . "</span>";
	}
	echo "</div><div style=\"position: relative; border: 0px solid #000000; left: 55px; width: 520px;\">";
	$res3 = mysql_query("SELECT * FROM `repost` where id_post = '$escrever1[id]' ORDER BY id asc LIMIT 0 , 30");
 	while($escrever3=mysql_fetch_array($res3)){
 		$csql = mysql_query("select * from user where id = '$escrever3[id_us]';");
 		$rsql = mysql_fetch_array($csql);
 		$datatempo2 = explode(" ", $escrever3['data']);
		$dat2 = explode("-", $datatempo2[0]);
		$like2 = mysql_query("select * from gostar where id_repost = '$escrever3[id]' and gostei = '1'");
		$rlike2 = mysql_num_rows($like2);
		$nlike2 = mysql_query("select * from gostar where id_repost = '$escrever3[id]' and gostei = '0'");
		$rnlike2 = mysql_num_rows($nlike2);
		echo "<div style=\"min-height: 40px\">";
		echo "<a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\"><img src=\"fotos/" . $rsql['foto'] . "\" width=\"35\" height=\"35\" align=\"left\"></a>
		<a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a>
		<span class=textoinfo>" . $dat2[2] . "/" . $dat2[1] . "/" . $dat2[0] . " " . $datatempo2[1] . " ";
		if($escrever3['id_us'] == $id){
			echo "<a href=\"index.php?index&i1=5&i2=" . $escrever3['id'] . "\" class=\"classe1\" align=\"right\"><font color=\"#ff0000\">Apagar</font></a> 
			<a href=\"index.php?index&i1=7&i2=" . $escrever3['id'] . "\" class=\"classe1\" align=\"right\"><font color=\"#ff6666\">Alterar</font></a>";
		}
		echo "
		<a href=\"index.php?index&i1=3&i2=" . $escrever3['id'] . "&i3=1\" class=\"classe1\">Gostei</a> (" . $rlike2 . ")
		<a href=\"index.php?index&i1=3&i2=" . $escrever3['id'] . "&i3=0\" class=\"classe1\">Não Gostei</a> (" . $rnlike2 . ")
		</span>";
			if($i1 == 7 && $i2 == $escrever3['id']){
				echo "<form action=\"index.php?index&i1=7&i2=" . $escrever3['id'] . "\" method=\"post\">
				<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever3['msg'] . "</textarea>
				<input id=\"cordoinput\" name=\"alterarepost\" type=\"submit\" value=\"Alterar\">
				</form></div>";
			}else{
				echo "<span class=\"texto\">" . $escrever3['msg'] . "</span></div>";
			}
	}
	echo "
	<form action=\"\" method=\"post\" name=\"coment\">
	<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
	<input type=\"hidden\" name=\"idpost\" value=\"" . $escrever1['id'] . "\">
	<input type=\"submit\" name=\"repost\" id=\"cordoinput\" value=\"Postar\">
	</form>
	";
	echo "</div></div>";
}


echo "</div>";



echo "<div id=\"conteudo3\" style=\" width: 198px; position: absolute; left: 594px; top: 0px;\">";
echo "
propaganda<br>


</div>"
?>