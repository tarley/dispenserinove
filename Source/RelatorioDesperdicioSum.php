<?php
ob_start();
require_once 'classes/RelatorioDesperdicio.php';
$r = new RelatorioDesperdicio();
$lista = $r->getSum();
?>

<div class="panel panel-default">
	<div class="panel-heading">Relatório Desperdício - Somatório</div>
	<div class="panel-body" style="min-height: 400px;">
		<table class="table">
			<thead>
				<tr>
					<th>Ranking</th>
					<th>Produto</th>
					<th>Quantidade</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lista as $key => $value) { ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['des_produto']; ?></td>
					<td><?php echo $value['qtd']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>

<?php
    $pagemaincontent = ob_get_contents();
    ob_end_clean();
    $pagetitle = "Relatório Desperdício - Somatório"; // NOME DESSA P�GINA
    include("masterpage.php");// Caminho da "masterpage.php"
?>