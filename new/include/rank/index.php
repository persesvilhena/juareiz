<?php
$rank_csql = mysql_query("SELECT artista.*,seguir.*,count(*) FROM `artista`
inner join seguir on artista.id = seguir.artid
group by seguir.artid order by count(*) desc;");
echo "<div class=\"tabela1\"><table><tr><td width=\"150\"></td><td>Artista</td><td width=\"20\">Seguidores</td></tr>";
while($rank_rsql=mysql_fetch_array($rank_csql)){
	//echo "<tr><td background=\"fotos/" . $rank_rsql['foto'] . "\" style=\"filter:alpha(opacity=30); opacity:0.30;\">
	//<div style=\"filter:alpha(opacity=100); opacity:1.0;\">" . $rank_rsql['nome'] . "</div></td><td>" . $rank_rsql['count(*)'] . "</td></tr>";
	echo "<tr>
	<td><a href=\"index.php?verart&i1=1&i2=" . $rank_rsql['id'] . "\"><img src=\"fotos/" . $rank_rsql['foto'] . "\" class=\"pr1\" width=\"150\" style=\"max-height: 150px;\"></a></td>
	<td><a href=\"index.php?verart&i1=1&i2=" . $rank_rsql['id'] . "\" class=\"classe1\">" . $rank_rsql['nome'] . "</a></td>
	<td><span class=\"texto\">" . $rank_rsql['count(*)'] . "</span></td>
	</tr>";
}
echo "</table></div>";
?>