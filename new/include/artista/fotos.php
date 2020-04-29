<?php
$csql = mysql_query("select * from artista where id = '$i2'");
$rsql = mysql_fetch_array($csql);
$csql2 = mysql_query("select * from membros where id_ar = '$rsql[id]' and id_us = '$id'");
$rsql2 = mysql_fetch_array($csql2);
$csql3 = mysql_query("select * from user where id = '$rsql2[id_us]'");
$rsql3 = mysql_fetch_array($csql3);






if (isset($_POST['alterar'])) {
	$idimg = $_POST['idimg'];
	$descricao = $_POST['descricao'];
	$sec = mysql_query("select * from album_ar where id = '$idimg'");
	$rsec = mysql_fetch_array($sec);
	$sec2 = mysql_query("select * from membros where id_ar = '$rsec[us]' and id_us = '$id';");
	$rsec2 = mysql_fetch_array($sec2);
	if ($rsec2['adm'] == 1){
		$alte = mysql_query("update album_ar set descricao = '$descricao' where id = '$idimg'");
		if($alte){ 
			echo "<script>alert('Alteração realizada com sucesso!');window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>"; 
		}else{
			echo "<script>alert('Houve um erro!');window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>"; 
		}

	}else{ 
		echo "error"; 
	}

}




$error = null;




if (isset($_POST['cadastrar'])) {
 
	$us = $_POST['us'];
	$descricao = $_POST['descricao'];
	$foto = $_FILES["foto"];
 
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 500000;
		// Altura máxima em pixels
		$altura = 500000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 100000000;
 
    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$", $foto["type"])){
     	   $error[1] = "<script>alert('Isso não é uma imagem!'); window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "<script>alert('A largura da imagem não deve ultrapassar ".$largura." pixels!'); window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "<script>alert('Altura da imagem não deve ultrapassar ".$altura." pixels!'); window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "<script>alert('A imagem deve ter no máximo ".$tamanho." bytes!'); window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(pjpeg|jpeg|png|gif|bmp|jpg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "albumar/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO album_ar VALUES (null, '$descricao', '$us', '$nome_imagem')");
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script>alert('imagem enviada com sucesso'); window.location='index.php?artalbum&i1=1&i2=" . $i2 . "'</script>";
			}
		}
 
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro;
			}
		}
	}
}




if($i1 == null){$i1 = 1;}
if($i1 == 1){
	if ($rsql2['adm'] == 1){

		echo "
		<span class=\"titulo\">Fotos do artista " . $rsql['nome'] . "</span>
		<div align=\"left\">
		<hr size=\"1\" color=\"#cccccc\">
		";
		$res = mysql_query("SELECT * FROM `album_ar` where us='$i2';");
		while($escrever=mysql_fetch_array($res)){
			echo "<div id=\"item\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
			echo "<a href=index.php?artalbum&i1=2&i2=" . $i2 . "&i3=" . $escrever['id'] . "><img src=albumar/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
			<center style=\"margin-top: 2px;\"><span class=\"texto\">
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','arft_edit');\">Editar</a> - 
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','arft_del');\">Excluir</a>
			</span></center>
			</div>";
		}
		echo "</div><div style=\"clear: both;\"></div><br><div align=\"right\"><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"CarregaDadosJanela('" . $i2 . "','arft_novo');\">Nova Foto</a></div>";
	}
}






if($i1 == 2){
	$qfoto = mysql_query("select * from album_ar where id = '$i3';");
	$rfoto = mysql_fetch_array($qfoto);
	if ($rsql2['adm'] == 1){ 
		echo "<a href=\"index.php?artalbum&i1=1&i2=" . $i2 . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; 
	}else{ 
		echo "<a href=\"index.php?verart&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; 
	}

	echo "
	<center>
		<img src=\"albumar/" . $rfoto['nome'] . "\" style=\"max-width: 798px; max-height: 1500px;\">
	</center>
	<hr size=\"1\" color=\"#cccccc\">
	<span class=\"titulo\">Descricao: </span>
	<span class=\"texto\">" . $rfoto['descricao'] . "<br><br> ";
	$com_idtipo = "11";
	$com_idsubtipo = $i3;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}






if($i1 == 3){
	$qfoto = mysql_query("select * from album_ar where id = '$i2';");
	$rfoto = mysql_fetch_array($qfoto);

	echo"
	<form action=\"index.php?artalbum&i2=" . $rfoto['us'] . "\" method=\"post\">
		<input type=\"hidden\" name=\"idimg\" value=\"" . $rfoto['id'] . "\">
		<textarea type=\"text\" name=\"descricao\" rows=\"10\" cols=\"50\">" . $rfoto['descricao'] . "</textarea>
		<input type=\"submit\" name=\"alterar\" value=\"Alterar\">
	</form>
	";
}





if($i1 == 4){
	$qfoto = mysql_query("select * from album_ar where id = '$i2';");
	$rfoto = mysql_fetch_array($qfoto);
	$sec = mysql_query("select * from membros where id_ar = '$rfoto[us]' and id_us = '$id';");
	$rsec = mysql_fetch_array($sec);
	if ($rsec['adm'] == 1){

		unlink("albumar/".$rfoto['nome']."");

		$exc = mysql_query("delete from album_ar where id = '$i2'");
		if($exc){ 
			echo "<script>alert('Exclusao realizada com sucesso!');window.location='index.php?artalbum&i1=1&i2=" . $rfoto['us'] . "'</script>"; 
		}else{ 
			echo "<script>alert('Houve um erro!');window.location='index.php?artalbum&i1=1&i2=" . $rfoto['us'] . "'</script>"; 
		}
	}

}


?>