<?php
ob_start();
require_once 'classes/RelatorioDesperdicio.php';
$r = new RelatorioDesperdicio();
$lista = $r->getByFilter();


?>

<div class="panel panel-default">
	<div class="panel-heading">Relatório de Desperdício</div>
	<div class="panel-body" style="min-height: 400px;">
		<table class="table">
			<thead>
				<tr>
					<th>Nome do Paciente</th>
					<th>Produto</th>
					<th>Quantidade</th>
					<th>Data Saída</th>
					<th>Data Retorno</th>
					<th>Motivo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lista as $key => $value) { ?>
				<tr>
					<td><?php echo $value['nom_paciente']; ?></td>
					<td><?php echo $value['des_produto']; ?></td>
					<td><?php echo $value['num_quant_retorno']; ?></td>
					<td><?php echo $value['dta_saida']; ?></td>
					<td><?php echo $value['dta_retorno']; ?></td>
					<td><?php echo $value['des_motivo']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#produtos').multiselect();
    });
</script>
<?php
    $pagemaincontent = ob_get_contents();
    ob_end_clean();
    $pagetitle = "Cadastro de produto"; // NOME DESSA P�GINA
    include("masterpage.php");// Caminho da "masterpage.php"
?>