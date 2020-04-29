<?php
$mensagem_erro = "";

if(isset($_POST["cadastrar"])) { 
	
	if(!empty($_POST["epp"])) { 
		

		$epp = $class->antisql($_POST["epp"]); 

		
			
			$insert = mysql_query("update user set epp = '$epp' where id = '$id';") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Dados Alterados com sucesso!</b>";
			}
		
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
<span class="titulo">Configuração:</span>
<hr size="1" color="#cccccc">
<form method="post" action="<?php $PHP_SELF; ?>">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php echo $mensagem_erro; ?></td>
  </tr>
  <tr>
    <td><table width="550" border="0" cellspacing="0" cellpadding="5"></td></tr>
      <tr>
        <td>Numero de exibicoes de posts por pagina:</td>
        <td><label>
          <input id="cordoinput" type="text" name="epp" value="<?php echo $row["epp"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input id="cordoinput" type="submit" name="cadastrar" value="Salvar" />
        </label></td>
      </tr>
    </table>
  
</table>
</form>
