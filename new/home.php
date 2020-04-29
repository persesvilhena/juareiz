<html>
<head>
<?php 
include "engine/conexao.php"; 
include "engine/functions.php";
date_default_timezone_set("Brazil/East");
$date = date("Y-m-d H:m:s");
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="engine/js/jquery.js" type="text/javascript"></script>
<script src="engine/js/utils.js" type="text/javascript"></script>
<script src="engine/js/validation.js" type="text/javascript"></script>
<script src="engine/js/thumbnails.js" type="text/javascript"></script>
<script src="engine/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="jwplayer.js"></script>
<link rel="shortcut icon" href="engine/imgs/icone.ico">
<link rel="stylesheet" type="text/css" href="engine/css/style.css">
<?php
if(isset($_GET['i1'])){$i1 = $class->antisql($_GET['i1']);} else {$i1 = null;}
if(isset($_GET['i2'])){$i2 = $class->antisql($_GET['i2']);} else {$i2 = null;}
if(isset($_GET['i3'])){$i3 = $class->antisql($_GET['i3']);} else {$i3 = null;}
if(isset($_GET['i4'])){$i4 = $class->antisql($_GET['i4']);} else {$i4 = null;}
if(isset($_GET['p1'])){$p1 = $class->antisql($_GET['p1']);} else {$p1 = null;}
if(isset($_GET['p2'])){$p2 = $class->antisql($_GET['p2']);} else {$p2 = null;}
if(isset($_GET['p3'])){$p3 = $class->antisql($_GET['p3']);} else {$p3 = null;}
if(isset($_GET['p4'])){$p4 = $class->antisql($_GET['p4']);} else {$p4 = null;}
if(isset($_GET['z1'])){$z1 = $class->antisql($_GET['z1']);} else {$z1 = null;}
if(isset($_GET['z2'])){$z2 = $class->antisql($_GET['z2']);} else {$z2 = null;}
if(isset($_GET['u'])){$u = $class->antisql($_GET['u']);} else {$u = null;}
if(isset($_POST['eurl'])){$eurl = $class->antisql($_POST['eurl']);} else {$eurl = null;}
?>
</head>
<script>
    <!--
    function Carregado() {
      Msg_Carregando.style.display='none';
      pagina.style.display='block';
    }
    -->
</script>
</head>
<body OnLoad="Carregado()">
<div id="Msg_Carregando">
	<script>
		<!--
		document.write('<div style="margin: 0 auto;"><img src = "files/imgs/loader.gif"> <br><span class="titulo">Carregando...</span></div>')
		-->
	</script>
</div>

<script>
    <!--
    document.write('<div id="pagina" style="display: none;">')
    -->
</script>
<div id="pfmask"></div>

<div id="barrasuperior" align="center" style="z-index: 999;">
	<div id="center">
		<img src="engine/imgs/LOGOB1.png" align="left" height="60" style="margin-top: 3px;">

		<div style="margin-left: 420px; height: 70px; width: 200px;" align="center">
			<form method="post" action="index.php?p=buscar">
			<input type="text" name="login" id="input1"><br><button type="submit" name="buscar" value="Buscar" id="input2"><img src="engine/imgs/procurar.png"></button>
			</form>
		</div>

		<div style="margin-top: -70px;">
			<iframe src="indexp.php" width="365" height="65" frameborder="0" scrolling="no" align="right"></iframe>
		</div>
	</div>
</div>



<div id="center" style="margin-top: 75px;">
	<div id="conteudo355" style="position: relative; left: 0px; top: 4px; width: 1002px;  text-align: justify;" align="left">
		<?php include "include/pag/cabeca.php"; ?>
	</div>
	<div style="position: relative; left: 0px; top: 6px; width: 1000px; text-align: justify;" align="left">
		<div id="conteudo3" style="position: absolute; left: 0px; top: 3px; width: 150px; text-align: justify;" align="left">
			<?php include "include/pag/ble.php"; ?>
		</div>
		<div id="kljkljk" style="position: absolute; left: 156px; top: 3px; width: 690px; text-align: justify;" align="left">
			<?php include "engine/redirect1.php"; ?>
		</div>
		<div id="conteudo3" style="position: absolute; left: 850px; top: 3px; width: 150px; text-align: justify;" align="left">
			<?php include "include/pag/bld.php"; ?>
		</div>
	</div>
</div>



<title><?php echo "$titulopag"; ?></title>

<div id="boxes">
	<div id="pfdialog" class="pfwindow">
		<div align="right">
			<a href="#" class="pfclose"><img src="engine/imgs/cancela.png"></a>
		</div>
		<div id="conteudobox" align="left">

		</div>
	</div>
</div>

</body>
</html>