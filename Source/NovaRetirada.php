<?php
ob_start ();
?>
<div class="panel panel-default">
	<div class="panel-heading">Retirar de Medicamento</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">N&ordm; Atendimento</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								placeholder="N&uacute;mero Atendimento">
						</div>
						<div class="col-md-3">
							<button class="btn btn-default">Pesquisar</button>
						</div>
					</div>

					<div class="form-group"></div>

				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">Paciente</label>
						<div class="col-sm-10">
							<input type="text" class="form-control"
								placeholder="Nome do Paciente">

						</div>

					</div>

				</div>

				<div>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Produto</th>
								<th>Quantidade</th>
								<th>Data Sa&iacute;da</th>
							</tr>

						</thead>
						<tbody>

						</tbody>

					</table>

				</div>
			</div>
		</form>
	</div>
</div>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Retirada"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>