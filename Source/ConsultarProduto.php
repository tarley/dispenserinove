<?php
ob_start ();

$lista = null;

	if (isset ($_GET ["codigodoproduto"])){
		require_once 'classes/CrudProduto.php';
		$codProduto = $_GET["codigodoproduto"];
		$conn = new BDConnection();
		$conn->getConnection();
		
		$crud = new CrudProduto($conn);
		$lista = $crud->getByFilter($codProduto);
	}
?>

<div class="panel panel-default">
	<div class="panel-heading">Consulta de Produtos</div>
	<div class="panel-body">
		<form method="get" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-sm-2 control-label">C&oacute;digo do Produto</label>
						<div class="col-sm-3">
							
							<input required="true" type="number" name="codigodoproduto" class="form-control"	placeholder="C&oacute;digo do Produto">				
						</div>
						<label class="col-sm-0 control-label"></label>
						<div class="col-sm-3">
						<button class="btn btn-default" type="submit">Pesquisar</button>
						</div>
					</div>

					<div class="form-group"></div>

				</div>
				<div>
					<?php if($lista != null){ ?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Produto</th>
							</tr>					
						</thead>
						<tbody>
							<?php foreach($lista as $key => $value) { ?>
							<tr>
								<th><?php echo $value["cod_produto"]; ?></th>
								<th><?php echo $value["des_produto"]; ?></th>
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



</script>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Consultar Retirada"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>