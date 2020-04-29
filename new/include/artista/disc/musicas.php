<?php
$cont = 0;
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = (select id_ar from disc where id = '$i2')");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
	$csql = mysql_query("SELECT * FROM disc_musicas WHERE id_album = '$i2';");
	while($rsql = mysql_fetch_array($csql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 200px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		"; if($rsql['musica'] != null){ echo "<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" />
		</object>
		</center>"; } echo "<br>
		<span class=\"titulo\"><center><a href=index.php?discmusicas&i1=5&i2=" . $rsql['id'] . " class=classe1>" . $rsql['nome'] . "</a><br></span>
		<span class=\"texto\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ardiscm_edit');\">Editar</a> - 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ardiscm_del');\">Excluir</a>
		</span>
		</center>
		</div>
		";
		$cont = $cont + 1;
		$mod = $cont % 3;
 		if ($mod == 0){ echo "<div style=\"clear: both;\"></div>"; }
	}
	echo "<div style=\"clear: both;\"></div>";
	if (mysql_num_rows($csql) == 0){
		echo "<center><span class=\"titulo\">A lista de musicas está vazia</span></center>";
	}
	echo "<br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"CarregaDadosJanela('" . $i2 . "','ardiscm_novo');\">Nova musica</a></div>";
	}
}













if($i1 == 2){
	$csql = mysql_query("select * from disc_musicas where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = (select id_ar from disc where id = '$rsql[id_album]')");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		if(isset($_POST["alterar"])) {
			if (empty($_FILES['arquivo']['name'])){
				if(!empty($_POST["nome"])) {
					$numero = $class->antisql($_POST["numero"]);
					$composicao = $class->antisql($_POST["composicao"]);
					$nome = $class->antisql($_POST["nome"]);
					$letras = $class->antisql($_POST["letras"]);
					$duracao = $class->antisql($_POST["duracao"]);
					$descricao = $class->antisql($_POST["descricao"]);

					$altera = mysql_query("update disc_musicas set nome = '$nome', numero = '$numero', composicao = '$composicao', letras = '$letras', duracao = '$duracao', descricao = '$descricao' where id = '$i2';");
					if($altera){ 
						echo "<script>alert('Musica Alterada com sucesso!');window.location='index.php?discmusicas&i1=1&i2=" . $rsql['id_album'] . "';</script>";  
					}else{
						echo "<script>alert('Houve um problema!');window.location='index.php?discmusicas&i1=1&i2=" . $rsql['id_album'] . "';</script>";
					}
				}else{
					echo "<script>alert('Houve um problema!');window.location='index.php?discmusicas&i2=" . $rsql['id_album'] . "';</script>";
				}
			}else{
				if(isset($_POST["alterar"])) {
					if(!empty($_POST["nome"])) {
						if($rsql['musica'] != null){
							unlink("uploads/musicas/".$rsql['musica']."");
						}
						$numero = $class->antisql($_POST["numero"]);
						$composicao = $class->antisql($_POST["composicao"]);
						$nome = $class->antisql($_POST["nome"]);
						$letras = $class->antisql($_POST["letras"]);
						$duracao = $class->antisql($_POST["duracao"]);
						$descricao = $class->antisql($_POST["descricao"]);

						$_UP['pasta'] = 'uploads/musicas/';
						$_UP['tamanho'] = 1024 * 1024 * 100;
						$_UP['extensoes'] = array('mp3');
						$_UP['renomeia'] = false;
						$_UP['erros'][0] = 'Não houve erro';
						$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
						$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
						$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
						$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

						// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
						if ($_FILES['arquivo']['error'] != 0) {
							die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
							exit; // Para a execução do script
						}

						// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

						// Faz a verificação da extensão do arquivo
						$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) {
							echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
						}

						// Faz a verificação do tamanho do arquivo
						else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
							echo "O arquivo enviado é muito grande, envie arquivos de até 100Mb.";
						}

						// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
						else {
						    $nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

							if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
								$insert = mysql_query("update disc_musicas set nome = '$nome', numero = '$numero', composicao = '$composicao', letras = '$letras', duracao = '$duracao', descricao = '$descricao', musica = '$nome_final' where id = '$i2';");
								if($insert){
									// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
									echo "<script>alert('Musica alterada com sucesso!');window.location='index.php?discmusicas&i2=" . $rsql['id_album'] . "'</script>";
									//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
								}
							} else {
								// Não foi possível fazer o upload, provavelmente a pasta está incorreta
								echo "Não foi possível enviar o arquivo, tente novamente";
							}
						}
					}else{
						echo "<script>alert('Houve um problema!');window.location='index.php?discmusicas&i2=" . $rsql['id_album'] . "';</script>";
					}
				}
			}
		}
	}
}








if($i1 == 3){
	$csql = mysql_query("select * from disc_musicas where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = (select id_ar from disc where id = '$rsql[id_album]')");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$altera = mysql_query("delete from disc_musicas where id = '$i2';");
		if ($rsql['musica'] != null){
		unlink("uploads/musicas/".$rsql['musica']."");
		}
		if ($altera){ 
			echo "<script>alert('Musica apagada com sucesso!');window.location='index.php?discmusicas&i2=" . $rsql['id_album'] . "';</script>"; 
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?discmusicasa&i2=" . $rsql['id_album'] . "';</script>";
		}
	}
}









if($i1 == 4){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = (select id_ar from disc where id = '$i2')");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){

if (isset($_POST['envia'])) {
if (empty($_FILES['arquivo']['name'])){
$numero = $class->antisql($_POST["numero"]);
$composicao = $class->antisql($_POST["composicao"]);
$nome = $class->antisql($_POST["nome"]);
$letras = $class->antisql($_POST["letras"]);
$duracao = $class->antisql($_POST["duracao"]);
$descricao = $class->antisql($_POST["descricao"]);
$insert = mysql_query("insert into disc_musicas (id_album, nome, numero, composicao, letras, duracao, descricao) values ('$i2', '$nome', '$numero', '$composicao', '$letras', '$duracao', '$descricao');");
if($insert){ echo "<script>alert('Musica inserida com sucesso!');window.location='index.php?discmusicas&i1=1&i2=" . $i2 . "';</script>";  }else{
	echo "<script>alert('Houve um problema!');window.location='index.php?discmusicas&i1=1&i2=" . $i2 . "';</script>";
}

}else{
$numero = $class->antisql($_POST["numero"]);
$composicao = $class->antisql($_POST["composicao"]);
$nome = $class->antisql($_POST["nome"]);
$letras = $class->antisql($_POST["letras"]);
$duracao = $class->antisql($_POST["duracao"]);
$descricao = $class->antisql($_POST["descricao"]);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/musicas/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 100; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('mp3');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
		//preg_match("/\.(mp4|flv){1}$/i", $_FILES["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
$insert = mysql_query("insert into disc_musicas (id_album, nome, numero, composicao, letras, duracao, descricao, musica) values ('$i2', '$nome', '$numero', '$composicao', '$letras', '$duracao', '$descricao', '$nome_final');");
if($insert){
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<script>alert('Musica inserida com sucesso!');window.location='index.php?discmusicas&i2=" . $i2 . "'</script>";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
}
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}

}
}

}
}
}





if($i1 == 5){
	$csql = mysql_query("select * from disc_musicas where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	$qtddevotos = mysql_query("SELECT count(*) FROM `pt_musica` WHERE id_mus = '$i2'");
	$rqtddevotos = mysql_fetch_array($qtddevotos);
	$medianota = mysql_query("SELECT avg(nota) FROM `pt_musica` WHERE id_mus = '$i2'");
	$rmedianota = mysql_fetch_array($medianota);
	$nota = $rmedianota['avg(nota)'] * 10;
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	";
	if($rsql['musica'] != null){ echo "<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" />
		</object>
		</center>"; }
	echo "
	<span class=\"texto\">
	<b>Nome: </b> " . $rsql['nome'] . "<br>
	<b>Numero: </b> " . $rsql['numero'] . "<br>
	<b>Composicao: </b> " . $rsql['composicao'] . "<br>
	<b>Duração: </b> " . $rsql['duracao'] . "<br>
	<b>Letra: </b> " . $rsql['letras'] . "<br>
	<b>Descrição: </b> " . $rsql['descricao'] . "
	</span>
	<hr size=\"1\" color=\"#cccccc\"><span class=\"titulo\">Nota:</span><br>
	<div style=\"float: left; border-right: 1px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Vote:</span><br>
	<a href=\"index.php?discmusicas&i1=6&i2=" . $i2 . "&i3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a>
	<a href=\"index.php?discmusicas&i1=6&i2=" . $i2 . "&i3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a>
	</center></div>
	<div style=\"float: left; border-right: 1px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Quantidade de votos:</span><br>
	<span class=\"titulo\">" . $rqtddevotos['count(*)'] . "</span>
	</center></div>
	<div style=\"float: left; border-right: 0px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Nota:</span><br>
	<span class=\"titulo\">" . number_format($nota, 0) . "</span>
	</center></div>
	<div style=\"clear: both;\"></div>
	<hr size=\"1\" color=\"#cccccc\">
	";
	$com_idtipo = "9";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}


if($i1 == 6){
	$csql = mysql_query("select * from pt_musica where id_us = '$id' and id_mus = '$i2';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update pt_musica set nota = '$i3' where id_mus = '$i2' and id_us = '$id'");
		if($insert){ echo "<script>window.location='index.php?discmusicas&i1=5&i2=" . $i2 . "';</script>"; }else{ echo "<script>alert('error');window.location='index.php?discmusicas&i1=5&i2=" . $i2 . "';</script>"; }
	} else {
		$insert = mysql_query("insert into pt_musica (id_mus, id_us, nota) values('$i2', '$id', '$i3')");
		if($insert){ echo "<script>window.location='index.php?discmusicas&i1=5&i2=" . $i2 . "';</script>"; }else{ echo "<script>alert('error');window.location='index.php?discmusicas&i1=5&i2=" . $i2 . "';</script>"; }
	}

}
?>