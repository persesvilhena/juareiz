<?php
$mensagem_erro = "";
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
$csql = mysql_query("SELECT * FROM artista WHERE id='$i2'");
$rsql = mysql_fetch_array($csql);
$csql2 = mysql_query("SELECT * FROM est_musical WHERE id='$rsql[est_musical]'");
$rsql2 = mysql_fetch_array($csql2);
	if ($rsql['musicas'] == 1){ $mus = "Proprias"; }
	if ($rsql['musicas'] == 2){ $mus = "Covers"; }
	if ($rsql['musicas'] == 3){ $mus = "Mistas"; }
echo "
<div style=\"float: left; width: 484px; padding: 2px;\">
<span class=\"titulo\">" . $rsql['nome'] . "</span>
<hr color=\"#cccccc\" size=\"1\">
<img width=\"198\" src=\"fotos/" . $rsql['foto'] . "\" style=\"max-height: 200px; float: left;\" class=\"pr1\">


<span class=\"texto\">
<b>Estilo Musical:</b> " . $rsql2['nome'] . "<br>
<b>Musicas:</b> " . $mus . "<br>
<b>Cidade:</b> " . $rsql['cidade'] . "<br>
<b>Estado:</b> " . $rsql['estado'] . "<br>
<b>Descricao:</b> " . $rsql['descricao'] . "<br>
</span>
</div>

<div style=\"float: right; width: 200px;\">
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
</div>


<div style=\"clear: both;\"></div>

<div style=\"float: left; width: 340px; margin: 2px;\">
<hr color=\"#cccccc\" size=\"1\">
<span class=\"titulo\"><a href=home.php?p=eventos&i1=1&i2=" . $i2 . " class=classe1>Eventos:</a></span><br>";
$agendasql = mysql_query("SELECT * FROM agenda where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 3");
 while($ragendasql=mysql_fetch_array($agendasql)){
 	$dat = explode("-", $ragendasql['data']);
echo "<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . ": </span><span class=texto><a href=home.php?p=eventos&i1=2&i2=" . $ragendasql['id'] . " class=classe1>" . $ragendasql['descricao'] . "</a></span><br>";
}
echo "
</div>

<div style=\"float: right; width: 340px; margin: 2px;\">
<hr color=\"#cccccc\" size=\"1\">
<span class=\"titulo\"><a href=home.php?p=news&i1=1&i2=" . $i2 . " class=classe1>Noticias:</a></span><br>";
$agendasql = mysql_query("SELECT * FROM noticias where id_ar = '$i2' ORDER BY id DESC LIMIT 0 , 3");
 while($ragendasql=mysql_fetch_array($agendasql)){
 	$dat = explode("-", $ragendasql['data']);
echo "<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . ": </span><span class=texto><a href=home.php?p=news&i1=2&i2=" . $ragendasql['id'] . " class=classe1>" . $ragendasql['descricao'] . "</a></span><br>";
}


echo"
</div>


<div>

<div style=\"clear: both;\"></div>
<hr color=\"#cccccc\" size=\"1\" style=\"margin-top: 5px;\"><span class=\"texto\">
<span class=\"titulo\">Musicas:</span><br>";
	$musicascsql = mysql_query("SELECT * FROM musicas WHERE id_ar = '$i2' limit 0 , 3;");
	while($musicasrsql = mysql_fetch_array($musicascsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 214px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" />
		</object>
		</center>
		<br><span class=\"titulo\"><center><a href=home.php?p=artista&i1=18&i2=" . $musicasrsql['id'] . " class=classe1>" . $musicasrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"home.php?p=artista&i1=8&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Fotos:</span><br>
";
$res = mysql_query("SELECT * FROM `album_ar` where us='$i2' limit 0,4;");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"cordoinput\" style=\"position: relative; width: 131px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=home.php?p=artista&i1=14&i2=" . $escrever['id'] . "><img src=albumar/" . $escrever['nome'] . " style=\"width: 131px; height: 105px;\"></a><br>

 ";
 echo "</div>";
}
echo"
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"home.php?p=artista&i1=4&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Videos:</span><br>";
	$videoscsql = mysql_query("SELECT * FROM videos WHERE id_ar = '$i2' limit 0 , 2;");
	while($videosrsql = mysql_fetch_array($videoscsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 329px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $videosrsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $videosrsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $videosrsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"329\",
        	height: \"185\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=home.php?p=artista&i1=17&i2=" . $videosrsql['id'] . " class=classe1>" . $videosrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"home.php?p=artista&i1=7&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>


<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Discografia</span><br>";
$disccsql = mysql_query("SELECT * FROM disc WHERE id_ar = '$i2' limit 0,4;");
while($discrsql = mysql_fetch_array($disccsql)){
	if($discrsql['capa'] == null){ $capa = "semcapa.jpg"; }else{ $capa = $discrsql['capa']; }
	echo "
	<div id=\"item\" style=\"position: relative; width: 156px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
	<a href=home.php?p=artista&i1=19&i2=" . $discrsql['id'] . "><img src=\"uploads/imgs/" . $capa . "\" width=\"156\"></a><br>
	<span class=\"titulo\"><center><a href=home.php?p=artista&i1=19&i2=" . $discrsql['id'] . " class=classe1>" . $discrsql['nome'] . "</a><br></span>
	<span class=\"texto\">
	</div>";
}
echo "
<div style=\"clear: both;\"></div>
<div align=\"right\">
<a href=\"home.php?p=artista&i1=9&i2=" . $i2 . "\" class=\"classe1\">Ver Mais</a>
</div>


<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Propaganda</span>

<hr color=\"#cccccc\" size=\"1\"><span class=\"texto\">
<span class=\"titulo\">Posts:</span>";

$com_idtipo = "14";
$com_idsubtipo = $i2;

include("engine/com/comentar.php");


include("engine/com/index.php");



echo "</center></span></div>




";

}

















if ($i1 == 4){
$csql = mysql_query("SELECT * FROM artista WHERE id='$i2'");
$rsql = mysql_fetch_array($csql);
echo "<span class=titulo>Fotos de " . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">";
$res = mysql_query("SELECT * FROM `album_ar` where us='$i2';");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"cordoinput\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=home.php?p=artista&i1=14&i2=" . $escrever['id'] . "><img src=albumar/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
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
		<div id=\"item\" style=\"position: relative; width: 329px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $videosrsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $videosrsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $videosrsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"329\",
        	height: \"185\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=home.php?p=artista&i1=17&i2=" . $videosrsql['id'] . " class=classe1>" . $videosrsql['nome'] . "</a><br></span>
		</center>
		</div>
		<div style=\"clear: both;\"></div>
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
		<div id=\"item\" style=\"position: relative; width: 200px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" />
		</object>
		</center>
		<br><span class=\"titulo\"><center><a href=home.php?p=artista&i1=18&i2=" . $musicasrsql['id'] . " class=classe1>" . $musicasrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
	echo "<div style=\"clear: both;\"></div>";
}


if ($i1 == 9){
$cont = 0;
$iii = "";
echo "<span class=\"titulo\">Discografia</span><br>";
$disccsql = mysql_query("SELECT * FROM disc WHERE id_ar = '$i2';");
while($discrsql = mysql_fetch_array($disccsql)){
	$cont++;
	$rest = $cont % 4;
	if($rest == 0){ $iii = "<div style=\"clear: both;\"></div>"; }
	if($discrsql['capa'] == null){ $capa = "semcapa.jpg"; }else{ $capa = $discrsql['capa']; }
	echo "
	<div id=\"item\" style=\"position: relative; width: 156px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
	<a href=home.php?p=artista&i1=19&i2=" . $discrsql['id'] . "><img src=\"uploads/imgs/" . $capa . "\" width=\"156\"></a><br>
	<span class=\"titulo\"><center><a href=home.php?p=artista&i1=19&i2=" . $discrsql['id'] . " class=classe1>" . $discrsql['nome'] . "</a><br></span>
	<span class=\"texto\">
	</div>";
	echo $iii;
}
echo "<div style=\"clear: both;\"></div>";
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




if ($i1 == 14){
$qfoto = mysql_query("select * from album_ar where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
 echo "<a href=\"home.php?p=artista&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; 

echo "<center><img src=\"albumar/" . $rfoto['nome'] . "\" style=\"max-width: 690px; max-height: 1500px;\"></center><hr size=\"1\" color=\"#cccccc\">";
echo "<span class=\"titulo\">Descricao: </span><span class=\"texto\">" . $rfoto['descricao'] . "<br>";
echo "<br> ";
	$com_idtipo = "11";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");

}




if ($i1 == 17){
$csql = mysql_query("select * from videos where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	<div id=\"myElement" . $rsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $rsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $rsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"690\",
        	height: \"388\"
    	});
		</script>
	<span class=\"texto\">" . $rsql['descricao'] . "</span>

	";

	$com_idtipo = "7";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");

}




if ($i1 == 18){
	$csql = mysql_query("select * from musicas where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" />
		</object>
		</center>
	<span class=\"texto\">" . $rsql['descricao'] . "</span>

	";
	$com_idtipo = "4";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}


if ($i1 == 19){
	$csql = mysql_query("select * from disc where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	<center>
	<img src=\"uploads/imgs/" . $rsql['capa'] . "\" width=\"690\">
	</center>
	<span class=\"texto\">
	<b>Nome do album: </b> " . $rsql['nome'] . "<br>
	<b>Data de lançamento: </b> " . $rsql['data'] . "<br>
	<b>Duração do album: </b> " . $rsql['duracao'] . "<br>
	<b>Descrição: </b> " . $rsql['descricao'] . "
	</span><br>

	";
	$cmus = mysql_query("select * from disc_musicas where id_album = '$i2';");
	while($rmus = mysql_fetch_array($cmus)){
		echo "<a href=\"home.php?p=artista&i1=20&i2=" . $rmus['id'] . "\" class=\"classe1\"><span class=\"texto\">" . $rmus['numero'] . ". " . $rmus['nome'] . "</span></a><br>";
	}
	$com_idtipo = "8";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}






if ($i1 == 20){
	$csql = mysql_query("select * from disc_musicas where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	$qtddevotos = mysql_query("SELECT count(*) FROM `pt_musica` WHERE id_mus = '$i2'");
	$rqtddevotos = mysql_fetch_array($qtddevotos);
	$medianota = mysql_query("SELECT avg(nota) FROM `pt_musica` WHERE id_mus = '$i2'");
	$rmedianota = mysql_fetch_array($medianota);
	$nota = $rmedianota['avg(nota)'] * 10;
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	";
	if($rsql['musica'] != null){ echo "<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['musica'] . "&down=1\" />
		</object>
		</center>"; }
	echo "
	<span class=\"texto\">
	<b>Nome: </b> " . $rsql['nome'] . "<br>
	<b>Numero: </b> " . $rsql['numero'] . "<br>
	<b>Composicao: </b> " . $rsql['composicao'] . "<br>
	<b>Duração: </b> " . $rsql['duracao'] . "<br>
	<b>Letra: </b> " . $rsql['letras'] . "<br>
	<b>Descrição: </b> " . $rsql['descricao'] . "
	</span>
	<hr size=\"1\" color=\"#cccccc\"><span class=\"titulo\">Nota:</span><br>
	<div style=\"float: left; border-right: 1px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Vote:</span><br>
	<a href=\"index.php?discmusicas&i1=6&i2=" . $i2 . "&i3=1\" class=\"classe4\"><img src=\"engine/imgs/like.png\"></a>
	<a href=\"index.php?discmusicas&i1=6&i2=" . $i2 . "&i3=0\" class=\"classe4\"><img src=\"engine/imgs/nlike.png\"></a>
	</center></div>
	<div style=\"float: left; border-right: 1px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Quantidade de votos:</span><br>
	<span class=\"titulo\">" . $rqtddevotos['count(*)'] . "</span>
	</center></div>
	<div style=\"float: left; border-right: 0px solid #cccccc; padding: 5px; margin: 5px;\"><center>
	<span class=\"texto\">Nota:</span><br>
	<span class=\"titulo\">" . number_format($nota, 0) . "</span>
	</center></div>
	<div style=\"clear: both;\"></div>
	<hr size=\"1\" color=\"#cccccc\">
	";
	$com_idtipo = "9";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
}
?>

