<?php
$mensagem_erro = "";
if(isset($_POST["convite"])) { 
	$id_us = $class->antisql($_POST["id_us"]);
	$id_ar = $class->antisql($_POST["id_ar"]); 
	$msg = $class->antisql($_POST["msg"]); 
	$rp1 = mysql_query("SELECT * FROM membros WHERE id_us = '$id_us' and id_ar = '$id_ar';");
	if(mysql_num_rows($rp1) > 0){
		$mensagem_erro = "<b>Este usuario ja é da banda!</b>";
	}else{
	$rp = mysql_query("SELECT * FROM convite_membro WHERE id_us = '$id_us' and id_ar = '$id_ar';");
	if(mysql_num_rows($rp) > 0){
		$mensagem_erro = "<b>Ja existe um convite para este usuario!</b>";
	}else{
	if(!empty($_POST["id_us"]) && !empty($_POST["id_ar"]) && !empty($_POST["msg"])) { 
		$insert = mysql_query("insert into convite_membro (id_us, id_ar, msg) values('$id_us', '$id_ar', '$msg');") or die(mysql_error());
		if($insert) { 
			$mensagem_erro = "<b>Convite enviado com sucesso!</b>";
		}
	}
	else { 
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
	}		
}
}
}

$artista = mysql_query("SELECT * FROM artista WHERE id='$i2'");
$rartista = mysql_fetch_array($artista);
$adm = mysql_query("SELECT * FROM membros WHERE id_us='$id' and id_ar = '$i2'");
$radm = mysql_fetch_array($adm);

	if ($rartista['musicas'] == 1){ $mus = "Proprias"; }
	if ($rartista['musicas'] == 2){ $mus = "Covers"; }
	if ($rartista['musicas'] == 3){ $mus = "Mistas"; }
if ($radm['adm'] == 1){
if($i1 == null){$i1 = 1;}
if ($i1 == 1){


if (isset($_POST['cadastrar'])) {
$sql = mysql_query("SELECT foto FROM artista WHERE id = '$i2';");
$usuario = mysql_fetch_object($sql);
if($usuario->foto != "new/new.png"){
unlink("fotos/".$usuario->foto."");
unlink("fotos/min/".$usuario->foto."");
}
	$us = $_POST['us'];
	$foto = $_FILES["foto"];
	$error = array();
 

	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 5000;
		$larguramin = 500;
		// Altura máxima em pixels
		$altura = 2500;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 5000000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
		
		if($dimensoes[0] < $larguramin) {
			$error[5] = "A largura da imagem não deve ser menor de ".$larguramin." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysql_query("update artista set foto = '$nome_imagem' where id = '$i2';");

			require('engine/wide/WideImage.php');

			$image = WideImage::load($caminho_imagem);

			$image = $image->resize(60, 60);

			$image->saveToFile('fotos/min/' . $nome_imagem);
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script>alert('Imagem enviada com sucesso!');window.location='" . $pagina . "';</script>";
			}
		}
 
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo "<script>alert('" . $erro . "');window.location='" . $pagina . "';</script>";
			}
		}
	}
}
?>
<?php

?>
<div style="border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: 0px;">
<span class="titulo"><?php echo $rartista["nome"]; ?></span>
<hr size="1" color="#cccccc">
<img src="fotos/<?php echo $rartista["foto"]; ?>" align="left" width="150" height="150">
<span class="titulo">Foto de exibição:</span>
<form action="<?php $PHP_SELF; ?>" method="post" enctype="multipart/form-data" name="cadastro" >
<input type="hidden" name="us" value="<?php echo "$i2"; ?>">
<input id="cordoinput" type="file" name="foto" />
<input id="cordoinput" type="submit" name="cadastrar" value="Enviar" />
</form>
<div style="clear: both;"></div>


<?php
$estilo = mysql_query("SELECT * FROM est_musical WHERE id = '$rartista[est_musical]'");
$restilo = mysql_fetch_array($estilo);
?>
<span class="texto">
<hr size="1" color="#cccccc">
<span class="titulo">Informações da banda:</span><br>
<b>Nome</b>:&nbsp;<?php echo $rartista["nome"]; ?><br>
<b>Descricao</b>:&nbsp;<?php echo $rartista["descricao"]; ?><br>
<b>Estilo Musical</b>:&nbsp;<?php echo $restilo["nome"]; ?><br>
<b>Musicas</b>:&nbsp;<?php echo $mus; ?><br>
<b>Cidade</b>:&nbsp;<?php echo $rartista["cidade"]; ?><br>
<b>Estado</b>:&nbsp;<?php echo $rartista["estado"]; ?><br>


<div align="right"><a href="index.php?editart&i1=3&i2=<?php echo "$i2"; ?>" target="_top" class="classe1">Alterar Dados</a></div>


<hr size="1" color="#cccccc">
<span class="titulo">Membros:</span><br>

<?php
$memsql = mysql_query("SELECT * FROM membros where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 100");
 while($rmemsql=mysql_fetch_array($memsql)){
	$usersql = mysql_query("SELECT * FROM user WHERE id = '$rmemsql[id_us]'");
	$rusersql = mysql_fetch_array($usersql);
echo "<div id=\"item\" style=\"position: relative; width: 95px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
echo "<a href=index.php?user&i1=1&i2=" . $rusersql['id'] . "><img src=\"fotos/" . $rusersql['foto'] . "\" width=\"95\" height=\"95\"></a>
<br><span class=\"texto10\">
<center><a href=index.php?user&i1=1&i2=" . $rusersql['id'] . " class=classe1>" . $rusersql['nome'] . " " . $rusersql['sobrenome'] . "</a><br>
"; 
$ct = 0;
$imsql = mysql_query("SELECT * FROM membro_instrumento where id_us = '$rmemsql[id_us]' and id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 100");
 while($rimsql=mysql_fetch_array($imsql)){
 	$instsql = mysql_query("SELECT * FROM instrumentos WHERE id = '$rimsql[id_ins]'");
	$rinstsql = mysql_fetch_array($instsql);
	$ct = $ct + 1;
	if($ct < 2){ echo $rinstsql['nome']; }else{ echo ", " . $rinstsql['nome']; }

}
echo "<br>
<a href=index.php?editmem&i1=1&i2=" . $rmemsql['id'] . " class=classe1>Editar</a>";
if ($rmemsql['adm'] == 1){ echo "<br>Administrador"; }
echo "
</center></span>
</div>";
}
echo "<div style=\"clear: both;\">
<hr size=\"1\" color=\"#cccccc\">
<form method=\"post\" action=\"\">
" . $mensagem_erro . "
<table>
<tr><td><span class=\"texto\">Enviar convite para id:</span></td><td><input type=\"text\" name=\"id_us\"></td></tr>
<tr><td><span class=\"texto\">Mensagem:</span></td><td><textarea type=\"text\" name=\"msg\" rows=\"10\" cols=\"50\"></textarea></td></tr>
<tr><td><input type=\"hidden\" name=\"id_ar\" value=\"" . $i2 . "\"></td><td><input type=\"submit\" name=\"convite\" value=\"Enviar\"></td></tr>
</table>
</form>
<hr size=\"1\" color=\"#cccccc\">

";
echo "
</div>




<div style=\"border: 0px solid #000000; min-height: 300px; width: 200px; position: absolute; left: 594px; top: 0px;\">
<a href=\"index.php?artalbum&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar Fotos</a>
<a href=\"index.php?armusicas&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar Musicas</a>
<a href=\"index.php?arvideos&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar Videos</a>
<a href=\"index.php?discografia&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar Discografia</a>
<a href=\"index.php?editeventos&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar Eventos</a>
<a href=\"index.php?editnoticias&i1=1&i2=" . $i2 . "\" class=\"menu2\">Editar noticias</a>
";
?>
</div>
<?php


}







if($i1 == 2){
$sql2 = mysql_query("SELECT * FROM post_ar WHERE id = '$i3';");
$res2 = mysql_fetch_array($sql2);
$vnum = $res2['us'];
if($vnum == $i2){
$csql4 = mysql_query("DELETE FROM post_ar WHERE id='$i3'");
if($csql4) {
$msg_erro = "Postagem apagada com sucesso!";
}
else {
$msg_erro = "Houve um erro! relate o erro!";
}
echo "<div id=cont>" . $msg_erro . "</div>";
}}












if ($i1 == 3){
$mensagem_erro = "";
if(isset($_POST["alterar"])) { 
	$nomeband = $class->antisql($_POST["nomeband"]);
		$descricao = $class->antisql($_POST["descricao"]); 
		$est_musical = $class->antisql($_POST["est_musical"]); 
		$musicas = $class->antisql($_POST["musicas"]);
		$cidade = $class->antisql($_POST["cidade"]); 
		$estado = $class->antisql($_POST["estado"]); 		
			
	
	if(!empty($_POST["nomeband"]) && !empty($_POST["descricao"]) && !empty($_POST["est_musical"]) && !empty($_POST["musicas"]) && !empty($_POST["cidade"]) && !empty($_POST["estado"])) { 
		
		
			$insert = mysql_query("update artista set nome = '$nomeband', descricao = '$descricao', est_musical = '$est_musical', musicas = '$musicas', cidade = '$cidade', estado = '$estado' where id = '$i2';") or die(mysql_error());
			
			if($insert) { 
				
				$mensagem_erro = "<b>Dados Alterados com sucesso!</b>";
			}
		
		
	}
	else { 
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		echo $_POST['descricao'];
		
	}		
}
?>
<div id="cj"><span class="titulo">Alterar Dados:</span></div>
<div id="fj">
<form method="post" action="index.php?editart&i1=3&i2=<?php echo $i2; ?>">
<table>
<tr><td><?php echo $mensagem_erro; ?></td><td></td></tr>
<tr><td>Nome:</td><td><input id="cordoinput" type="text" name="nomeband" value="<?php echo $rartista["nome"]; ?>" /></td></tr>
<tr><td>Descricao:</td><td><input id="cordoinput" type="text" name="descricao" value="<?php echo $rartista["descricao"]; ?>"></td></tr>
<tr><td>Estilo Musical:</td><td><select id="cordoinput" type="text" name="est_musical">
<?php
$csqlopt = mysql_query("select * from est_musical order by nome");
while($rsqlopt = mysql_fetch_array($csqlopt)){
	if($rartista['est_musical'] == $rsqlopt['id']){
		echo "<option selected value=" . $rsqlopt['id'] . ">" . $rsqlopt['nome'] . "</option>";
	}else{
		echo "<option value=" . $rsqlopt['id'] . ">" . $rsqlopt['nome'] . "</option>";
	}
}
?></select>
</td></tr>
<tr><td>Musicas:</td><td><select id="cordoinput" type="text" name="musicas">
<?php
if($rartista['musicas'] == 1){
	echo "<option selected value=1>Proprias</option>";
}else{
	echo "<option value=1>Proprias</option>";
}
if($rartista['musicas'] == 2){
	echo "<option selected value=2>Covers</option>";
}else{
	echo "<option value=2>Covers</option>";
}
if($rartista['musicas'] == 3){
	echo "<option selected value=3>Mistas</option>";
}else{
	echo "<option value=3>Mistas</option>";
}
?>
</select>
</td></tr>
<tr><td>Cidade:</td><td><input id="cordoinput" type="text" name="cidade" value="<?php echo $rartista["cidade"]; ?>" /></td></tr>
<tr><td>Estado:</td><td><input id="cordoinput" type="text" name="estado" value="<?php echo $rartista["estado"]; ?>" /></td></tr>
<tr><td></td><td><input id="cordoinput" type="submit" name="alterar" value="OK" /></td></tr>
</table>
</form>
<a href="index.php?editart&i1=1&i2=<?php echo $i2; ?>" target="_top" class="classe1">Voltar</a>
</div>


<?php
}




if ($i1 == 4){
	echo "area do adm";
}




} else {echo "voce nao é adm desta banda!.";}
?>