<?php
$uid=$_GET["uid"];

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysqli_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysqli_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysqli_query($conecta, "select * from users1 where nome = '$uid';"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table><tr><td>Nome</td><td>Nome Completo</td><td>Descrição</td><td>Email</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysqli_fetch_array($res)){

/*Escreve cada linha da tabela*/
 echo "<tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['nome1'] . "</td><td>" . $escrever['descricao1'] . "</td><td>" . $escrever['email'] . "</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysqli_close(conexao);

?>