<?php
$cont = 0;
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
	$csql = mysql_query("SELECT * FROM disc WHERE id_ar = '$i2';");
	while($rsql = mysql_fetch_array($csql)){
		if($rsql['capa'] == null){ $capa = "semcapa.jpg"; }else{ $capa = $rsql['capa']; }
		echo "
		<div id=\"item\" style=\"position: relative; width: 200px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<img src=\"uploads/imgs/" . $capa . "\" width=\"200\"><br>
		<span class=\"titulo\"><center><a href=index.php?discografia&i1=5&i2=" . $rsql['id'] . " class=classe1>" . $rsql['nome'] . "</a><br></span>
		<span class=\"texto\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ardisc_edit');\">Editar</a> - 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ardisc_del');\">Excluir</a>
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
		echo "<center><span class=\"titulo\">A lista de albums est� vazia</span></center>";
	}
	echo "<br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"CarregaDadosJanela('" . $i2 . "','ardisc_novo');\">Novo album</a></div>";
	}
}













if($i1 == 2){
	$csql = mysql_query("select * from disc where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		if(isset($_POST["alterar"])) {
			if (empty($_FILES['arquivo']['name'])){
				if(!empty($_POST["nome"])) {
					$nome = $class->antisql($_POST["nome"]);
					$data = $class->antisql($_POST["data"]);
					$duracao = $class->antisql($_POST["duracao"]);
					$descricao = $class->antisql($_POST["descricao"]);

					$altera = mysql_query("update disc set nome = '$nome', data = '$data', duracao = '$duracao', descricao = '$descricao' where id = '$i2';");
					if($altera){ 
						echo "<script>alert('Album Alterado com sucesso!');window.location='index.php?discografia&i1=1&i2=" . $rsql['id_ar'] . "';</script>";  
					}else{
						echo "<script>alert('Houve um problema!');window.location='index.php?discografia&i1=1&i2=" . $rsql['id_ar'] . "';</script>";
					}
				}else{
					echo "<script>alert('Houve um problema!');window.location='index.php?discografia&i2=" . $rsql['id_ar'] . "';</script>";
				}
			}else{
				if(isset($_POST["alterar"])) {
					if(!empty($_POST["nome"])) {
						unlink("uploads/imgs/".$rsql['capa']."");
						$nome = $class->antisql($_POST["nome"]);
						$data = $class->antisql($_POST["data"]);
						$duracao = $class->antisql($_POST["duracao"]);
						$descricao = $class->antisql($_POST["descricao"]);

						$_UP['pasta'] = 'uploads/imgs/';
						$_UP['tamanho'] = 1024 * 1024 * 100;
						$_UP['extensoes'] = array('jpg', 'bmp', 'png');
						$_UP['renomeia'] = false;
						$_UP['erros'][0] = 'N�o houve erro';
						$_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
						$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
						$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
						$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

						// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
						if ($_FILES['arquivo']['error'] != 0) {
							die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
							exit; // Para a execu��o do script
						}

						// Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar

						// Faz a verifica��o da extens�o do arquivo
						$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) {
							echo "Por favor, envie arquivos com as seguintes extens�es: jpg, png ou gif";
						}

						// Faz a verifica��o do tamanho do arquivo
						else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
							echo "O arquivo enviado � muito grande, envie arquivos de at� 100Mb.";
						}

						// O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
						else {
						    $nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

							if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
								$insert = mysql_query("update disc set nome = '$nome', data = '$data', duracao = '$duracao', descricao = '$descricao', capa = '$nome_final' where id = '$i2';");
								if($insert){
									// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
									echo "<script>alert('Album Alterado com sucesso!');window.location='index.php?discografia&i2=" . $rsql['id_ar'] . "'</script>";
									//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
								}
							} else {
								// N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
								echo "N�o foi poss�vel enviar o arquivo, tente novamente";
							}
						}
					}else{
						echo "<script>alert('Houve um problema!');window.location='index.php?discografia&i2=" . $rsql['id_ar'] . "';</script>";
					}
				}
			}
		}
	}
}








if($i1 == 3){
	$csql = mysql_query("select * from disc where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$altera = mysql_query("delete from disc where id = '$i2';");
		if ($rsql['capa'] != null){
		unlink("uploads/imgs/".$rsql['capa']."");
		}
		if ($altera){ 
			echo "<script>alert('Album apagado com sucesso!');window.location='index.php?discografia&i2=" . $rsql['id_ar'] . "';</script>"; 
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?discografia&i2=" . $rsql['id_ar'] . "';</script>";
		}
	}
}









if($i1 == 4){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){

if (isset($_POST['envia'])) {
if (empty($_FILES['arquivo']['name'])){
$nome = $class->antisql($_POST["nome"]);
$data = $class->antisql($_POST["data"]);
$duracao = $class->antisql($_POST["duracao"]);
$descricao = $class->antisql($_POST["descricao"]);
$insert = mysql_query("insert into disc (id_ar, nome, data, duracao, descricao) values ('$i2', '$nome', '$data', '$duracao', '$descricao');");
if($insert){ echo "<script>alert('Album Inserido com sucesso!');window.location='index.php?discografia&i1=1&i2=" . $i2 . "';</script>";  }else{
	echo "<script>alert('Houve um problema!');window.location='index.php?discografia&i1=1&i2=" . $i2 . "';</script>";
}

}else{

$nome = $class->antisql($_POST["nome"]);
$data = $class->antisql($_POST["data"]);
$duracao = $class->antisql($_POST["duracao"]);
$descricao = $class->antisql($_POST["descricao"]);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/imgs/';

// Tamanho m�ximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 100; // 2Mb

// Array com as extens�es permitidas
$_UP['extensoes'] = array('jpg', 'bmp', 'png');

// Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'N�o houve erro';
$_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execu��o do script
}

// Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar

// Faz a verifica��o da extens�o do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extens�es: jpg, png ou gif";
}

// Faz a verifica��o do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado � muito grande, envie arquivos de at� 2Mb.";
}

// O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
else {
		//preg_match("/\.(mp4|flv){1}$/i", $_FILES["name"], $ext);
 
        	// Gera um nome �nico para a imagem
        	$nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

// Depois verifica se � poss�vel mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
$insert = mysql_query("insert into disc (id_ar, nome, data, duracao, descricao, capa) values ('$i2', '$nome', '$data', '$duracao', '$descricao', '$nome_final');");
if($insert){
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<script>alert('Album Inserido com sucesso!');window.location='index.php?discografia&i2=" . $i2 . "'</script>";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
}
} else {
// N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
echo "N�o foi poss�vel enviar o arquivo, tente novamente";
}

}
}

}
}
}





if($i1 == 5){
	$csql = mysql_query("select * from disc where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$editmus = "<a href=\"index.php?discmusicas&i1=1&i2=" . $i2 . "\" class=\"classe1\"><span class=\"texto\">Editar Musicas</span></a><br>";
	}else{
		$editmus = "";
	}
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	<center>
	<img src=\"uploads/imgs/" . $rsql['capa'] . "\" width=\"796\">
	</center>
	<span class=\"texto\">
	<b>Nome do album: </b> " . $rsql['nome'] . "<br>
	<b>Data de lan�amento: </b> " . $rsql['data'] . "<br>
	<b>Dura��o do album: </b> " . $rsql['duracao'] . "<br>
	<b>Descri��o: </b> " . $rsql['descricao'] . "
	</span><br>" . $editmus . "

	";
	$cmus = mysql_query("select * from disc_musicas where id_album = '$i2';");
	while($rmus = mysql_fetch_array($cmus)){
		echo "<a href=\"index.php?discmusicas&i1=5&i2=" . $rmus['id'] . "\" class=\"classe1\"><span class=\"texto\">" . $rmus['numero'] . ". " . $rmus['nome'] . "</span></a><br>";
	}
	$com_idtipo = "8";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}
?>