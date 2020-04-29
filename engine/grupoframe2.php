<?php include("../includes/cabecaback.dll"); ?>
<?php
$selectgrupo = mysqli_query($conecta, "SELECT * FROM grupo WHERE id='$row[grupo]'");
$grupo=mysqli_fetch_array($selectgrupo);
if($id_gen == $grupo[idautor]) { 

include "../include/grupos/adm.dll";
}
?>