<?php
ob_start ();
require_once 'BDConnection.php';
$lista = null;
if (isset ( $_GET [paciente] ) && isset($_GET[medicamento])){
	$conn = new BDConnection();
	
	$conn->getConnection();
}
?>
<div class="panel panel-default">
	<div class="panel-heading">Consulta de Situa&ccedil;&atilde;o de
		Medicamentos</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label class="col-sm-2 control-label">Paciente</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="C&oacute;digo do Paciente" name="paciente">
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">

						<div class="col-sm-10"></div>
					</div>
					<div class="form-group"></div>
					<div class="form-group"></div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label class="col-sm-3 control-label">Medicamento</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="C&oacute;digo do Medicamento" name="medicamento">
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<button class="btn btn-default" type="button">Pesquisar</button>
				</div>
		</form>
		<div class="col-md-12 text-left" >
		<?php if($lista != null){ ?>
		<table class="display table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Descri&ccedil;&atilde;o</th>
					<th>Status</th>
					<th>Data de Retirada</th>
					<th>Data de Retorno</th>
				</tr>

			</thead>
			<tbody>

				<tr>
					<td>Descri&ccedil;&atilde;o</td>
					<td>Status</td>
					<td>Data de Retirada</td>
					<td>Data de Retorno</td>
				</tr>
				<tr>
					<td>Descri&ccedil;&atilde;o</td>
					<td>Status</td>
					<td>Data de Retirada</td>
					<td>Data de Retorno</td>
				</tr>
				<tr>
					<td>Descri&ccedil;&atilde;o</td>
					<td>Status</td>
					<td>Data de Retirada</td>
					<td>Data de Retorno</td>
				</tr>
			</tbody>

		</table>
		<?php 
		}
		?>

	</div>
</div>
</div>
</div>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Retirada"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>