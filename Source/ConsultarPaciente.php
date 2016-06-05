<?php
ob_start ();
require_once 'classes/CrudAtendimento.php';
$crud = new CrudAtentimento();

$lista = $crud->getAll();

if (isset ($_GET ["codigodopaciente"])){
	$codPaciente = $_GET["codigodopaciente"];
	$lista = $crud->getByFilter($codPaciente);
}
?>

<div class="panel panel-default">
	<div class="panel-heading">Consulta de Paciente</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">C&oacute;digo do Paciente</label>
						<div class="col-sm-3">
							
							<input required="true" type="number" name="codigodopaciente" class="form-control"	placeholder="C&oacute;digo do Paciente" mim="1">				
						</div>
						<label class="col-sm-0 control-label"></label>
						<div class="col-sm-3">
						<button class="btn btn-default" type="submit">Pesquisar</button>
						<a href="ConsultarPaciente.php" class="btn btn-default" >Limpar</a>
						</div>
					</div>

					<div class="form-group"></div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if($lista != null){ ?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Nome</th>
							</tr>					
						</thead>
						<tbody>
							<?php foreach($lista as $key => $value) { ?>
							<tr>
								<th><?php echo $value["cod_atendimento"]; ?></th>
								<th><?php echo $value["nom_paciente"]; ?></th>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<?php } ?>
				</div>
			</div>
			
		</form>
	</div>
</div>

<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Paciente"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>
