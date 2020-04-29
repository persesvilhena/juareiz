<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php

include "../engine/conexao.php"; 
include "../engine/functions.php";
if(user_logado()){
include "../engine/protege.php";
}

$idu = $_GET['id'];
$ua = $_GET['ua'];








////////////////////////////////////////////////////////////
/////////////////////JANELA USUARIOS E ARTISTAS
/////////////////////////////////////////////////////////////
if($ua == "us"){
$csql = mysql_query("select * from user where id = '$idu';");
$rsql = mysql_fetch_array($csql);
$perfilcsql = mysql_query("select * from perfil where id = '$idu';");
$perfilrsql = mysql_fetch_array($perfilcsql);

echo "
		<img src=\"fotos/" . $rsql['foto'] . "\" width=\"250\" height=\"250\" align=\"left\" class=\"pr1\">
		<div align=\"left\">
		<span class=\"titulo\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . " - <a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\">Visitar Perfil</a></span>
		<hr size=\"1\" color=\"#cccccc\">
		<span class=\"texto\">
		<b>Data de Nascimento:</b> " . $perfilrsql['data_nasc'] . "<br>
		<b>Telefone:</b> " . $perfilrsql['telefone'] . "<br>
		<b>Telefone2:</b> " . $perfilrsql['telefone2'] . "<br>
		<b>Cidade:</b> " . $perfilrsql['cidade'] . "<br>
		<b>Estado:</b> " . $perfilrsql['estado'] . "<br>
		<b>Regiao:</b> " . $perfilrsql['regiao'] . "<br>
		<b>País:</b> " . $perfilrsql['pais'] . "<br>
		<b>Descricao:</b> " . $perfilrsql['descricao1'] . "<br>
		</span>
		</div>
";
}

if($ua == "ar"){
	$csql = mysql_query("select * from artista where id = '$idu';");
$rsql = mysql_fetch_array($csql);

	$estmus = mysql_query("select * from est_musical where id = '$rsql[est_musical]';");
	$restmus = mysql_fetch_array($estmus);
		if ($rsql['musicas'] == 1){ $mus = "Proprias"; }
		if ($rsql['musicas'] == 2){ $mus = "Covers"; }
		if ($rsql['musicas'] == 3){ $mus = "Mistas"; }
echo "
	<img src=\"fotos/" . $rsql['foto'] . "\" width=\"250\" height=\"250\" align=\"left\" class=\"pr1\">
	<div align=\"left\">
		<span class=\"titulo\">" . $rsql['nome'] . " - <a href=\"index.php?verart&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\">Visitar Perfil</a></span>
		<hr size=\"1\" color=\"#cccccc\">
		<span class=\"texto\">
			<b>Musicas:</b> " . $mus . "<br>
			<b>Estilo Musical:</b> " . $restmus['nome'] . "<br>
			<b>Cidade:</b> " . $rsql['cidade'] . "<br>
			<b>Estado:</b> " . $rsql['estado'] . "<br>
			<b>Descrição:</b> " . $rsql['descricao'] . "<br>
		</span>
	</div>
";
}








////////////////////////////////////////////////////////////
/////////////////////PERFIL
/////////////////////////////////////////////////////////////



if($ua == "perfil_alt"){
echo "
<span class=\"titulo\">Alterar Dados:</span>
<hr size=\"1\" color=\"#ccc\">
<form method=\"post\" action=\"index.php?perfilalterar\">
	<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
		<tr>
			<td><span class=\"texto\">Nome:</span></td>
			<td><input type=\"text\" name=\"nome\" value=\"" . $row['nome'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td><span class=\"texto\">Sobrenome:</span></td>
			<td><input type=\"text\" name=\"sobrenome\" value=\"" . $row['sobrenome'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td><span class=\"texto\">E-mail:</span></td>
			<td><input type=\"text\" name=\"email\" value=\"" . $row['email'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td></td>
			<td><div align=\"right\"><input type=\"submit\" name=\"cadastrar\" value=\"OK\"></div></td>
		</tr>
	</table>
</form>
";
}

if($ua == "perfil_alt1"){
	echo "
		<span class=\"titulo\">Alterar Dados:</span>
		<hr size=\"1\" color=\"#ccc\">
		<form method=\"post\" action=\"index.php?perfilalterar2\">
			<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
				<tr>
					<td width=\"150\"><span class=\"texto\">Data de Nascimento:</span></td>
					<td width=\"150\"><input type=\"text\" name=\"data_nasc\" value=\"" . $row2["data_nasc"] . "\"></td>
					<td width=\"150\"><span class=\"texto\">Estado:</span></td>
					<td width=\"150\"><input type=\"text\" name=\"estado\" value=\"" . $row2["estado"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Telefone:</span></td>
					<td><input type=\"text\" name=\"telefone\" value=\"" . $row2["telefone"] . "\"></td>
					<td><span class=\"texto\">Regiao:</span></td>
					<td><input type=\"text\" name=\"regiao\" value=\"" . $row2["regiao"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Telefone2:</span></td>
					<td><input type=\"text\" name=\"telefone2\" value=\"" . $row2["telefone2"] . "\"></td>
					<td><span class=\"texto\">País:</span></td>
					<td><input type=\"text\" name=\"pais\" value=\"" . $row2["pais"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Cidade:</span></td>
					<td><input type=\"text\" name=\"cidade\" value=\"" . $row2["cidade"] . "\"></td>
					<td></td>
					<td></td>
				</tr>
			</table>

			<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
				<tr>
					<td><span class=\"texto\">Descricao1:</span></td>
					<td><textarea type=\"text\" name=\"descricao1\" rows=\"6\" cols=\"60\">" . $row2["descricao1"] . "</textarea></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Descricao2:</span></td>
					<td><textarea type=\"text\" name=\"descricao2\" rows=\"6\" cols=\"60\">" . $row2["descricao2"] . "</textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><div align=\"right\"><input type=\"submit\" name=\"cadastrar\" value=\"OK\"></div></td>
				</tr>
			</table>
		</form>

	";
}


















////////////////////////////////////////////////////////////
/////////////////////EXIBIR FOTOS
/////////////////////////////////////////////////////////////

if($ua == "ftus"){
	$csql = mysql_query("select * from album where id = '$idu';");
$rsql = mysql_fetch_array($csql);
echo "<center><img src=\"album/" . $rsql['nome'] . "\" style=\"max-width: 600px;\" class=\"pr1\"></center><br><span class=\"texto\">" . $rsql['descricao'] . "</span>";


}



if($ua == "ftar"){
	$csql = mysql_query("select * from album_ar where id = '$idu';");
$rsql = mysql_fetch_array($csql);
echo "<center><img src=\"albumar/" . $rsql['nome'] . "\" style=\"max-width: 600px;\" class=\"pr1\"></center><br><span class=\"texto\">" . $rsql['descricao'] . "</span>";


}


if($ua == "vdus"){
	$csql = mysql_query("select * from videos where id = $idu;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	<div id=\"myElement" . $rsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $rsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $rsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"600\",
        	height: \"337\"
    	});
		</script>
	<span class=\"texto\">" . $rsql['descricao'] . "</span>

	";


}






////////////////////////////////////////////////////////////
/////////////////////CONVITE
/////////////////////////////////////////////////////////////

if($ua == "conviteus"){
$csql = mysql_query("select * from user where id = '$idu';");
$rsql = mysql_fetch_array($csql);
$conviteartista = mysql_query("select * from artista where id = '$row[idart]';");
$rconviteartista = mysql_fetch_array($conviteartista);
echo "
<span class=\"texto\">Enviar convite para " . $rsql['nome'] . " " . $rsql['sobrenome'] . ", para ingressar na banda " . $rconviteartista['nome'] . "?
<form method=\"post\" action=\"\">
<table>
<input id=\"cordoinput\" type=\"hidden\" name=\"id_us\" value=\"" . $rsql['id'] . "\">
<tr><td><span class=\"texto\">Mensagem:</span></td><td><textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"10\" cols=\"50\"></textarea></td></tr>
<tr><td><input type=\"hidden\" name=\"id_ar\" value=\"" . $row['idart'] . "\"></td><td><input id=\"cordoinput\" type=\"submit\" name=\"convite\" value=\"Enviar\"></td></tr>
</table>
</form>


</span>";
}







////////////////////////////////////////////////////////////
/////////////////////BOTOES LIKE E DESLIKE
/////////////////////////////////////////////////////////////


if($ua == "btn_like"){
	$csql = mysql_query("select * from gostar where id_post = '$idu' and gostei = '1'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_nlike"){
	$csql = mysql_query("select * from gostar where id_post = '$idu' and gostei = '0'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_like2"){
	$csql = mysql_query("select * from gostar where id_repost = '$idu' and gostei = '1'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_nlike2"){
	$csql = mysql_query("select * from gostar where id_repost = '$idu' and gostei = '0'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}





if($ua == "btn_ar_like"){
	$csql = mysql_query("select * from gostar_ar where id_post = '$idu' and gostei = '1'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_ar_nlike"){
	$csql = mysql_query("select * from gostar_ar where id_post = '$idu' and gostei = '0'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_ar_like2"){
	$csql = mysql_query("select * from gostar_ar where id_repost = '$idu' and gostei = '1'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_ar_nlike2"){
	$csql = mysql_query("select * from gostar_ar where id_repost = '$idu' and gostei = '0'");
	while($rsql = mysql_fetch_array($csql)){
		$csqluser = mysql_query("select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysql_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}











////////////////////////////////////////////////////////////
/////////////////////MENUS
/////////////////////////////////////////////////////////////



if($ua == "menu_us"){
	$csql = mysql_query("select * from post where id = '$idu';");
	$rsql = mysql_fetch_array($csql);
	$datatempo = explode(" ", $rsql['data']);
	$dat = explode("-", $datatempo[0]);
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($rsql['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"MostrarOcultar('menualterar')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"MostrarOcultar('menuapagar')\">";
	}
	echo "
	</center>
	</span>

	<div id=\"menualterar\" style=\"display: none;\">
	<form action=\"" . $pagina . "&p1=6&p2=" . $rsql['id'] . "\" method=\"post\">
	<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $rsql['msg'] . "</textarea>
	<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
	</form>
	</div>

	<div id=\"menuapagar\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}


if($ua == "menu_ar"){
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($escrever1['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $e . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $e . "')\">";
	}
	echo "
	</center>
	</span>
	<div id=\"palterar" . $e . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=6&p2=" . $escrever1['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever1['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $e . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $escrever1['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}


if($ua == "remenu_us"){
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($escrever1['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $e . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $e . "')\">";
	}
	echo "
	</center>
	</span>
	<div id=\"palterar" . $e . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=6&p2=" . $escrever1['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever1['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $e . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $escrever1['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}


if($ua == "remenu_ar"){
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($escrever1['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $e . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $e . "')\">";
	}
	echo "
	</center>
	</span>
	<div id=\"palterar" . $e . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=6&p2=" . $escrever1['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever1['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $e . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $escrever1['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}









//////////////////////////////////////////////////
//////////MUSICAS
///////////////////////////////////////////////

if($ua == "mus_edit"){
$csql = mysql_query("select * from musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?musicas&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "mus_del"){
$csql = mysql_query("select * from musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir a musica?</span><br><br>
		<a href=\"index.php?musicas&i1=3&i2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "mus_novo"){
$csql = mysql_query("select * from musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Nova Música</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?musicas&i1=4\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "armus_edit"){
$csql = mysql_query("select * from musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?armusicas&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "armus_del"){
$csql = mysql_query("select * from musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir a musica?</span><br><br>
		<a href=\"index.php?armusicas&i1=3&i2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "armus_novo"){


echo "
		<span class=\"texto\">
		<span class=\"titulo\">Nova Música</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?armusicas&i1=4&i2=" . $idu . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}


////////////////////////////////////////////////////////////
/////////////////////VIDEOS
/////////////////////////////////////////////////////////////

if($ua == "vid_edit"){
$csql = mysql_query("select * from videos where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?videos&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "vid_del"){
$csql = mysql_query("select * from videos where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o video?</span><br><br>
		<a href=\"index.php?videos&i1=3&i2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "vid_novo"){
$csql = mysql_query("select * from videos where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Novo Video</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?videos&i1=4\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "arvid_edit"){
$csql = mysql_query("select * from videos where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?arvideos&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "arvid_del"){
$csql = mysql_query("select * from videos where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o video?</span><br><br>
		<a href=\"index.php?arvideos&i1=3&i2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "arvid_novo"){


echo "
		<span class=\"texto\">
		<span class=\"titulo\">Novo Video</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?arvideos&i1=4&i2=" . $idu . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}



////////////////////////////////////////////////////////////
/////////////////////FOTOS
/////////////////////////////////////////////////////////////

if($ua == "ft_edit"){
$csql = mysql_query("select * from album where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
<form action=\"\" method=\"post\">
<input type=\"hidden\" name=\"idimg\" value=\"" . $idu . "\">
<textarea id=\"cordoinput\" type=\"text\" name=\"descricao\" rows=\"10\" cols=\"50\">" . $rsql['descricao'] . "</textarea>
<input id=\"cordoinput\" type=\"submit\" name=\"alterar\" value=\"Alterar\" />
</form>";
}

if($ua == "ft_del"){
$csql = mysql_query("select * from album where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o video?</span><br><br>
		<a href=\"index.php?album&i1=4&i2=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "ft_novo"){
$csql = mysql_query("select * from album where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
<span class=\"titulo\">Adicionar nova foto</span>
<hr size=\"1\" color=\"#cccccc\">
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" name=\"cadastro\">
<span class=\"texto\">
<input type=\"file\" name=\"foto\"><br>
Descrição da foto (opicional):<br>
<textarea type=\"text\" name=\"descricao\" rows=\"5\" cols=\"50\"></textarea>
<input type=\"submit\" name=\"cadastrar\" value=\"Enviar\">
</form></span>";
}

if($ua == "arft_edit"){
	$qfoto = mysql_query("select * from album_ar where id = '$idu';");
	$rfoto = mysql_fetch_array($qfoto);

	echo"
	<form action=\"index.php?artalbum&i2=" . $rfoto['us'] . "\" method=\"post\">
		<input type=\"hidden\" name=\"idimg\" value=\"" . $rfoto['id'] . "\">
		<textarea type=\"text\" name=\"descricao\" rows=\"10\" cols=\"50\">" . $rfoto['descricao'] . "</textarea>
		<input type=\"submit\" name=\"alterar\" value=\"Alterar\">
	</form>";
}

if($ua == "arft_del"){
$csql = mysql_query("select * from album_ar where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o video?</span><br><br>
		<a href=\"index.php?artalbum&i1=4&i2=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "arft_novo"){


echo "
		<span class=\"titulo\">Adicionar nova foto</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" name=\"cadastro\" >
		<span class=\"texto\">
		<input type=\"file\" name=\"foto\" /><br>
		Descrição da foto (opicional):<br>
		<input type=\"hidden\" name=\"us\" value=\"" . $idu . "\"/>
		<textarea type=\"text\" name=\"descricao\" rows=\"5\" cols=\"50\"></textarea>
		<input type=\"submit\" name=\"cadastrar\" value=\"Enviar\">
		</form></span>";
}




////////////////////////////////////////////////////////////
/////////////////////ARTISTA DISCOGRAFIA
/////////////////////////////////////////////////////////////

if($ua == "ardisc_edit"){
$csql = mysql_query("select * from disc where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?discografia&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Data:</span></td><td><input name=\"data\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['data'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Duração:</span></td><td><input name=\"duracao\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['duracao'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "ardisc_del"){

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o album?</span><br><br>
		<a href=\"index.php?discografia&i1=3&i2=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "ardisc_novo"){

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Novo Album</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?discografia&i1=4&i2=" . $idu . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Data:</span></td><td><input name=\"data\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Duração:</span></td><td><input name=\"duracao\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "ardiscm_edit"){
$csql = mysql_query("select * from disc_musicas where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?discmusicas&i1=2&i2=" . $rsql['id'] . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Numero:</span></td><td><input name=\"numero\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['numero'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['nome'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Composição:</span></td><td><input name=\"composicao\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['composicao'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Letras:</span></td><td><textarea name=\"letras\" id=\"cordoinput\" type=\"text\" size=\"67\" rows=\"5\" cols=\"50\">" . $rsql['letras'] . "</textarea></td></tr>
		<tr><td><span class=\"texto\">Duração:</span></td><td><input name=\"duracao\" id=\"cordoinput\" type=\"text\" size=\"67\" value=\"" . $rsql['duracao'] . "\"></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "ardiscm_del"){

echo "
		<center><span class=\"texto\">Você realmente deseja excluir o album?</span><br><br>
		<a href=\"index.php?discmusicas&i1=3&i2=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "ardiscm_novo"){

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Nova musica</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?discmusicas&i1=4&i2=" . $idu . "\" method=\"post\" enctype=\"multipart/form-data\">
		<table>
		<tr><td><span class=\"texto\">Numero:</span></td><td><input name=\"numero\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input name=\"nome\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Composição:</span></td><td><input name=\"composicao\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Duração:</span></td><td><input name=\"duracao\" id=\"cordoinput\" type=\"text\" size=\"67\"></td></tr>
		<tr><td><span class=\"texto\">Letras:</span></td><td><textarea name=\"letras\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Descricao:</span></td><td><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Arquivo:</span></td><td><input name=\"arquivo\" id=\"cordoinput\" type=\"file\" size=\"67\"></td></tr>
		<tr><td></td><td><input name=\"envia\" id=\"cordoinput\" type=\"submit\" value=\"Postar\"></td></tr>
		</table>
		</form>
		</span>";
}





////////////////////////////////////////////////////////////
/////////////////////ARTISTAS EVENTOS
/////////////////////////////////////////////////////////////

if($ua == "areven_ver"){
$csql = mysql_query("select * from agenda where id = '$idu';");
$rsql = mysql_fetch_array($csql);
$dat = explode("-", $rsql['data']);

echo "
		<span class=titulo>" . $rsql['descricao'] . "</span>
		<hr color=\"#cccccc\" size=\"1\">
		<span class=texto>
		<b>Data: </b>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . "<br>
		<b>Hora: </b>" . $rsql['hora'] . "<br>
		<b>Local: </b>" . $rsql['local'] . "<br>
		<a href=\"" . $rsql['link'] . "\" target=\"_top\" class=\"botao\">Comprar Ingresso<a><br>
		</span>";
}

if($ua == "areven_edit"){
$csql = mysql_query("select * from agenda where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
		<span class=\"texto\">
		<form action=\"\" method=\"post\">
		<table>
		<tr><td>Nome ou descrição: </td><td><input name=\"descricao\" type=\"text\" value=\"" . $rsql['descricao'] . "\"></td></tr>
		<tr><td>Data: </td><td><input name=\"data\" type=\"text\" value=\"" . $rsql['data'] . "\"></td></tr>
		<tr><td>Hora: </td><td><input name=\"hora\" type=\"text\" value=\"" . $rsql['hora'] . "\"></td></tr>
		<tr><td>Local: </td><td><input name=\"local\" type=\"text\" value=\"" . $rsql['local'] . "\"></td></tr>
		<tr><td>Link: </td><td><input name=\"link\" type=\"text\" value=\"" . $rsql['link'] . "\"></td></tr>
		<tr><td></td><td><input name=\"alterar\" type=\"submit\" value=\"Alterar\"></td></tr>
		</table>
		</form>
		</span>";
}

if($ua == "areven_del"){
$csql = mysql_query("select * from agenda where id = '$idu';");
$rsql = mysql_fetch_array($csql);
echo "
		<center><span class=\"texto\">Você realmente deseja apagar o evento?</span><br><br>
		<a href=\"index.php?editeventos&i1=3&i2=" . $rsql['id_ar'] . "&i3=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "areven_novo"){

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Novo Evento</span><hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" action=\"\">
		<table>
		<tr><td><span class=\"texto\">Nome ou descrição:</span></td><td><input type=\"text\" name=\"descricao\"></td></tr>
		<tr><td><span class=\"texto\">Data:</span></td><td><input type=\"text\" name=\"data\"></td></tr>
		<tr><td><span class=\"texto\">Hora:</span></td><td><input type=\"text\" name=\"hora\"></td></tr>
		<tr><td><span class=\"texto\">Local:</span></td><td><input type=\"text\" name=\"local\"></td></tr>
		<tr><td><span class=\"texto\">Link:</span></td><td><input type=\"text\" name=\"link\"></td></tr>
		<tr><td></td><td><button type=\"submit\" name=\"cadastrar\" value=\"Cadastrar\">Cadastrar</button></td></tr>
		</table>
		</form>
		</span>";
}






////////////////////////////////////////////////////////////
/////////////////////ARTISTAS NOTICIAS
/////////////////////////////////////////////////////////////

if($ua == "arnoti_ver"){
$csql = mysql_query("select * from noticias where id = '$idu';");
$rsql = mysql_fetch_array($csql);
$dat = explode("-", $rsql['data']);

echo "
		<span class=titulo>" . $rsql['nome'] . "</span>
		<hr color=\"#cccccc\" size=\"1\">
		<span class=texto>
		<b>Descrição: </b>" . $rsql['descricao'] . "<br>
		<b>Data: </b>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . "<br>
		<b>Hora: </b>" . $rsql['hora'] . "<br>
		</span>";
}

if($ua == "arnoti_edit"){
$csql = mysql_query("select * from noticias where id = '$idu';");
$rsql = mysql_fetch_array($csql);

echo "
	<span class=\"texto\">
	<form action=\"\" method=\"post\">
	<table>
	<tr><td>Nome: </td><td><input id=\"cordoinput\" name=\"nome\" type=\"text\" value=\"" . $rsql['nome'] . "\"></td></tr>
	<tr><td>Descrição: </td><td><textarea id=\"cordoinput\" name=\"descricao\" type=\"text\" row=\"5\" cols=\"60\">" . $rsql['descricao'] . "</textarea></td></tr>
	<tr><td>Data: </td><td><input id=\"cordoinput\" name=\"data\" type=\"text\" value=\"" . $rsql['data'] . "\"></td></tr>
	<tr><td>Hora: </td><td><input id=\"cordoinput\" name=\"hora\" type=\"text\" value=\"" . $rsql['hora'] . "\"></td></tr>
	<tr><td></td><td><input id=\"cordoinput\" name=\"alterar\" type=\"submit\" value=\"Alterar\"></td></tr>
	</table>
	</form>
	</span>";
}

if($ua == "arnoti_del"){
$csql = mysql_query("select * from noticias where id = '$idu';");
$rsql = mysql_fetch_array($csql);
echo "
	<center><span class=\"texto\">Você realmente deseja apagar a noticia?</span><br><br>
	<a href=\"index.php?editnoticias&i1=3&i2=" . $rsql['id_ar'] . "&i3=" . $idu . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"pfclose\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}

if($ua == "arnoti_novo"){

echo "
		<span class=\"texto\">
		<span class=\"titulo\">Nova Noticia</span><hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" action=\"\">
		<table>
		<tr><td><span class=\"texto\">Nome:</span></td><td><input type=\"text\" name=\"nome\"></td></tr>
		<tr><td><span class=\"texto\">Descrição:</span></td><td><textarea name=\"descricao\" type=\"text\" row=\"5\" cols=\"60\"></textarea></td></tr>
		<tr><td><span class=\"texto\">Data:</span></td><td><input type=\"text\" name=\"data\"></td></tr>
		<tr><td><span class=\"texto\">Hora:</span></td><td><input type=\"text\" name=\"hora\"></td></tr>
		<tr><td></td><td><input type=\"submit\" name=\"cadastrar\" value=\"Criar\"></td></tr>
		</table>
		</form>
		</span>";
}
?>