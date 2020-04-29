<?php
if($i1 == null){$i1 = 1;}
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){

	if(isset($_POST["cadastrar"])) {
	if(!empty($_POST["descricao"]) && !empty($_POST["data"]) && !empty($_POST["hora"]) && !empty($_POST["nome"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]);
		$data = $class->antisql($_POST["data"]); 
		$hora = $class->antisql($_POST["hora"]);
		
			
		$insert = mysql_query("INSERT INTO noticias(id_ar, nome, descricao, data, hora, rev) VALUES('$i2', '$nome', '$descricao', '$data', '$hora', '0')") or die(mysql_error());
		if($insert) {
			echo "<script>alert('Noticia criada com sucesso!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
		}
	}else{
		echo "<script>alert('Por favor, preencha todos os campos!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
	}

}


if(isset($_POST["alterar"])) {
	if(!empty($_POST["descricao"]) && !empty($_POST["data"]) && !empty($_POST["hora"]) && !empty($_POST["nome"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]);
		$data = $class->antisql($_POST["data"]); 
		$hora = $class->antisql($_POST["hora"]);
		
		
			
		$insert = mysql_query("update noticias set nome = '$nome', descricao = '$descricao', data = '$data', hora = '$hora', rev = '0' where id_ar = '$i2';") or die(mysql_error());
		if($insert) {
			echo "<script>alert('Noticia alterada com sucesso!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
		}
	}else{
		echo "<script>alert('Por favor, preencha todos os campos!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
	}

}




if($i1 == 1){
$res = mysql_query("SELECT * FROM noticias where id_ar = '$i2'");
echo "<div class=\"tabela1\"><table><tr><td>Noticias</td><td>Alterar</td><td>Excluir</td></tr>";
while($escrever=mysql_fetch_array($res)){
	echo "<tr>
	<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','arnoti_ver');\">" . $escrever['nome'] . "</a></td>
	<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','arnoti_edit');\">Alterar</a></td>
	<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','arnoti_del');\">Excluir</a></td>
	</tr>";

	$dat = explode("-", $escrever['data']);
	if ($escrever['rev'] == 0){ $rev = "Nao Revisada"; }
	if ($escrever['rev'] == 1){ $rev = "Revisada"; }


}
if (mysql_num_rows($res) == 0){
echo "<tr><td><center><span class=\"titulo\">A lista de noticias está vazia</span></center></td><td></td><td></td></tr>";
}
echo "</table></div><br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\"  onclick=\"CarregaDadosJanela('0','arnoti_novo');\" class=\"botao\">Criar Noticia</a></div>";






}






















if($i1 == 2){

?>
<form method="post" action="">
<table>
<tr><td><span class="texto">Nome:</span></td><td><input id="cordoinput" type="text" name="nome"></td></tr>
<tr><td><span class="texto">Descrição:</span></td><td><textarea id="cordoinput" name="descricao" type="text" row="5" cols="60"></textarea></td></tr>
<tr><td><span class="texto">Data:</span></td><td><input id="cordoinput" type="text" name="data"></td></tr>
<tr><td><span class="texto">Hora:</span></td><td><input id="cordoinput" type="text" name="hora"></td></tr>
<tr><td></td><td><input id="cordoinput" type="submit" name="cadastrar" value="Criar"></td></tr>
</table>
</form>
<?php
}













if($i1 == 3){
$deleta = mysql_query("delete from noticias where id = '$i3';");
if($deleta){
	echo "<script>alert('Noticia excluida com sucesso!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
}else{
	echo "<script>alert('Houve um problema!');window.location='index.php?editnoticias&i1=1&i2=" . $i2 . "';</script>";
}

}





}
?>