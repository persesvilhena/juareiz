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
if($i1 == null){$i1 = 1;}
if($i1 == 1){
// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['envia'])) {
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/videos/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 100; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('flv', 'mp4');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)


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
echo "Por favor, envie videos nos formatos: flv ou mp4";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 100Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "Upload efetuado com sucesso!";
echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}

}
}

?>
<form method="post" action="" enctype="multipart/form-data">
<label>Arquivo</label>
<input type="file" name="arquivo" />
<input type="submit" name="envia" value="Enviar" />
</form>
<span class="titulo">Suas Fotos:</span>
<div align="left"><span class="texto">
<form action="" method="post" enctype="multipart/form-data" name="cadastro" >
<input type="hidden" name="us" value="<?php echo "$id_gen"; ?>">
<input type="hidden" name="usn" value="<?php echo "$row[nome]"; ?>">
Adicionar nova foto | Descrição da foto (opicional):
<input id="cordoinput" type="text" name="descricao" />
<input id="cordoinput" type="file" name="foto" />
<input id="cordoinput" type="submit" name="cadastrar" value="Enviar" />
</form></span>
<hr size=1 color=#cccccc>
<?php
$res = mysql_query("SELECT * FROM `album` where us='$id_gen';");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"cordoinput\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=index.php?album&i1=2&i2=" . $escrever['id'] . "><img src=album/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
<center style=\"margin-top: 2px;\"><span class=\"texto\">
<a href=\"index.php?album&i1=3&i2=" . $escrever['id'] . "\" class=\"classe1\">Editar</a> - 
<a href=\"index.php?album&i1=4&i2=" . $escrever['id'] . "\" class=\"classe1\">Excluir</a>
</span></center>
 ";
 echo "</div>";
}
?>
</div>
<?php
}
if($i1 == 2){
$qfoto = mysql_query("select * from album where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
if ($rfoto['us'] == $id){ echo "<a href=\"index.php?album\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }else
{ echo "<a href=\"index.php?user&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }

echo "<center><img src=\"album/" . $rfoto['nome'] . "\" style=\"max-width: 798px; max-height: 1500px;\"></center><hr size=\"1\" color=\"#cccccc\">";
echo "<span class=\"titulo\">Descricao: </span><span class=\"texto\">" . $rfoto['descricao'] . "<br>";
echo "<br> ";
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