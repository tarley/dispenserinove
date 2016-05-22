<!doctype html>
<html lang="pt-br" class="no-js">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">

<title>Dispenser Inove - <?php echo $pagetitle; ?></title>

<!-- Font awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Sandstone Bootstrap CSS -->
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
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="img/logo.jpg"
			class="img-responsive" alt=""></a> <span class="menu-btn"><i
			class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account"><a href="#">Nome Completo <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#">Minha Conta</a></li>
					<li><a href="#">Sair</a></li>
				</ul></li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar" id="menu">
			<ul class="ts-sidebar-menu">
				
				<li class="ts-label">Menu</li>
				<li><a href="NovaRetirada.php"><i class="fa fa-plus-square-o"></i> Nova Retirada</a></li>
				<li><a href="#"><i class="fa fa-search"></i> Consultar</a>
					<ul>
						<li><a href="ConsultarRetirada.php">Retirada</a></li>
						<li><a href="ConsultarProduto.php">Produto</a></li>
					</ul></li>
				</li>
				<li><a href="#"><i class="fa fa-plus"></i> Cadastrar</a>
					<ul>
						<li><a href="CadastroProduto.php">Produto</a></li>
					</ul>
				</li>
				
				<ul class="ts-profile-nav">
					<li class="ts-account"><a href="#">Nome Completo <i
							class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#">Minha Conta</a></li>
							<li><a href="#">Sair</a></li>
						</ul></li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<?php echo "$pagemaincontent";?>
					</div>
				</div>

				<div class="row" style="position: absolute; bottom: 0;">
					<div class="clearfix pt pb">
						<div class="col-md-12">
							<em>Copyright Newton Paiva. All Right Reserved</em>
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
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>