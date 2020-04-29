<?php
$mensagem_erro = "";
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
$csql = mysql_query("SELECT * FROM artista WHERE id='$i2'");
$rsql = mysql_fetch_array($csql);
$csql2 = mysql_query("SELECT * FROM est_musical WHERE id='$rsql[est_musical]'");
$rsql2 = mysql_fetch_array($csql2);
$csql4 = mysql_query("SELECT * FROM membros WHERE id_us = '$id' and id_ar = '$i2'");
$rsql4 = mysql_fetch_array($csql4);
	if ($rsql['musicas'] == 1){ $mus = "Proprias"; }
	if ($rsql['musicas'] == 2){ $mus = "Covers"; }
	if ($rsql['musicas'] == 3){ $mus = "Mistas"; }
$seguir = mysql_query("SELECT * FROM seguir WHERE deid='$id' and artid='$i2'");
echo "<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: 0px;\">
<span class=\"titulo\">" . $rsql['nome'] . "</span>";
if ($rsql4['adm'] == 1){
echo " <a href=\"index.php?editart&i1=1&i2=" . $rsql['id'] . "\" class=\"botao\">Editar Banda</a>";
}
echo "
<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<b>Estilo Musical:</b> " . $rsql2['nome'] . "<br>
<b>Musicas:</b> " . $mus . "<br>
<b>Cidade:</b> " . $rsql['cidade'] . "<br>
<b>Estado:</b> " . $rsql['estado'] . "<br>
<b>Descricao:</b> " . $rsql['descricao'] . "<br></span>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Musicas:</span><br>";
	$musicascsql = mysql_query("SELECT * FROM musicas WHERE id_ar = '$i2' limit 0 , 2;");
	while($musicasrsql = mysql_fetch_array($musicascsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 279px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" />
		</object>
		</center>
		<br><span class=\"titulo\"><center><a href=index.php?musicas&i1=5&i2=" . $musicasrsql['id'] . " class=classe1>" . $musicasrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"index.php?verart&i1=8&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Fotos:</span><br>
";
$res = mysql_query("SELECT * FROM `album_ar` where us='$i2' limit 0,4;");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"item\" style=\"position: relative; width: 131px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=\"#pfdialog\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('" . $escrever['id'] . "','ftar');\"><img src=albumar/" . $escrever['nome'] . " style=\"width: 131px; height: 105px;\"></a><br>

 ";
 echo "</div>";
}
echo"
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"index.php?verart&i1=4&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Videos:</span><br>";
	$videoscsql = mysql_query("SELECT * FROM videos WHERE id_ar = '$i2' limit 0 , 2;");
	while($videosrsql = mysql_fetch_array($videoscsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 279px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $videosrsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $videosrsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $videosrsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"279\",
        	height: \"157\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=index.php?videos&i1=5&i2=" . $videosrsql['id'] . " class=classe1>" . $videosrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"index.php?verart&i1=7&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>


<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Discografia</span><br>";
$disccsql = mysql_query("SELECT * FROM disc WHERE id_ar = '$i2' limit 0,3;");
while($discrsql = mysql_fetch_array($disccsql)){
	if($discrsql['capa'] == null){ $capa = "semcapa.jpg"; }else{ $capa = $discrsql['capa']; }
	echo "
	<div id=\"item\" style=\"position: relative; width: 180px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
	<a href=index.php?discografia&i1=5&i2=" . $discrsql['id'] . "><img src=\"uploads/imgs/" . $capa . "\" width=\"180\"></a><br>
	<span class=\"titulo\"><center><a href=index.php?discografia&i1=5&i2=" . $discrsql['id'] . " class=classe1>" . $discrsql['nome'] . "</a><br></span>
	<span class=\"texto\">
	</div>";
}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"index.php?verart&i1=9&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>


<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Propaganda</span>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Posts:</span>";
$contatos = $i2;
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
echo "<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\"><span class=\"texto\">
<form method=\"post\" action=\"\">
<textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"50\"></textarea>
<input id=\"cordoinput\" type=\"submit\" name=\"arpost\" value=\"Postar\">
</form>
</span></div>";
}
$idartista = $i2;
include ("engine/postagemar.php");

echo "
</div>




<div style=\"border: 0px solid #000000; min-height: 300px; width: 200px; position: absolute; left: 594px; top: 0px;\">
<img width=\"198\" src=\"fotos/" . $rsql['foto'] . "\" style=\"max-height: 200px;\" class=\"pr1\"><br><hr color=\"#cccccc\" size=\"1\">";
if (mysql_num_rows($seguir) > 0){
echo "<a href=\"index.php?verart&i1=3&i2=" . $i2 . "\" class=\"menu2\">Seguindo</a>";
} else {
echo "<a href=\"index.php?verart&i1=2&i2=" . $i2 . "\" class=\"menu2\">Seguir</a>";
}
echo "<hr size=\"1\" color=\"#cccccc\">
<span class=\"titulo\">Membros:</span><br>

";
$cont = 0;
$memsql = mysql_query("SELECT * FROM membros where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 100");
 while($rmemsql=mysql_fetch_array($memsql)){
	$usersql = mysql_query("SELECT * FROM user WHERE id = '$rmemsql[id_us]'");
	$rusersql = mysql_fetch_array($usersql);
	$cont = $cont + 1;
	$mod = $cont % 2;
 	if ($mod == 0){ $iii = "<div style=\"clear: both;\"></div>"; } else { $iii = ""; }
//echo "" . $rusersql['nome'] . "intrum:" . $rinstsql['nome'] . "";
echo "<div id=\"item\" style=\"position: relative; width: 84px; float: left; margin: 2px; text-align: justify; padding: 5px;\">";
echo "<a href=index.php?user&i1=1&i2=" . $rusersql['id'] . "><img src=\"fotos/" . $rusersql['foto'] . "\" width=\"84\" height=\"80\"></a>
<br><span class=\"texto10\"><center><a href=index.php?user&i1=1&i2=" . $rusersql['id'] . " class=classe1>" . $rusersql['nome'] . " " . $rusersql['sobrenome'] . "</a><br>
"; 

$ct = 0;
$imsql = mysql_query("SELECT * FROM membro_instrumento where id_us = '$rmemsql[id_us]' and id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 100");
 while($rimsql=mysql_fetch_array($imsql)){
 	
 	
 	$instsql = mysql_query("SELECT * FROM instrumentos WHERE id = '$rimsql[id_ins]'");
	$rinstsql = mysql_fetch_array($instsql);
	$ct = $ct + 1;
	if($ct < 2){ echo $rinstsql['nome']; }else{ echo ", " . $rinstsql['nome']; }

}
echo "</center></span>
</div>";
echo $iii;
}
echo "

<div style=\"clear: both;\">
<br><hr color=\"#cccccc\" size=\"1\">
<span class=\"titulo\"><a href=index.php?eventos&i1=1&i2=" . $i2 . " class=classe1>Eventos:</a></span><br>";
$agendasql = mysql_query("SELECT * FROM agenda where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 3");
 while($ragendasql=mysql_fetch_array($agendasql)){
 	$dat = explode("-", $ragendasql['data']);
echo "<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . ": </span><span class=texto><a href=index.php?eventos&i1=2&i2=" . $ragendasql['id'] . " class=classe1>" . $ragendasql['descricao'] . "</a></span><br>";
}
echo "
<br><hr color=\"#cccccc\" size=\"1\">
<span class=\"titulo\"><a href=index.php?noticias&i1=1&i2=" . $i2 . " class=classe1>Noticias:</a></span><br>";
$agendasql = mysql_query("SELECT * FROM noticias where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 3");
 while($ragendasql=mysql_fetch_array($agendasql)){
 	$dat = explode("-", $ragendasql['data']);
echo "<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . ": </span><span class=texto><a href=index.php?noticias&i1=2&i2=" . $ragendasql['id'] . " class=classe1>" . $ragendasql['descricao'] . "</a></span><br>";
}


echo"
<hr color=\"#cccccc\" size=\"1\">";

echo "</center></span></div>

</div>


";

}






if ($i1 == 2){
$add = mysql_query("INSERT INTO seguir(deid, artid) VALUES('$id', '$i2')") or die(mysql_error()); 
if($add) {
echo "<script>window.location='" . $pagina . "';</script>";
}
else {
echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
}
}











if ($i1 == 3){
$add = mysql_query("delete from seguir where deid = '$row[id]' and artid = '$i2'") or die(mysql_error()); 
if($add) {
echo "<script>window.location='" . $pagina . "';</script>";
}
else {
echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
}
}










if ($i1 == 4){
$csql = mysql_query("SELECT * FROM artista WHERE id='$i2'");
$rsql = mysql_fetch_array($csql);
echo "<span class=titulo>Fotos de " . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">";
$res = mysql_query("SELECT * FROM `album_ar` where us='$i2';");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"item\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=index.php?artalbum&i1=2&i2=" . $i2 . "&i3=" . $escrever['id'] . "><img src=albumar/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
 ";
 echo "</div>";

}
}


if ($i1 == 5){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
$add = mysql_query("update user set idart = '$i2' where id = '$id';") or die(mysql_error()); 
if($add) {
	echo "<script>alert('Ok!');window.location = 'index.php?verart&i1=1&i2=" . $i2 . "';</script>";
}
else {
	echo "<script>alert('Houve um problema!');window.location = 'index.php?verart&i1=1&i2=" . $i2 . "';</script>";
}
}
}

if ($i1 == 6){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
$add = mysql_query("update user set idart = null where id = '$id';") or die(mysql_error()); 
if($add) {
	echo "<script>alert('Ok!');window.location = 'index.php?verart&i1=1&i2=" . $i2 . "';</script>";
}
else {
	echo "<script>alert('Houve um problema!');window.location = 'index.php?verart&i1=1&i2=" . $i2 . "';</script>";
}
}
}


if ($i1 == 7){
	$csql = mysql_query("select * from artista where id = '$i2'");
	$rsql = mysql_fetch_array($csql);
	echo "<span class=\"titulo\">Videos de " . $rsql['nome'] . "</span>
	<hr size=\"1\" color=\"#cccccc\">";
	$videoscsql = mysql_query("SELECT * FROM videos WHERE id_ar = '$i2';");
	while($videosrsql = mysql_fetch_array($videoscsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 381px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $videosrsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $videosrsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $videosrsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"381\",
        	height: \"214\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=index.php?videos&i1=5&i2=" . $videosrsql['id'] . " class=classe1>" . $videosrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
}


if ($i1 == 8){
	$csql = mysql_query("select * from artista where id = '$i2'");
	$rsql = mysql_fetch_array($csql);
	echo "<span class=\"titulo\">Musicas de " . $rsql['nome'] . "</span>
	<hr size=\"1\" color=\"#cccccc\">";
	$musicascsql = mysql_query("SELECT * FROM musicas WHERE id_ar = '$i2';");
	while($musicasrsql = mysql_fetch_array($musicascsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 381px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" />
		</object>
		</center>
		<br><span class=\"titulo\"><center><a href=index.php?musicas&i1=5&i2=" . $musicasrsql['id'] . " class=classe1>" . $musicasrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
}


if ($i1 == 9){
echo "<span class=\"titulo\">Discografia</span><br>";
$disccsql = mysql_query("SELECT * FROM disc WHERE id_ar = '$i2';");
while($discrsql = mysql_fetch_array($disccsql)){
	if($discrsql['capa'] == null){ $capa = "semcapa.jpg"; }else{ $capa = $discrsql['capa']; }
	echo "
	<div id=\"item\" style=\"position: relative; width: 180px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
	<a href=index.php?discografia&i1=5&i2=" . $discrsql['id'] . "><img src=\"uploads/imgs/" . $capa . "\" width=\"180\"></a><br>
	<span class=\"titulo\"><center><a href=index.php?discografia&i1=5&i2=" . $discrsql['id'] . " class=classe1>" . $discrsql['nome'] . "</a><br></span>
	<span class=\"texto\">
	</div>";
}
}


if ($i1 == 10){
echo "<span class=\"titulo\">Melhores Musicas</span><hr size=\"1\" color=\"#cccccc\"><br>";
$mm_csql = mysql_query("
SELECT disc.id_ar,disc_musicas.*,avg(nota),count(*)
FROM `pt_musica`
inner join disc_musicas on disc_musicas.id = pt_musica.id_mus
inner join disc on disc_musicas.id_album = disc.id
where disc.id_ar = '$i2'
group by id_mus 
order by avg(nota) desc;");
echo "<div class=\"tabela1\"><table><tr><td>Nome</td><td width=\"100\">Votos</td><td width=\"100\">Nota</td></tr>";
while($mm_rsql = mysql_fetch_array($mm_csql)){
	echo "
	<tr>
	<td><a href=\"index.php?discmusicas&i1=5&i2=" . $mm_rsql['id'] . "\" class=\"classe1\">" . $mm_rsql['nome'] . "</a></td>
	<td><span class=\"texto\">" . $mm_rsql['count(*)'] . "</span></td>
	<td><span class=\"texto\">" . number_format(($mm_rsql['avg(nota)'] * 10), 0) . "</span></td>
	</tr>
	";
}
echo "</table></div>";
}
?>

