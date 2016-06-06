<?php
session_start ();
require_once 'classes/CrudUsuario.php';
require_once 'classes/Util.php';
$u = new Util ();
$usuario = new Usuario ();

if (! $usuario->is_loggedin ()) {
	$usuario->logout ();
	$usuario->redirect ( "index.php" );
} else if (! isset ( $_GET ['tipo'] ) and ! isset ( $_GET ['codigo'] )) {
	$u->alerta ( "variavel nao setada!" );
	$usuario->redirect ( "ConsultarUsuario.php" );
} else {
	
	switch ($_GET ['tipo']) {
		case "usuario" :
			if ($usuario->is_admin ()) {
				if ($usuario->ativarByID ( $_GET ['codigo'] )) {
					$u->alerta ( "Usuário ativado com sucesso!" );
					$usuario->redirect ( "ConsultarUsuario.php" );
				} else {
					$u->alerta ( "Erro ao tentar ativar usuário!" );
					$usuario->redirect ( "ConsultarUsuario.php" );
				}
			} else {
				$u->alerta ( "Sem acesso!" );
				$usuario->redirect ( "ConsultarRetirada.php" );
			}
			break;
		case "x" :
			echo "afd";
			break;
		default :
			$usuario->redirect ( "ConsultarRetirada.php" );
			break;
	}
}

