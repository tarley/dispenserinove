<?php
ob_start ();
$cod_retirada= null;

if(isset( $_GET['cod_retirada'] )){
	$cod_retirada=$_GET['cod_retirada'];
}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		require_once 'classes/CrudDesperdicio.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$crud = new CrudDesperdicio();
		
                if($crud->retornoExiste($_POST["codretirada"])) {
                    if($crud->insertDesp($_POST["codretirada"], $_POST["quantidade"], $_POST["motivo"])){
                            $u->alerta("Desperdício registrado com sucesso!");
							$crud->alteraStatus("codretirada");
                    }else{
                        $u->alerta("Erro ao tentar registrar desperdício!");
					}
				}else{
					$u->alerta("Desperdício já registrado!");
				}
        }
	
?>


<div class="panel panel-default">
	<div class="panel-heading">Registro de Desperd&iacute;cio</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id= "frmDesperdicio">
			<div class="row">
				<div class="col-md-12">
					

					<div class="form-group"></div>

				</div>
				<div>
							
						<div class="panel-body">
							<form method="post" class="form-horizontal">
								<div class="row">
									<div class="col-md-6">
				
										<div class="form-group">
											<label class="col-sm-3 control-label">C&oacute;digo de retirada do produto</label>
											<div class="col-sm-9">
												<input required="true" value="<?php echo $cod_retirada; ?>" type="number" class="form-control" placeholder="C&oacute;digo de retirada" name="codretirada" id="codretirada" min="1">
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

<script type="text/javascript">
$("#frmDesperdicio").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#codretirada").val() == ""){
		erros += "<li>Código da Retirada &eacute; obrigat&oacute;rio</li>"; 
	}
	if( $("#quantidade").val() == "" ){
		erros += "<li>Quantidade &eacute; obrigat&oacute;rio</li>";
	}
	if($("#motivo").val() == ""){
		erros += "<li>Motivo do Desperdicio &eacute; obrigat&oacute;rio</li>"; 
	}
	if( $("#data").val() == "" ){
		erros += "<li>Data do retorno &eacute; obrigat&oacute;rio</li>";
	}
	
	if( erros != "" ){
		$( ".erros" ).text("");
		$( ".erros" ).prepend("<ul>"+erros+"</ul>")
	}else{
		$("#frmDesperdicio").submit()
	}
});
</script>


<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Registro de desperdicio"; // NOME DESSA P�?GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>
