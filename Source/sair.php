<?php
session_start();
require_once 'classes/Util.php';
require_once 'classes/CrudUsuario.php';
$usuario = new Usuario();
$u = new Util();
if($usuario->logout()){
	$u->Redirect('index.php', false);
}else{
	unset($_SESSION['user_session']);
	session_destroy();
}


