<?php
require_once 'classes/CrudUsuario.php';
$usuario = new Usuario();
$usuario->logout();
$usuario->redirect("index.php");

