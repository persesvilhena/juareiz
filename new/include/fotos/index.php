<?php
if (isset($_POST['alterar'])) {
$idimg = $_POST['idimg'];
$descricao = $_POST['descricao'];
$sec = mysql_query("select * from album where id = '$idimg'");
$rsec = mysql_fetch_array($sec);
if ($rsec['us'] == $id){
$alte = mysql_query("update album set descricao = '$descricao' where id = '$idimg'");
if($alte){ echo "<script>alert('Alteração realizada com sucesso!');window.location='index.php?album'</script>"; }
else{ echo "<script>alert('Houve um erro!');window.location='index.php?album'</script>"; }

}else{ echo "error"; }

}
$error = null;

if (isset($_POST['cadastrar'])) {
 
	// Recupera os dados dos campos
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
    	if( ! preg_match( '/^image\/(jpeg|png|gif|pjpeg|jpg)$/i' , $foto[ 'type' ] ) ){
     	   $error[1] = "<script>alert('Formato nao aceito!'); window.location='index.php?album'</script>";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "<script>alert('A largura da imagem não deve ultrapassar ".$largura." pixels!'); window.location='index.php?album'</script>";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "<script>alert('Altura da imagem não deve ultrapassar ".$altura." pixels!'); window.location='index.php?album'</script>";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "<script>alert('A imagem deve ter no máximo ".$tamanho." bytes!'); window.location='index.php?album'</script>";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(pjpeg|jpeg|png|gif|bmp|jpg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "album/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO album VALUES (null, '$descricao', '$id_gen', '$nome_imagem')");
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script>alert('imagem enviada com sucesso'); window.location='index.php?album'</script>";
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

echo "
<span class=\"titulo\">Suas Fotos:</span>
<div align=\"left\">
<hr size=\"1\" color=\"#cccccc\">
";
$res = mysql_query("SELECT * FROM `album` where us = '$id_gen' order by id desc;");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"item\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=index.php?album&i1=2&i2=" . $escrever['id'] . "><img src=album/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
<center style=\"margin-top: 2px;\"><span class=\"texto\">
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','ft_edit');\">Editar</a> - 
<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','ft_del');\">Excluir</a>
</span></center>
 ";
 echo "</div>";
}

echo "</div><div style=\"clear: both;\"></div><br><div align=\"right\"><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"CarregaDadosJanela('0','ft_novo');\">Nova Foto</a></div>";

}














if($i1 == 2){
$qfoto = mysql_query("select * from album where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
if ($rfoto['us'] == $id){ echo "<a href=\"index.php?album\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }else
{ echo "<a href=\"index.php?user&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }

echo "<center><img src=\"album/" . $rfoto['nome'] . "\" style=\"max-width: 798px; max-height: 1500px;\"></center><hr size=\"1\" color=\"#cccccc\">";
echo "<span class=\"titulo\">Descricao: </span><span class=\"texto\">" . $rfoto['descricao'] . "<br>";
echo "<br> ";
	$com_idtipo = "10";
	$com_idsubtipo = $i2;
	include("engine/com/index.php");
}










if($i1 == 3){
$qfoto = mysql_query("select * from album where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
if ($rfoto['us'] == $id){ 
?>
<form action="" method="post">
<input type="hidden" name="idimg" value="<?php echo $rfoto['id']; ?>">
<textarea id="cordoinput" type="text" name="descricao" rows="10" cols="50"><?php echo $rfoto['descricao']; ?></textarea>
<input id="cordoinput" type="submit" name="alterar" value="Alterar" />
</form>
<?php 
}
else { echo "error"; }

}












if($i1 == 4){
$qfoto = mysql_query("select * from album where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
if ($rfoto['us'] == $id){ 
unlink("album/".$rfoto['nome']."");
$exc = mysql_query("delete from album where id = '$i2'");
if($exc){ echo "<script>alert('Exclusao realizada com sucesso!');window.location='index.php?album'</script>"; }
else{ echo "<script>alert('Houve um erro!');window.location='index.php?album'</script>"; }
}
else { echo "error"; }

}

?>