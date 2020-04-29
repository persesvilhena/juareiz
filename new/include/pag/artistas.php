<div id="cj"><span class="titulo">Artistas</span></div>
<div id="fj">
<div align="center">
<a href="home.php?p=artistas&i1=1&i2=1" class="classe1">Ordem alfabetica</a> - 
<a href="home.php?p=artistas&i1=1&i2=2" class="classe1">Localidade</a> - 
<a href="home.php?p=artistas&i1=1&i2=3" class="classe1">Genero Musical</a> - 
<a href="home.php?p=artistas&i1=1&i2=4" class="classe1">Tipo de musica</a>
</div>

<?php
$user_logado_valor = user_logado();
if (user_logado()){
  $pagina_do_artista = "index.php?verart";
} else{
  $pagina_do_artista = "home.php?p=artista";
}
if ($i1 == null) {$i1 = 1;}
if ($i1 == 1) {
  if ($i2 == null) {$i2 = 1;}
  if($i2 == 1){ $ordenado = "nome"; }
  if($i2 == 2){ $ordenado = "estado"; }
  if($i2 == 3){ $ordenado = "est_musical"; }
  if($i2 == 4){ $ordenado = "musicas"; }
$res = mysql_query("SELECT * FROM `artista` ORDER BY `artista`.`$ordenado` ASC LIMIT 0, 30 ");
echo "<div class=\"tabela1\">
<table>
<tr>
<td width=450>Artista</td>
<td width=100>Est. Musical</td>
<td width=55>Musicas</td>
<td width=70>Cidade</td>
<td width=35>UF</td>
</tr>";
  while($escrever=mysql_fetch_array($res)){
  $csql_estilo = mysql_query("select * from est_musical where id = '$escrever[est_musical]';");
  $rsql_estilo = mysql_fetch_array($csql_estilo);
	if ($escrever['musicas'] == 1){ $mus = "Proprias"; }
	if ($escrever['musicas'] == 2){ $mus = "Covers"; }
	if ($escrever['musicas'] == 3){ $mus = "Mistas"; }
  echo "
  <tr>
  <td><a href=\"$pagina_do_artista&i1=1&i2=" . $escrever['id'] . "\" class=\"classe1\">" . $escrever['nome'] . "</a></td>
  <td><span class=\"texto\">" . $rsql_estilo['nome'] . "</span></td>
  <td><span class=\"texto\">" . $mus . "</span></td>
  <td><span class=\"texto\">" . $escrever['cidade'] . "</span></td>
  <td><span class=\"texto\">" . $escrever['estado'] . "</span></td>
  </tr>";
  }
echo "</table></div>";
}


?>
</div>