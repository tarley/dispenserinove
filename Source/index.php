<!doctype html>
<html lang="pt-br" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Dispenser Inove</title>
	<!-- Fontes -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'classes/CrudUsuario.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		
		$crud = new Usuario();
		
		if($crud->login($usuario, $senha)){
			$crud->redirect("ConsultarRetirada.php");
		}else {
			$crud->logout();
			$u->alerta("Credenciais informadas incorretas!");
		}

	}
	?>
	<div class="login-page bk-img" style="background-image: url(img/fundo.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x"></h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form class="mt" method="post">

									<label for="" class="text-uppercase text-sm">Nome de Usu&aacute;rio:</label>
									<input type="text" placeholder="Nome de Usu&aacute;rio" name="usuario" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Senha:</label>
									<input type="password" placeholder="Senha" name="senha" class="form-control mb">

									<div class="checkbox checkbox-circle checkbox-info">
										<input id="checkbox7" type="checkbox" checked>
										<label for="checkbox7">
											Mantenha conectado
										</label>
									</div>

									 <button class="btn btn-primary btn-block" type="submit">LOGIN</button> 
									<!--<a href="ConsultarRetirada.php" class="btn btn-primary btn-block" type="submit">LOGIN</a>-->

								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="#" class="text-grey">Esqueceu a senha?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/main.js"></script>

</body>

</html>