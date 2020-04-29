<?php
if($i1 == null){$i1 = 1;}
if($i1 == 1){
$res = mysql_query("SELECT * FROM membros where id_us = '$id'");
 echo "<div class=\"tabela1\"><table><tr><td>Bandas</td></tr>";
 while($escrever=mysql_fetch_array($res)){
 	$csql = mysql_query("SELECT * FROM artista WHERE id = '$escrever[id_ar]'");
	$rsql = mysql_fetch_array($csql);
 echo "<tr><td><a href=index.php?verart&i1=1&i2=" . $escrever['id_ar'] . " class=classe1>" . $rsql['nome'] . "</a></td></tr>";

}
if (mysql_num_rows($res) > 0){

} else {
echo "<tr><td><center><span class=\"titulo\">A lista de artistas está vazia</span></center></td></tr>";
}
echo "</table></div><br><div align=right><a href=index.php?artista&i1=2 class=botao>Criar Banda</a></div>";


$res2 = mysql_query("SELECT * FROM convite_membro where id_us = '$id'");
 echo "<br><div class=\"tabela1\"><table><tr><td>Convites</td><td width=50>Aceitar</td><td width=50>Recusar</td></tr>";
 while($escrever2=mysql_fetch_array($res2)){
 	$csql2 = mysql_query("SELECT * FROM artista WHERE id = '$escrever2[id_ar]'");
	$rsql2 = mysql_fetch_array($csql2);
 echo "
 <tr><td><a href=index.php?artista&i1=3&i2=" . $escrever2['id'] . " class=classe1>Convite para ingressar na banda " . $rsql2['nome'] . "</a></td>
 <td><a href=index.php?artista&i1=4&i2=" . $escrever2['id'] . " class=classe1>Aceitar</a></td>
 <td><a href=index.php?artista&i1=5&i2=" . $escrever2['id'] . " class=classe1>Recusar</a></td></tr>";

}
if (mysql_num_rows($res2) > 0){

} else {
echo "<tr><td><center><span class=\"titulo\">A lista de convites está vazia</span></center></td><td></td><td></td></tr>";
}

echo "</table></div>";




}








if($i1 == 2){
$mensagem_erro = "";
if(isset($_POST["cadastrar"])) {
if(!empty($_POST["nome"]) && !empty($_POST["cidade"]) && !empty($_POST["estado"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]);
		$est_musical = $class->antisql($_POST["est_musical"]); 
		$musicas = $class->antisql($_POST["musicas"]);
		$cidade = $class->antisql($_POST["cidade"]);
		$estado = $class->antisql($_POST["estado"]);
		
		
		$repeat_user = mysql_query("SELECT * FROM artista WHERE nome = '$nome'") or die($mensagem_erro = "Houve um erro:<br />".mysql_error());
		
		if(mysql_num_rows($repeat_user) > 0) { 
			
			$mensagem_erro = "Já existe um artista com este nome!";
		}
		else {
			
			$insert = mysql_query("INSERT INTO artista(nome, descricao, est_musical, musicas, cidade, estado, foto, rev) VALUES('$nome', '$descricao', '$est_musical', '$musicas', '$cidade', '$estado', 'new/new.png', '0')") or die(mysql_error());
			$msql = mysql_query("select * from artista where nome = '$nome';");
			$rmsql = mysql_fetch_array($msql);
			$insert = mysql_query("INSERT INTO membros(id_us, id_ar, adm, rev) VALUES('$id', '$rmsql[id]', '1', '0')");
			if($insert) { 
				
				$mensagem_erro = "<b>Artista cadastrado com sucesso!</b>";
			}
		}
		
	}
	else { 
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}
}
?>
<form method="post" action="">
<span class="texto"><?php echo $mensagem_erro; ?></span><br>
<table>
<tr><td><span class="texto">Nome:</span></td><td><input id="cordoinput" type="text" name="nome"></td></tr>
<tr><td><span class="texto">Descrição:</span></td><td><textarea id="cordoinput" type="text" name="descricao" rows="10" cols="50"></textarea></td></tr>
<tr><td><span class="texto">Estilo Musical:</span></td><td><select name="est_musical" id="cordoinput">
<?php
$sql = mysql_query("select * from est_musical order by nome asc");
while($rsql = mysql_fetch_array($sql)){
    echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
}
?>
</select></td></tr>
<tr><td><span class="texto">Tipo de Musicas:</span></td><td><select name="musicas" id="cordoinput"><option value="1">Próprias</option><option value="2">Covers</option><option value="3">Misto</option></select></td></tr>
<tr><td><span class="texto">Cidade:</span></td><td><input id="cordoinput" type="text" name="cidade"></td></tr>
<tr><td><span class="texto">Estado:</span></td><td><input id="cordoinput" type="text" name="estado"></td></tr>
<tr><td></td><td><button id="cordoinput" type="submit" name="cadastrar" value="Cadastrar">Cadastrar</button></td></tr>
</table>
</form>
<?php
}













if($i1 == 3){
$csql = mysql_query("SELECT * FROM convite_membro WHERE id = '$i2'");
$rsql = mysql_fetch_array($csql);
$csql2 = mysql_query("SELECT * FROM artista WHERE id = '$rsql[id_ar]'");
$rsql2 = mysql_fetch_array($csql2);
echo "
<div id=\"cj\"><span class=\"titulo\">Convite para ingressar na banda " . $rsql2['nome'] . "</span></div>
<div id=\"fj\"><span class=\"texto\">
" . $rsql['msg'] . "<br>

<a href=index.php?artista&i1=4&i2=" . $i2 . " class=classe1>Aceitar</a> - 
<a href=index.php?artista&i1=5&i2=" . $i2 . " class=classe1>Recusar</a>

</span></div>
";
}






if($i1 == 4){
$csql = mysql_query("SELECT * FROM convite_membro WHERE id = '$i2'");
$rsql = mysql_fetch_array($csql);
$rs = mysql_query("SELECT * FROM convite_membro WHERE id = '$i2' and id_us = '$id';") or die($mensagem_erro = "Houve um erro:<br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
if(mysql_num_rows($rs) > 0) {
$insert = mysql_query("insert into membros (id_us, id_ar, adm, rev) values('$id', '$rsql[id_ar]', '0', '0');");
$insert = mysql_query("delete from convite_membro where id = '$i2';");
if($insert){ echo "Voce entrou na banda!"; }else{ echo "Houve um problema!"; }

}else{ echo "Houve um problema!"; }
}







if($i1 == 5){
$rs = mysql_query("SELECT * FROM convite_membro WHERE id = '$i2' and id_us = '$id';") or die($mensagem_erro = "Houve um erro:<br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
if(mysql_num_rows($rs) > 0) {
$insert = mysql_query("delete from convite_membro where id = '$i2';");
if($insert){ echo "ok!"; }else{ echo "Houve um problema!"; }

}else{ echo "Houve um problema"; }
}
?>