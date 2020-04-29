<?php
if($i1 == null){$i1 = 1;}
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){

	if(isset($_POST["cadastrar"])) {
		if(!empty($_POST["descricao"]) && !empty($_POST["data"]) && !empty($_POST["hora"]) && !empty($_POST["local"]) && !empty($_POST["link"])) { 
			
			$descricao = $class->antisql($_POST["descricao"]);
			$data = $class->antisql($_POST["data"]); 
			$hora = $class->antisql($_POST["hora"]);
			$local = $class->antisql($_POST["local"]);
			$link = $class->antisql($_POST["link"]);
			
				
			$insert = mysql_query("INSERT INTO agenda(id_ar, descricao, data, hora, local, link, rev) VALUES('$i2', '$descricao', '$data', '$hora', '$local', '$link', '0')") or die(mysql_error());
			if($insert) {
				echo "<script>alert('Evento criado com sucesso!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
			}
		}else{
			echo "<script>alert('Por favor, preencha todos os campos!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
		}

	}
	if(isset($_POST["alterar"])) {
		if(!empty($_POST["descricao"]) && !empty($_POST["data"]) && !empty($_POST["hora"]) && !empty($_POST["local"]) && !empty($_POST["link"])) { 
			
			$descricao = $class->antisql($_POST["descricao"]);
			$data = $class->antisql($_POST["data"]); 
			$hora = $class->antisql($_POST["hora"]);
			$local = $class->antisql($_POST["local"]);
			$link = $class->antisql($_POST["link"]);
			
				
			$insert = mysql_query("update agenda set descricao = '$descricao', data = '$data', hora = '$hora', local = '$local', link = '$link', rev = '0' where id_ar = '$i2';") or die(mysql_error());
			if($insert) {
				echo "<script>alert('Evento alterado com sucesso!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
			}
		}else{
			echo "<script>alert('Por favor, preencha todos os campos!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
		}

	}
	if($i1 == 1){
	$res = mysql_query("SELECT * FROM agenda where id_ar = '$i2'");
	echo "<div class=\"tabela1\"><table><tr><td>Eventos</td><td>Alterar</td><td>Excluir</td></tr>";
	while($escrever=mysql_fetch_array($res)){
		echo "<tr>
		<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','areven_ver');\">" . $escrever['descricao'] . "</a></td>
		<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','areven_edit');\">Alterar</a></td>
		<td><a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','areven_del');\">Excluir</a></td>
		</tr>";

		$dat = explode("-", $escrever['data']);
		if ($escrever['rev'] == 0){ $rev = "Nao Revisada"; }
		if ($escrever['rev'] == 1){ $rev = "Revisada"; }



	}
	if (mysql_num_rows($res) == 0){
	echo "<tr><td><center><span class=\"titulo\">A lista de eventos está vazia</span></center></td><td></td><td></td></tr>";
	}
	echo "</table></div><br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\"  onclick=\"CarregaDadosJanela('0','areven_novo');\">Criar Evento</a></div>";






	}






















	if($i1 == 2){

	?>
	<form method="post" action="">
	<table>
	<tr><td><span class="texto">Nome ou descrição:</span></td><td><input id="cordoinput" type="text" name="descricao"></td></tr>
	<tr><td><span class="texto">Data:</span></td><td><input id="cordoinput" type="text" name="data"></td></tr>
	<tr><td><span class="texto">Hora:</span></td><td><input id="cordoinput" type="text" name="hora"></td></tr>
	<tr><td><span class="texto">Local:</span></td><td><input id="cordoinput" type="text" name="local"></td></tr>
	<tr><td><span class="texto">Link:</span></td><td><input id="cordoinput" type="text" name="link"></td></tr>
	<tr><td></td><td><button id="cordoinput" type="submit" name="cadastrar" value="Cadastrar">Cadastrar</button></td></tr>
	</table>
	</form>
	<?php
	}













	if($i1 == 3){
	$deleta = mysql_query("delete from agenda where id = '$i3';");
	if($deleta){
		echo "<script>alert('Evento excluido com sucesso!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
	}else{
		echo "<script>alert('Houve um problema!');window.location='index.php?editeventos&i1=1&i2=" . $i2 . "';</script>";
	}

	}



}
?>