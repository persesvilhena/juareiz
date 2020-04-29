<?php
$procurar = $_GET['buscar'];

$bcpessoas = mysql_query("select * from user where (nome like '%$procurar%') or (sobrenome like '%$procurar%') order by nome");
$bcartistas = mysql_query("select * from artista where nome like '%$procurar%' order by nome");

echo "
<span class=\"titulo\">" . $procurar . "</span><hr size=\"1\" color=\"#cccccc\">
<div style=\"border: 0px solid #000000; width: 395px; position: absolute; left: 0px; top: 30px;\">
<span class=\"titulo\">Pessoas</span><hr size=\"1\" color=\"#cccccc\">";
while($rbcpessoas = mysql_fetch_array($bcpessoas)){
	echo "
	<div id=\"item\" style=\"padding: 5px; margin-top: 5px;\">
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\"><img src=\"fotos/" . $rbcpessoas['foto'] . "\" align=\"left\" class=\"pr1\" width=\"100\" height=\"100\"></a>
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\" class=\"linkus\">" . $rbcpessoas['nome'] . " " . $rbcpessoas['sobrenome'] . "</a>
	<div style=\"clear: both;\"></div></div>";
}
echo "
</div>




<div style=\"border: 0px solid #000000; min-height: 300px; width: 395px; position: absolute; left: 399px; top: 30px;\">
<span class=\"titulo\">Artistas</span><hr size=\"1\" color=\"#cccccc\">";
while($rbcartistas = mysql_fetch_array($bcartistas)){
	echo "
	<div id=\"item\" style=\"padding: 5px; margin-top: 5px;\">
	<a href=\"index.php?verart&i1=1&i2=" . $rbcartistas['id'] . "\"><img src=\"fotos/" . $rbcartistas['foto'] . "\" align=\"left\" class=\"pr1\" width=\"100\" height=\"100\"></a>
	<a href=\"index.php?verart&i1=1&i2=" . $rbcartistas['id'] . "\" class=\"linkus\">" . $rbcartistas['nome'] . "</a>
	<div style=\"clear: both;\"></div></div>";
}
echo "

</div>
";
?>