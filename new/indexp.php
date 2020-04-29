<?php include "engine/cabecap.php"; ?>
<style>
body {
  margin:0;
  padding:0;
  text-align:center;
}
img.pr1{
    border: 1px solid #cccccc;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px; 
}
a.classe1:link, a.classe1:visited {
font-family: Verdana, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #555555;
	}
a.classe1:hover {
font-family: Verdana, Arial, Helvetica, sans-serif;
	text-decoration: underline; 
	color: #555555;
}
a.classe1:active {
font-family: Verdana, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #555555;
	}
.textou {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; text-decoration: none;}
.texto {font-family: tahoma; font-size: 14px; color: #666666; text-decoration: none;}
</style>
<div style="position: relative; left: 0px; top: 2px; text-align: justify;" align="left">
<img width="57" height="57" src="fotos/<?php echo "$row[foto]"; ?>" align="left" class="pr1">
<div align="center"><span class="texto">Voce esta logado como<br><?php echo $row['nome'] . " " . $row['sobrenome']; ?></span><br>
<a href="sairp.php" class="classe1"><span class="texto">Sair</span></a>
</div>
</div>
