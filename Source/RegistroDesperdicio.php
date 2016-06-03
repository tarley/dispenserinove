<?php
ob_start ();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'classes/CrudDesperdicio.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$crud = new CrudDesperdicio();
		if($crud->desperdicio($_POST["codretirada"], $_POST["data"], $_POST["quantidade"], $_POST["motivo"])){
			$u->alerta("Desperdício registrado com sucesso!");
		}else{
			$u->alerta("Erro ao tentar registrar desperdício!");
		}
	}
?>


<div class="panel panel-default">
	<div class="panel-heading">Registro de Desperd&iacute;cio</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					

					<div class="form-group"></div>

				</div>
				<div>
							
						<div class="panel-body">
							<form method="post" class="form-horizontal">
								<div class="row">
									<div class="col-md-6">
										<!-- Codigo autoincrement
										<div class="form-group">
											<label class="col-sm-3 control-label">C&oacute;digo de retorno</label>
											<div class="col-sm-9">
												<input required="true" type="number" class="form-control" placeholder="C&oacute;digo do retorno" name="codretorno" id="codretorno">
											</div>
										</div>
										-->		
										<div class="form-group">
											<label class="col-sm-3 control-label">C&oacute;digo de retirada do produto</label>
											<div class="col-sm-9">
												<input required="true" type="number" class="form-control" placeholder="C&oacute;digo de retirada" name="codretirada" id="codretirada">
											</div>
										</div>
												
										<div class="form-group">
											<label class="col-sm-3 control-label">Quantidade desperdi&ccedil;ada</label>
											<div class="col-sm-9">
												<input required="true" type="number" class="form-control" placeholder="Quantidade" name="quantidade" id="quantidade" min="1">
											</div>
										</div>
												
										<div class="form-group">
											<label class="col-sm-3 control-label">Motivo</label>
											<div class="col-sm-9">
												<textarea  required="true" class="form-control" rows="3" placeholder="Descreva o motivo do desperd&iacute;cio" name="motivo"
												id="motivo"></textarea>
											</div>
										</div>
												
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-3 control-label">Data de retorno</label>
											<div class="col-sm-9">
												<input required="true" type="text" class="form-control" placeholder="Data de retorno" id="datepicker" name="data">	
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
