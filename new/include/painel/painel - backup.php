<?php
if($z1 == 1){
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$z2'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$upart = mysql_query("update user set idart = '$z2' where id = '$id'");
		if($upart){
			echo "<script>window.location='" . $eurl . "';</script>";
		}else{
			echo "<script>alert('Error!');window.location='" . $u . "';</script>";
		}
	}
}
if($z1 == 2){
	$upart = mysql_query("update user set idart = null where id = '$id'");
	if($upart){
		echo "<script>window.location='" . $eurl . "';</script>";
	}else{
		echo "<script>alert('Error!');window.location='" . $u . "';</script>";
	}
}

?>
<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<img width="194" src="fotos/<?php echo "$row[foto]"; ?>" class="pr1"><br>
		<a href="index.php?perfil" class="classe1" target="_top"><?php echo $row["nome"]; ?> <?php echo $row["sobrenome"]; ?></a> - <a href="sair.php" class="classe1" target="_top">Sair</a><br>
		<hr size="1" width="182" color="#cccccc">
		<span class="titulo"><center>Menu Principal</center></span> <?php echo $urldapag; ?>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?index" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
		<a href="index.php?indexband" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home Bandas</a><br>
		<a href="index.php?perfil" class="menu" target="_top"><img src="engine/imgs/user.png" align="left">Perfil</a><br>
		<a href="index.php?musicas" class="menu" target="_top"><img src="engine/imgs/pasta.png" align="left">Musicas</a><br>
		<a href="index.php?videos" class="menu" target="_top"><img src="engine/imgs/pasta.png" align="left">Videos</a><br>
		<a href="index.php?msg&i1=1" class="menu" target="_top"><img src="engine/imgs/mail.png" align="left">Mensagens
		<?php
		$cmensagem = mysql_query("select * from msg where (deid = '$id' or paraid='$id') and nw = '1' and nwus <> '$id'");
		$cont = 0;
		while($rmensagem = mysql_fetch_array($cmensagem)){
			$cont = $cont + 1;
		}
		if ($cont != 0){
			echo "<font color=\"#ff0000\">(" . $cont . ")</font>";
		}
		?></a><br>
		<a href="index.php?contatos" class="menu" target="_top"><img src="engine/imgs/contatos.png" align="left">Contatos</a>
		<a href="index.php?album" class="menu" target="_top"><img src="engine/imgs/grademenor.png" align="left">Fotos</a><br>
		<a href="index.php?allusers" class="menu" target="_top"><img src="engine/imgs/grade.png" align="left">Todos os usuarios</a><br>
		<a href="index.php?rank" class="menu" target="_top"><img src="engine/imgs/estatisticas.png" align="left">Rank</a><br>
		<a href="index.php?config" class="menu" target="_top"><img src="engine/imgs/config.png" align="left">Configurações</a><br>
		<hr size="1" width="182" color="#cccccc"><div align="center"><span class="subtitulo">Show Me V 1.4 Copyright 2014</span></div>
	</div>
</div>

<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify; padding-bottom: 5px;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<span class="titulo"><center>Menu Bandas</center></span>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?artista" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
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
 					echo "<form action=\"" . $urldapag . "&z1=2\" method=\"post\">
 					<input type=\"hidden\" name=\"eurl\" value=\"" . $urldapag . "\">
 					<button type=\"submit\" class=\"menuclasse4\"><img src=\"engine/imgs/$seta.png\" align=\"left\" style=\"margin-top: 4px;\"></button>
 					</form>";
 					//echo "<a href=\"" . $urldapag . "&z1=2&u=" . $urldapag . "\" class=\"menuclasse4\">";
 				}else{
 					echo "<a href=\"" . $urldapag . "&z1=1&z2=" . $escrever['id_ar'] . "\" class=\"menuclasse4\">";
 				}
 				echo"
 				<img src=\"engine/imgs/$seta.png\" align=\"left\" style=\"margin-top: 4px;\">
 				</a>
 				<a href=\"index.php?verart&i1=1&i2=" . $escrever['id_ar'] . "&u=" . $urldapag . "\" class=\"menu1\" target=\"_top\" id=\"menulinkbanda\" name=\"" . $escrever['id_ar'] . "\">
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
 				echo "<a href=\"index.php?verart&i1=1&i2=" . $escrever['id_ar'] . "\" class=\"menu\" target=\"_top\" id=\"menulinkbanda\" name=\"" . $escrever['id_ar'] . "\">
 				<img src=\"engine/imgs/$seta.png\" align=\"left\">" . $rbanda['nome'] . "
 				</a>
 				";
 			}
		}
		?>
	</div>
</div>

<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify; padding-bottom: 5px;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<span class="titulo"><center>Menu Links</center></span>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?links" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
		<?php
		$res2 = mysql_query("SELECT * FROM links where id_us = '$id'");
 		while($escrever2=mysql_fetch_array($res2)){
 			echo "<a href=\"http://" . $escrever2['link'] . "\" class=\"menu\" target=\"_blank\"><img src=\"engine/imgs/direita.png\" align=\"left\">" . $escrever2['nome'] . "</a>";
		}
		?>
	</div>
</div>

<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify;" align="left">
	Propaganda<br><br>teste<br><br><br><br>teste
</div>