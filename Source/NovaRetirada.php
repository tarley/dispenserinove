<?php
	ob_start ();
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'classes/CrudRetirada.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$crud = new CrudProduto();
		if($crud->insert($_POST["Codatendimento"], $_POST["codproduto"], $_POST["codstatus"], $_POST["codfunc"], $_POST["quantidade"], $_POST["datasaida"])){
			$u->alerta("Retidada de medicamentos gravada com sucesso!");
		}else{
			$u->alerta("Erro ao tentar gravar Retidada de medicamentos!");
		}
	}
	

?>

<div class="panel panel-default">
	<div class="panel-heading">Retirar de Medicamento</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">N&ordm; Atendimento</label>
						<div class="col-sm-3">
							<input required="true" type="text" class="form-control"
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
							<input required="true" type="text" class="form-control"
								placeholder="Nome do Paciente">

						</div>

					</div>

				</div>

				<div>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="col-md-2">C&oacute;digo</th>
								<th class="col-md-9">Produto</th>
								<th >Quantidade</th>
								<th class="col-md-2">Data Sa&iacute;da</th>
							</tr>

						</thead>
						<tbody>
							<tr>
								<th><input required="true" type="text"  name ="codproduto" style="border:0;"/></th>
								<th><input required="true" type="text" name ="produto"  style="border:0;"/></th>
								<th><input required="true" type="number" name ="quantidade"  step="1" size="3" max="6" min="2" /></th>
								<th><input required="true" type="date" name ="data"  /></th>
							</tr>
							

						</tbody>

					</table>

				</div>
				<div class="col-md-5 col-sm-offset-9">
						<div class="hr-dashed"></div>
						<button class="btn btn-primary" type="submit">Salvar</button>
						<button class="btn btn-default" type="reset">Limpar</button>
					</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#formulario').validate({
        rules: {
        	Atendimento: {
                required: true,
                minlength: 10
            },
            Paciente: {
                required: true,   
            },
            
            Codigo: {
                required: true,    
            },
            
            Produto: {
                required: true,    
            },

            Quantidade: {
                required: true,    
            },

            Data Saída: {
                required: true,    
            },
          
        },

    });
});


</script>

<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Nova Retirada"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>