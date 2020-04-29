<?php include("engine/conexao.php"); ?>
<?php
session_start();
$mensagem_erro = "";
if(!empty($_COOKIE["login"]) && !empty($_COOKIE["senha"]) && !empty($_COOKIE["id"])) { // Verifico se já existem os cookies de login. Caso existam, redirecionam o user para a página restrita

	header("Location: indexp.php");
	exit();
	
	
}
if(isset($_POST["logar"])) { // Verifico se o botão de login foi acionado
	
	if(!empty($_POST["login"]) && !empty($_POST["senha"])) { // Verifico se os campos foram preenchidos
		
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro a senha originada do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta ao SQL
		
		$valida_user = mysql_query("SELECT * FROM $tabela WHERE login='$login' AND senha='$senha'") or die(mysql_error()); // Faço a consulta ao SQL para buscar o usuário com os dados informados pelo form
		
		if(mysql_num_rows($valida_user) > 0) { // Verifico se a consulta retorna alguma linha
			
			$lembrar = $_POST["lembrar"]; // Pego o valor do checkbox 'Lembrar' do formulário
			$info = mysql_fetch_array($valida_user); // Defino a var responsável por trazer as informações do BD
			
			$login = $info["login"]; // Recupero o campo nome do BD
			$pass = $info["senha"]; // Recupero o campo senha do BD
			$id_generico = $info["id"]; // Recupero o campo id do BD
			
			$id = base64_encode($id_generico); // Codifico o id para obter mais segurança
			
			if($lembrar == "1") { // Se o checkbox foi marcado, gravo cookies de 1 ano
				
				// Gravo os cookies responsáveis pelo login
				setcookie("login", $login, time()+31536000); // setcookie(nome_cookie, valor_cookie, tempo_expiracao)
				setcookie("senha", $pass, time()+31536000); // Nesses casos, usei o tempo como anual
				setcookie("id", $id, time()+31536000); // Assim: time()[agora]+[mais]3153600[60*60*24*365]{segs.*min.= 1 hora em segs => 1 hr em segs * 24 hrs = 1 dia => 1 dia * 365 dias = 1 ano}
				
			}
			else { // Caso contrário, gravo cookies que expirarão assim q o browser fechar
				
				// Gravo os cookies responsáveis pelo login
				setcookie("login", $login, 0); // Aqui os cookies expiram assim q o browser fechar
				setcookie("senha", $pass, 0);
				setcookie("id", $id, 0);
			}
			
			// Redireciono para a página restrita
			header("Location: indexp.php");
			exit();
		}
		else { // Se não retornar, define mensagem de erro
			
			$mensagem_erro = "Dados Incorretos!";
		}
	}
	else { // Caso tenha algum campo em branco, define mensagem de erro
		
		$mensagem_erro = "Dados Incorretos!";// mensagem de campos em branco
	}
}
?>
<style>
body {
  margin:0;
  padding:0;
  text-align:center;
}
.textou {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; text-decoration: none;}
.texto {font-family: tahoma; font-size: 11px; color: #666666; text-decoration: none;}
#fi1 {
 
    width: 150px;
   /* background: #f0f0f0;*/
    /*overflow:auto;*/
 
    /* Border style */
    border: 1px solid #cccccc;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px; 
 
    /* Border Shadow */
    -moz-box-shadow: 2px 2px 2px #cccccc;
    -webkit-box-shadow: 2px 2px 2px #cccccc;
    box-shadow: 2px 2px 2px #cccccc;
 
    }
#fi2 {
 
    /*width: 25px;*/
   /* background: #f0f0f0;*/
    /*overflow:auto;*/
 
    /* Border style */
    border: 1px solid #cccccc;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px; 
 
    /* Border Shadow */
    -moz-box-shadow: 2px 2px 2px #cccccc;
    -webkit-box-shadow: 2px 2px 2px #cccccc;
    box-shadow: 2px 2px 2px #cccccc;
 
    }
.botaologar {
	border: 1px solid #dcdcdc;
	background-color:#f2f2f2;
	display:inline-block;
	color:#666666;
	font-family:arial;
	font-size:13px;
	padding:0px 0px;
	text-decoration:none;
	width: 50px;
	border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
}.botaologar:hover {
	background-color:#dcdcdc;
	border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
}
</style>
<body>
<div style="margin-top: -3px;">
<form method="post" action="<?php $PHP_SELF; ?>">
<table><tr><td><span class="texto">Login: </span></td><td><span class="texto">Senha: </span></td><td></td></tr>
<tr><td><input type="text" name="login" id="fi1" size="12" value="<?php echo "$mensagem_erro"; ?>"></td><td><input type="password" name="senha" id="fi1"size="12px"></td><td><button type="submit" name="logar" value="Logar" id="botaologar" class="botaologar">Logar</button></td></tr>
<tr><td><input type="checkbox" name="lembrar" id="fi2"><span class="texto">Manter-me conectado</span></td><td><span class="texto">esqueceu a senha?</span></td><td></td></tr>
</table>
</form>
</div>
</body>
