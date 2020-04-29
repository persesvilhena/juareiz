<?php include "includes/cabeca.dll"; ?>
<title>apagando... - <?php echo "$namesite"; ?></title>
<?php include "includes/cb.dll"; ?>
<div align="left">
<?php
$id=$_POST["id"];

  require("conexao.php");
  
  // obtém a conexão com o banco MySQL
$conexao = mysqli_connect(localhost,root,369875);
  
  // Comando SQL para excluir os dados em uma tabela  
  $sql = "DELETE FROM msg WHERE paraid = '$id';";
  
  // Executa o comando SQL
  $result = mysqli_query($conecta, $sql, $conexao);
  
  // Verifica se o comando foi executado com sucesso
  if(!$result)
    die("Falha ao executar o comando: " . mysqli_error());
  else
    echo "mensagem apagada com sucesso!<br><a href=msgs.php>Voltar</a>";
  

mysqli_close(conexao);
?></div>
<?php include "includes/fb.dll"; ?>
