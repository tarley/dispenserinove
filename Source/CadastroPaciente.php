<?php
    ob_start();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'classes/CrudAtendimento.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$atendimento = new CrudAtentimento();
		
		if($atendimento->pacienteExiste($_POST['codigo'])){
			if($atendimento->insert($_POST["codigo"], $_POST["nome"])){
				$u->alerta("Paciente gravado com sucesso!");
			}else{
				$u->alerta("Erro ao tentar gravar paciente!");
			}
		}
		else{
			$u->alerta("Paciente já está cadastrado");
		}
	}
?>

<div class="panel panel-default">
	<div class="panel-heading">Cadastro de Paciente</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id="frmPaciente">
			<div class="row">
				<div class="col-md-10">
				<span class="erros"></span>
					<div class="form-group">
						<label class="col-sm-2 control-label">C&oacute;digo do Paciente</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="codigo" id="codigo" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nome do Paciente</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nome" id="nome" />
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
<script type="text/javascript">
$("#frmPaciente").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#codigo").val() == ""){
		erros += "<li>Codigo &eacute; obrigat&oacute;rio</li>"; 
	}

	if( erros != "" ){
		$( ".erros" ).text("");
		$( ".erros" ).prepend("<ul>"+erros+"</ul>")
	}else{
		$("#frmPaciente").submit()
	}
});
</script>
<?php
    $pagemaincontent = ob_get_contents();
    ob_end_clean();
    $pagetitle = "Cadastro de Paciente"; // NOME DESSA P�GINA
    include("masterpage.php");// Caminho da "masterpage.php"
?>