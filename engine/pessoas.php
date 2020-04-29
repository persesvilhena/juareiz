<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "youshare"; /*seleciona o banco a ser usado*/
 $conexao = mysqli_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysqli_select_db($banco); /*seleciona o banco a ser usado*/
 
 $res2 = mysqli_query($conecta, "SELECT * FROM `amigos` where us1='$id_gen';");
$escrever2=mysqli_fetch_array($res2);
$res = mysqli_query($conecta, "SELECT * FROM `post` where us='$escrever2[us2]' ORDER BY id DESC LIMIT 0,100;");
echo "<table><tr><td width=55></td><td></td></tr>";
while($escrever=mysqli_fetch_array($res)){
echo "<tr><td><strong><a href=index.php?pag=user&info1=" . $escrever['us'] . " class=link target=_top>" . $escrever['usn'] . "</a></strong></td><td><h3><a href=verpost.php?uid=" . $escrever['id'] . " class=link>" . $escrever['assunto'] . "</a></h3></td></tr>";
}
echo "</table>";
?>