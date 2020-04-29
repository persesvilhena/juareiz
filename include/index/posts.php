<?php
$res2 = mysqli_query($conecta, "SELECT * FROM `amigos` where us1='$id_gen';");
while($escrever2=mysqli_fetch_array($res2)){
$res = mysqli_query($conecta, "SELECT * FROM `post` where us='$escrever2[us2]' ORDER BY id DESC LIMIT 0,100;");
echo "<table><tr><td width=55></td><td></td></tr>";
while($escrever=mysqli_fetch_array($res)){
$res1 = mysqli_query($conecta, "SELECT * FROM `users1` where id='$escrever[us]';");
$escrever1=mysqli_fetch_array($res1);
echo "<tr><td><strong><a href=user.php?uid=" . $escrever['us'] . " class=link><img src=fotos/" . $escrever1['foto'] . " width=50 height=50></a></strong></td><td><h3><a href=verpost.php?uid=" . $escrever['id'] . " class=link>" . $escrever['assunto'] . "</a></h3></td></tr>";
}}
echo "</table>";
?>