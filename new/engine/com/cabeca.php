<?php
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
?>