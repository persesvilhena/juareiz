<?php include "includes/cabeca.dll"; ?>
<?php
$uid=$_POST["uid"];
$servidor = "localhost";
$usuario = "root";
$senha = "369875";
$banco = "perses"; 
$conexao = mysqli_connect($servidor,$usuario,$senha); 
mysqli_select_db($banco);
$mysqlq1 = mysqli_query($conecta, "SELECT * FROM `topicos` where id='$uid';"); // Faço uma consulta para pegar os dados do user
$row1 = mysqli_fetch_array($mysqlq1); // Var responsável pelo array de resultados da consulta em $mysqlq	
?>
<title>Forum - <?php echo "$namesite"; ?></title>
<?php include("includes/ct.dll"); ?><span class="titulo"><?php echo "$row1[nome]"; ?></span>
<?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<strong>Autor:</strong> <a href="user.php?uid=<?php echo "$row1[usautor]"; ?>"><?php echo "$row1[autor]"; ?></a><br>
<strong>Data:</strong> <?php echo "$row1[data]"; ?><br>
<strong>Descrição:</strong> <?php echo "$row1[descricao]"; ?><br>
<?php include("includes/fb.dll"); ?></div>
<?php include("includes/fimcabeca.dll"); ?>