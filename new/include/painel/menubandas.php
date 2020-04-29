<?php include "../../engine/conexao.php"; ?>
<?php include "../../engine/protege.php"; ?>
<script type="text/javascript" src="../../engine/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="../../engine/css/style.css">
<?php
if(isset($_GET['z1'])){$z1 = $class->antisql($_GET['z1']);} else {$z1 = null;}
if(isset($_GET['z2'])){$z2 = $class->antisql($_GET['z2']);} else {$z2 = null;}
if($z1 == 1){
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$z2'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$upart = mysql_query("update user set idart = '$z2' where id = '$id'");
		if($upart){
			echo "<script>window.location='menubandas.php';</script>";
		}else{
			echo "<script>alert('Error!');window.location='menubandas.php';</script>";
		}
	}
}
if($z1 == 2){
	$upart = mysql_query("update user set idart = null where id = '$id'");
	if($upart){
		echo "<script>window.location='menubandas.php';</script>";
	}else{
		echo "<script>alert('Error!');window.location='menubandas.php';</script>";
	}
}

?>
<body style="background-color:#dcdcdc; text-align: left;">
<a href="../../index.php?artista" class="menu" target="_top"><img src="../../engine/imgs/globo.png" align="left">Home</a><br>
		<?php
		$res = mysql_query("SELECT * FROM membros where id_us = '$id'");
		while($escrever=mysql_fetch_array($res)){
			if($escrever['adm'] == 1){
				$cbanda = mysql_query("SELECT * FROM artista WHERE id = '$escrever[id_ar]'");
				$rbanda = mysql_fetch_array($cbanda);
				if($escrever['id_ar'] == $row['idart']){
					$seta = "direita2";
				}else{
					$seta = "direita";
				}
 				echo "
 				<div style=\"margin-left: 9px;\">";
 				if($escrever['id_ar'] == $row['idart']){
 					echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?z1=2\" class=\"menuclasse4\" target=\"_self\">";
 				}else{
 					echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?z1=1&z2=" . $escrever['id_ar'] . "\" class=\"menuclasse4\" target=\"_self\">";
 				}
 				echo"
 				<img src=\"../../engine/imgs/$seta.png\" align=\"left\" style=\"margin-top: 4px;\">
 				</a>
 				<a href=\"../../index.php?verart&i1=1&i2=" . $escrever['id_ar'] . "\" class=\"menu1\" target=\"_top\" id=\"menulinkbanda\" name=\"" . $escrever['id_ar'] . "\">
 				" . $rbanda['nome'] . "
 				</a>
 				</div>
 				
 				";
			}else{
 				$cbanda = mysql_query("SELECT * FROM artista WHERE id = '$escrever[id_ar]'");
				$rbanda = mysql_fetch_array($cbanda);
				if($escrever['id_ar'] == $row['idart']){
					$seta = "direita2";
				}else{
					$seta = "direita";
				}
 				echo "<a href=\"../../index.php?verart&i1=1&i2=" . $escrever['id_ar'] . "\" class=\"menu\" target=\"_top\" id=\"menulinkbanda\" name=\"" . $escrever['id_ar'] . "\">
 				<img src=\"../../engine/imgs/$seta.png\" align=\"left\">" . $rbanda['nome'] . "
 				</a>
 				";
 			}
		}
		?>