<?php
if(user_logado()){
echo "
<form action=\"\" method=\"post\" name=\"coment\">
<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
<input type=\"hidden\" name=\"id_tipo\" value=\"" . $com_idtipo . "\">
<input type=\"hidden\" name=\"id_subtipo\" value=\"" . $com_idsubtipo . "\">
<input type=\"submit\" name=\"post\" id=\"cordoinput\" value=\"Postar\">
</form>
";
}
?>