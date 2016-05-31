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
		
			<div class="row">
				<div class="col-md-12">
					<form method="get" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">N&ordm; Atendimento</label>
							<div class="col-sm-3">
								<?php if(!isset($_GET[n_atendimento])){ ?>
								<input type="text" name="n_atendimento" class="form-control" placeholder="N&uacute;mero Atendimento">
								<?php } else{?>
								<input type="text" name="n_atendimento" value="<?php echo $_GET[n_atendimento]; ?>" class="form-control" placeholder="N&uacute;mero Atendimento">
								<?php } ?>
							</div>
							<div class="col-md-3">
								<button class="btn btn-default">Pesquisar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<h3>Produto</h3>
			<div class="row">
				<div class="col-md-12">
					<form method="post" class="form-horizontal">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-5 control-label">Cod. do Produto: </label>
								<div class="col-sm-7">
								<input type="text" name="cod_produto" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="col-sm-5 control-label">Quantidade:</label>
								<div class="col-sm-7">
								<input type="number" name="qtd" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<button class="btn btn-primary" type="submit">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		
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