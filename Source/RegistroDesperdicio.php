<?php
ob_start ();
?>

<div class="panel panel-default">
	<div class="panel-heading">Registro de Desperd&iacute;cio</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					

					<div class="form-group"></div>

				</div>
				<div>
							
						<div class="panel-body">
							<form method="get" class="form-horizontal">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-3 control-label">C&oacute;digo do produto</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" placeholder="C&oacute;digo">
											</div>
										</div>
												
										<div class="form-group">
											<label class="col-sm-3 control-label">Produto</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" placeholder="Nome do Produto">
											</div>
										</div>
												
										<div class="form-group">
											<label class="col-sm-3 control-label">Motivo</label>
											<div class="col-sm-9">
												<textarea class="form-control" rows="3" placeholder="Descreva o motivo do desperd&iacute;cio"></textarea>
											</div>
										</div>
												
									</div>
											
									<div class="col-md-12 col-sm-offset-1">
										<div class="hr-dashed"></div>
										<button class="btn btn-default" type="reset">Limpar</button>
										<button class="btn btn-primary" type="submit">Salvar</button>
									</div>
								</div>
							</form>
						</div>	
							
				</div>
			</div>
		</form>
	</div>
</div>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Registro de desperdicio"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>
