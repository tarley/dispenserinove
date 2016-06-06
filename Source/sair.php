<?php
require_once 'classes/CrudUsuario.php';
$usuario = new Usuario();
if($usuario->logout()){
	$usuario->redirect("index.php");
}


