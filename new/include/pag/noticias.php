<?php
if ($i1 == 1) {
echo "
<div id=\"cj\"><span class=\"titulo\">Not&iacute;cias</span></div>
<div id=\"fj\">";
$res = mysql_query("SELECT * FROM `news` ORDER BY `news`.`id` DESC");
echo "
<div class=\"tabela1\">
<table>
<tr>
<td width=520>Noticia</td>
<td width=80>Autor</td>
<td width=100>Data</td>
</tr>";
  while($escrever=mysql_fetch_array($res)){
  echo "<tr>
  <td><a href=\"home.php?p=noticias&i1=2&i2=" . $escrever['id'] . "\" class=\"classe1\">" . $escrever['titulo'] . "</a></td>
  <td><span class=\"texto\">" . $escrever['autor'] . "</span></td>
  <td><span class=\"texto\">" . $escrever['data'] . "</span></td>
  </tr>";
  }
echo "
</table>
</div>
</div>
";
}
if ($i1 == 2) {
$sql2 = mysql_query("SELECT * FROM news WHERE id='$i2'");
$res2 = mysql_fetch_array($sql2);
echo "<div id=\"cj\"><span class=\"titulo\">" . $res2['titulo'] . "</span></div>";
echo "<div id=\"fj\"><br>" . $res2['conteudo'] . "<br><br>Autor: " . $res2['autor'] . "<br>Data: " . $res2['data'] . "
</div>
";
$com_idtipo = "2";
$com_idsubtipo = $i2;

include("engine/com/comentar.php");


include("engine/com/index.php");

//	echo "<span class=\"texto\"><center>Para vizualizar os comentarios é necessario estar logado!</center></span>";


}
?>
