<?php
ob_start ();

if (isset ( $_GET [paciente] ) && isset($_GET[medicamento])){
	$lista = null;
	require_once 'classes/CrudRetirada.php';
	
	$paciente = $_GET [paciente];
	$medicamento = $_GET [medicamento];

	$crud = new CrudRetirada();
	$lista = $crud->getByFilter($paciente,$medicamento);
}
?>
<div class="panel panel-default">
	<div class="panel-heading">Consulta de Situa&ccedil;&atilde;o de
		Medicamentos</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label class="col-sm-2 control-label">Paciente</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="C&oacute;digo do Paciente" name="paciente">
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">

						<div class="col-sm-10"></div>
					</div>
					<div class="form-group"></div>
					<div class="form-group"></div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label class="col-sm-3 control-label">Medicamento</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="C&oacute;digo do Medicamento" name="medicamento">
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<button class="btn btn-default" type="submit">Pesquisar</button>
				</div>
		</form>
		<div class="col-md-12 text-left" >
		<?php if($lista != null){ ?>
		<table class="display table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>C&oacute;digo Retirada</th>
					<th>C&oacute;digo Paciente</th>
					<th>C&oacute;digo Produto</th>
					<th>Qtd. Sa&iacute;da</th>
					<th>Data Sa&iacute;da</th>
					<th>Status</th>
					
				</tr>

			</thead>
			<tbody>
				<?php foreach($lista as $key => $value) { ?>
				<tr>
					<td><?php echo $value[cod_retirada]; ?></td>
					<td><?php echo $value[cod_atendimento]; ?></td>
					<td><?php echo $value[cod_produto]; ?></td>
					<td><?php echo $value[num_quant_saida]; ?></td>
					<td><?php echo $value[dta_saida]; ?></td>
					<td><?php echo $value[des_status]; ?></td>
				</tr>
				<?php }?>
			</tbody>

		</table>
		<?php 
		}
		else{
		?>
		<a href="NovaRetirada.php" class="btn btn-primary">Nova Retirada</a>
		<?php 
		}
		?>

	</div>
</div>
</div>
</div>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Retirada"; // NOME DESSA PÁGINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>