<?php include_once "BDConnection.php" ?>

<div class="panel panel-default">
	<div class="panel-heading">Consulta de Produtos</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">C&oacute;digo do Produto</label>
						<div class="col-sm-3">
							<input required="true" type="text" name="codigodoproduto" class="form-control"	placeholder="C&oacute;digo do Produto">				
						</div>
						<label class="col-sm-0 control-label"></label>
						<div class="col-sm-3">
						<button class="btn btn-default" type="submit">Pesquisar</button>
						</div>
					</div>

					<div class="form-group"></div>

				</div>
				<div>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Produto</th>
								<th>Data de Validade</th>
								<th>Status</th>
							</tr>


						</thead>
						<!--<tbody>
							<tr>
								<th>-</th>
								<th>-</th>
								<th>-</th>
								<th><select class="form-control">
										<option>Ativo</option>
										<option>Inativo</option>
								</select></th>
							</tr>
							<tr>
								<th>-</th>
								<th>-</th>
								<th>-</th>
								<th><select class="form-control">
										<option>Ativo</option>
										<option>Inativo</option>
								</select></th>
							</tr>
						</tbody>-->

					</table>

				</div>
			</div>
		</form>
	</div>
</div>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Produto"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>
