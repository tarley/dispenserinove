<?php
ob_start ();
$lista= null;
if (isset($_GET['cod_retirada'])) {
	require_once 'classes/CrudRetirada.php';
	require_once 'classes/StatusRetirada.php';
	require_once 'classes/Util.php';
	$u = new Util ();
	
	$retirada = new CrudRetirada ();
	
	$lista = $retirada->getFromStatus($_GET['cod_retirada']);
	
	
}
?>

<div class="panel panel-default">
	<div class="panel-heading">Status da Retirada</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id="frmProduto">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>Codigo Retirada</th>
								<th>Codigo Produto</th>
								<th>Nome Produto</th>
								<th>Codigo Paciente</th>
								<th>Nome Paciente</th>
								<th>Status</th>
							</tr>
						</thead>
						<thead>
							<?php foreach($lista as $key => $value) { ?>
							<tr>
								<td><?php echo $value["cod_retirada"]; ?></td>
								<td><?php echo $value["cod_produto"]; ?></td>
								<td>Nome Produto</td>
								<td>Codigo Paciente</td>
								<td>Nome Paciente</td>
								<td>Status</td>
							</tr>
							<?php } ?>
						</thead> 

					</table>
					<form>
					<div class="form-group">
					
					</div>
					<div class="col-md-12 col-sm-offset-1">
						<div class="hr-dashed"></div>
						<button class="btn btn-primary" type="submit">Salvar</button>
					</div>
					</form>
	
					
				</div>
		
		</form>
	</div>
</div>

<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Cadastro de produto"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>