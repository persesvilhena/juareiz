<?php
function user_logado (){
	if(!empty($_COOKIE["login"]) && !empty($_COOKIE["senha"]) && !empty($_COOKIE["id"])){ 
		return "1";
	}else{
		return "0";
	}
}

function comentario ($com_idtipo, $com_idsubtipo){
	/*$com_idtipo = $funcao_idtipo;
	$com_idsubtipo = $funcao_idsubtipo;
	echo $funcao_idtipo;
	echo $funcao_idsubtipo;*/
	include("com/comentar.php");
	include("com/index.php");
}
?>