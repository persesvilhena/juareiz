<?php
//if(isset($_GET[NULL])) {
//include "include/index/index.php";
//$titulopag = "Show Me - Home";	
//}


//if(isset($_GET["index"])) {
//include "include/index/index.php";
//$titulopag = "Show Me - Home";	
//}


//if(isset($_GET["artistas"])) {
//include "include/index/artistas.php";
//$titulopag = "Show Me - Artistas";		
//}


//if(isset($_GET["cadastro"])) {
//include "include/index/cadastro.php";
//$titulopag = "Show Me - Cadastro";		
//}


//if(isset($_GET["noticias"])) {
//include "include/index/noticias.php";
//$titulopag = "Show Me - Noticias";		
//}


//if(isset($_GET["sobre"])) {
//include "include/index/sobre.php";	
//$titulopag = "Show Me - Sobre";	
//}


//if(isset($_GET["agenda"])) {
//include "include/index/agenda.php";	
//$titulopag = "Show Me - Agenda";	
//}


//if(isset($_GET["buscar"])) {
//include "include/busca/index.php";	
//$titulopag = "Show Me - Buscar";	
//}


//if(isset($_GET["usindex"])) {
//echo "<iframe src=\"us/index.php\" width=690 frameborder=0 height=600></iframe>";
//}


//if(isset($_GET["artista"])) {
//include "include/index/artista.php";	
//}


//if(isset($_GET["editamigos"])) {
//include "include/index/editamigos.dll";	
//}


//if(isset($_GET["editgrupos"])) {
//include "include/grupos/editar.dll";
//}


//if(isset($_GET["grupos"])) {
//include "include/grupos/index.dll";
//}


//if(isset($_GET["criargrupo"])) {
//include "include/grupos/criar.dll";
//}
?>

<?php
if(isset($_GET["perses"])) {
echo "<div style=\"background-color: #ff0000; weidth: 700px; height: 400px;\">
<span style=\"font-family: Verdana; font-size: 16px; color: #000000;\"><br><br><br><br><br>
Eu mergulhei o meu dedo indicador no sangue úmido do seu impotente e louco redentor, e escrevi na borda da sua coroa de espinhos: O verdadeiro príncipe do mal - o rei dos escravos!</span></div>";
}
?>

<?php
if(isset($_GET['p'])){$pag = $class->antisql($_GET['p']);} else {$pag = null;}
if($pag == "home") {
include "include/pag/index.php";
$titulopag = "Show Me - Home";	
}



if($pag == null) {
include "include/pag/index.php";
$titulopag = "Show Me - Home";	
}



if($pag == "artistas") {
include "include/pag/artistas.php";
$titulopag = "Show Me - Artistas";		
}



if($pag == "faq") {
include "include/pag/faq.php";
$titulopag = "Show Me - Cadastro";	
}



if($pag == "noticias") {
$pagina = "home.php?p=noticias&i1=" . $i1 . "&i2=" . $i2;
include "include/pag/noticias.php";
$titulopag = "Show Me - Noticias";	
}



if($pag == "sobre") {
include "include/pag/sobre.php";	
$titulopag = "Show Me - Sobre";	
}



if($pag == "agenda") {
$pagina = "home.php?p=agenda&i1=" . $i1 . "&i2=" . $i2;
include "include/pag/agenda.php";
$titulopag = "Show Me - Agenda";
}



if($pag == "busca") {
include "include/busca/index.php";
$titulopag = "Show Me - Buscar";	
}



if($pag == "artista") {
$pagina = "home.php?p=artista&i1=" . $i1 . "&i2=" . $i2;
include "include/pag/artista.php";
$titulopag = "Show Me - Artista";	
}



if($pag == "eventos") {
$pagina = "home.php?p=eventos&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/eventos.php";
$titulopag = "Show Me - Artista";	
}



if($pag == "news") {
$pagina = "home.php?p=news&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/noticias.php";
$titulopag = "Show Me - Artista";	
}

?>


<div align="center"><span class="subtitulo">Show Me 2013-2014</span></div>