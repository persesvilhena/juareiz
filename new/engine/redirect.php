<?php

if(isset($_GET["index"])) {
$pagina = "index.php?index&p4=" . $p4;
include "include/index/index.php";
$titulopag = "Show Me - $nome";	
//$pagina = "index";
}
?>
<?php
if(isset($_GET["indexband"])) {
$pagina = "index.php?indexband&p4=" . $p4;
include "include/index/indexband.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["perfil"])) {
$pagina = "index.php?perfil";
include "include/perfil/index.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["perfilalterar"])) {
include "include/perfil/alterar.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["perfilalterar2"])) {
include "include/perfil/alterar2.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["msg"])) {
include "include/correio/index.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["contatos"])) {
$pagina = "contatos";
include "include/contatos/index.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["user"])) {
$pagina = "index.php?user&i1=1&i2=" . $i2;
include "include/user/index.php";
$titulopag = "Show Me - $nome";	
}
?>
<?php
if(isset($_GET["allusers"])) {
include "include/user/all.php";
$titulopag = "$nome - Users";	
}
?>
<?php
if(isset($_GET["album"])) {
$pagina = "index.php?album&i1=" . $i1 . "&i2=" . $i2;
include "include/fotos/index.php";
$titulopag = "$nome - Fotos";	
}
?>
<?php
if(isset($_GET["artista"])) {
include "include/artista/index.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["verart"])) {
$pagina = "index.php?verart&i1=1&i2=" . $i2;
include "include/artista/ver.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["eventos"])) {
$pagina = "index.php?eventos&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/eventos.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["noticias"])) {
$pagina = "index.php?noticias&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/noticias.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["editart"])) {
$pagina = "index.php?editart&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/editar.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["editmem"])) {
include "include/artista/editarmembro.php";
$titulopag = "$nome - Artista";	
}
?>
<?php
if(isset($_GET["artalbum"])) {
$pagina = "index.php?artalbum&i1=" . $i1 . "&i2=" . $i2 ."&i3=" . $i3;
include "include/artista/fotos.php";
$titulopag = "$nome - Album";	
}
?>
<?php
if(isset($_GET["links"])) {
include "include/links/index.php";
$titulopag = "$nome - Links";	
}
?>
<?php
if(isset($_GET["videos"])) {
$pagina = "index.php?videos&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/videos/index.php";
$titulopag = "$nome - Videos";	
}
?>
<?php
if(isset($_GET["config"])) {
include "include/index/config.php";
$titulopag = "$nome - Configuracao";	
}
?>
<?php
if(isset($_GET["editeventos"])) {
include "include/artista/editar_eventos.php";
$titulopag = "$nome - Eventos";	
}
?>
<?php
if(isset($_GET["editnoticias"])) {
include "include/artista/editar_noticias.php";
$titulopag = "$nome - Noticias";	
}
?>
<?php
if(isset($_GET["musicas"])) {
$pagina = "index.php?musicas&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/musicas/index.php";
$titulopag = "$nome - Musicas";	
}
?>
<?php
if(isset($_GET["armusicas"])) {
$pagina = "index.php?armusicas&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/ar_musicas/index.php";
$titulopag = "$nome - Art Musicas";	
}
?>
<?php
if(isset($_GET["arvideos"])) {
$pagina = "index.php?arvideos&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/ar_videos/index.php";
$titulopag = "$nome - Art Videos";	
}
?>
<?php
if(isset($_GET["discografia"])) {
$pagina = "index.php?discografia&i1=" . $i1 . "&i2=" . $i2;	
include "include/artista/disc/index.php";
$titulopag = "$nome - Discografia";	
}
?>
<?php
if(isset($_GET["discmusicas"])) {
$pagina = "index.php?discmusicas&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/disc/Musicas.php";
$titulopag = "$nome - Musicas";	
}
?>
<?php
if(isset($_GET["buscar"])) {
include "include/buscar/index.php";
$titulopag = "$nome - Buscar";	
}
?>
<?php
if(isset($_GET["teste"])) {
$pagina = "index.php?teste";
include "include/teste.php";
$titulopag = "$nome - Teste";	
}
?>
<?php
if(isset($_GET["rank"])) {
$pagina = "index.php?rank";
include "include/rank/index.php";
$titulopag = "$nome - Rank";	
}
?>
<div style="clear: both;"></div>
<div style="height: 100px;"></div>