<?php
	ob_start ();
	
	include "classes/BDConnection.php";
	
	$codigoatend = null;
	$paciente = null;
	$codigoprod = null;
	$produto = null;
	$quantidade = null;
	$data = null;
	
	if (isset ($_POST["codatendimento"]) && isset($_POST["paciente"]) && isset($_POST["codproduto"]) && isset($_POST["produto"]) && isset($_POST["quantidade"])
			&& isset($_POST["data"])){
	
		$conn = new BDConnection();
		$conn->getConnection();
	
		$codigoatend = $_POST["codatendimento"];
		$nompaciente = $_POST["paciente"];
		$codigoprod = $_POST["codproduto"];
		$nomproduto = $_POST["produto"];
		$qtde = $_POST["quantidade"];
		$data = $_POST["data"];
		$sql = "insert into produtos_retirados values ('$codigoatend', '$nompaciente', '$codigoprod', '$nomproduto', '$qtde', '$data')";
		$conn->query($sql);
		$conn = null;
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
								<th>C&oacute;digo</th>
								<th>Produto</th>
								<th>Quantidade</th>
								<th>Data Sa&iacute;da</th>
							</tr>

						</thead>
						<tbody>
							<tr>
								<th><input required="true" type="text"  name ="codigoprod" style="border:0;"/></th>
								<th><input required="true" type="text" name ="produto" width="90%"/></th>
								<th><input required="true" type="number" name ="quantidade" width="10%" step="1" size="3" max="6" min="2" /></th>
								<th><input required="true" type="date" name ="data" width="10%" /></th>
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