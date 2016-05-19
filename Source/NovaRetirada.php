<?php
ob_start ();

include "BDConnection.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = "INSERT INTO produtos_retirados (cod_atendimento, cod_produto, cod_status, cod_func, num_quant_saida) VALUES ('$nome', '$email', '$senha')";
mysql_query($sql) or die(error());
$response = array("success" => true);
echo json_encode($response);
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

						</tbody>

					</table>

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
          
        },
        messages: {
        	Atendimento: {
                required: "O Codigo do Atendimento é obrigatorio.",
                
            },
            Paciente: {
                required: "O nome do paciente é obrigatorioo.",
                
            },
            
        }

    });
});


</script>

<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Nova Retirada"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>