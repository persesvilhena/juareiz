<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<img width="196" src="fotos/<?php echo "$row[foto]"; ?>"><br>
		<a href="index.php?perfil" class="classe1" target="_top"><?php echo $row["nome"]; ?> <?php echo $row["sobrenome"]; ?></a> - <a href="sair.php" class="classe1" target="_top">Sair</a><br>
		<hr size="1" width="182" color="#cccccc">
		<span class="titulo"><center>Menu Principal</center></span>
		<br> <?php //echo $date; ?>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?index" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
		<a href="index.php?perfil" class="menu" target="_top"><img src="engine/imgs/user.png" align="left">Perfil</a><br>
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
		<a href="index.php?contatos" class="menu" target="_top"><img src="engine/imgs/contatos.png" align="left">Contatos</a><br>
		<a href="index.php?album" class="menu" target="_top"><img src="engine/imgs/grademenor.png" align="left">Fotos</a><br>
		<a href="index.php?allusers" class="menu" target="_top"><img src="engine/imgs/grade.png" align="left">Todos os usuarios</a><br>
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
 			$cbanda = mysql_query("SELECT * FROM artista WHERE id = '$escrever[id_ar]'");
			$rbanda = mysql_fetch_array($cbanda);
 			echo "<a href=\"index.php?verart&i1=1&i2=" . $escrever['id_ar'] . "\" class=\"menu\" target=\"_top\"><img src=\"engine/imgs/direita.png\" align=\"left\">" . $rbanda['nome'] . "</a>";
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