<?php
if ($i1 == 1) {
echo "
<div id=\"cj\"><span class=\"titulo\">Agenda</span></div>
<div id=\"fj\">
<div class=\"tabela1\">
";
$res = mysql_query("SELECT * FROM `agenda` ORDER BY `agenda`.`id` DESC");
echo "<table>
<tr>
<td width=300>Artista</td>
<td width=80>Data</td>
<td width=80>Hora</td>
<td width=120>Estilo Musical</td>
<td width=120>Local</td>
</tr>";
  while($escrever=mysql_fetch_array($res)){
  	$csql_ar = mysql_query("select * from artista where id = '$escrever[id_ar]';");
  	$rsql_ar = mysql_fetch_array($csql_ar);
  	$csql_estilo = mysql_query("select * from est_musical where id = '$rsql_ar[est_musical]';");
  	$rsql_estilo = mysql_fetch_array($csql_estilo);
  echo "<tr>
  <td><a href=\"home.php?p=agenda&i1=2&i2=" . $escrever['id'] . "\" class=\"classe1\">" . $rsql_ar['nome'] . "</a></td>
  <td><span class=\"texto\">" . $escrever['data'] . "</span></td>
  <td><span class=\"texto\">" . $escrever['hora'] . "</span></td>
  <td><span class=\"texto\">" . $rsql_estilo['nome'] . "</span></td>
  <td><span class=\"texto\">" . $escrever['local'] . "</span></td>
  </tr>";
  }
echo "
</table>
</div>
</div>
";
}
if ($i1 == 2) {
$sql2 = mysql_query("SELECT * FROM agenda WHERE id='$i2'");
$res2 = mysql_fetch_array($sql2);
	if ($res2['rev'] == 0){ $rev = "Nao Revisada"; }
	if ($res2['rev'] == 1){ $rev = "Revisada"; }
$csql_ar = mysql_query("SELECT * FROM artista WHERE id='$res2[id_ar]'");
$rsql_ar = mysql_fetch_array($csql_ar);
$csql_estilo = mysql_query("select * from est_musical where id = '$rsql_ar[est_musical]';");
$rsql_estilo = mysql_fetch_array($csql_estilo);
echo "
<div id=\"cj\"><span class=\"titulo\">" . $rsql_ar['nome'] . "</span></div>
<div id=\"fj\"><span class=\"texto\">
<b>Data: </b>" . $res2['data'] . "<br>
<b>Hora: </b>" . $res2['hora'] . "<br>
<b>Local: </b>" . $res2['local'] . "<br>
<b>Estilo Musical: </b>" . $rsql_estilo['nome'] . "<br>
<b>Status: </b>" . $rev . "<br>
<b>Descricao: </b><br>" . $res2['descricao'] . "<br>
</span>
</div>
";
$com_idtipo = "3";
$com_idsubtipo = $i2;
$user_logado_valor = user_logado();
if ($user_logado_valor == 1){
include("engine/protege.php");
include("engine/com/comentar.php");
}

include("engine/com/index.php");
}
?>
