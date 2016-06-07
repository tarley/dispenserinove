<?php
ob_start ();
$lista = null;
$cod_retirada = null;
if (isset ( $_GET ['cod_retirada'] )) {
	$cod_retirada = $_GET ['cod_retirada'];
	require_once 'classes/CrudRetirada.php';
	require_once 'classes/Util.php';
	require_once 'classes/CrudSituacao.php';
	$u = new Util ();
	$retirada = new CrudRetirada ();
	$situacao = new CrudSituacao ();
	$lista = $retirada->getFromStatus ( $_GET ['cod_retirada'] );
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		if ($retirada->alterarStatus ( $_POST ['status'], $_POST ['cod_retirada'] )) {
			$u->alerta ( "Status alterado com sucesso!" );
			echo "<script>window.location='NovaRetirada.php'</script>";
		} else {
			$u->alerta ( "Erro ao tentar alterar o status!" );
			echo "<script>window.location='NovaRetirada.php'</script>";
		}
	}
} else {
	echo "<script>window.location='NovaRetirada.php'</script>";
}

if ($lista == null) {
	echo "<script>window.location='NovaRetirada.php'</script>";
}
?>

<div class="panel panel-default">
	<div class="panel-heading">Status da Retirada</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id="frmRetirada">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Codigo Retirada</th>
									<th>Codigo Produto</th>
									<th>Nome Produto</th>
									<th>Codigo Paciente</th>
									<th>Nome Paciente</th>
									<th>Status</th>
								</tr>
							</thead>
							<thead>
							<?php foreach($lista as $key => $value) { ?>
							<tr>
									<td><?php echo $value["cod_retirada"]; ?></td>
									<td><?php echo $value["cod_produto"]; ?></td>
									<td><?php echo $value["des_produto"]; ?></td>
									<td><?php echo $value["cod_atendimento"]; ?></td>
									<td><?php echo $value["nom_paciente"]; ?></td>
									<td><?php echo $value["des_status"]; ?></td>
								</tr>
							<?php } ?>
						</thead>
						</table>
					</div>
					<form method="post" action="">
						<input type="hidden" value="<?php echo $cod_retirada; ?>"
							name="cod_retirada">
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-3">
								<select class="form-control" name="status" id="status">
									<option>Selecione</option>
								<?php
								$situacao->comboSituacao ();
								?>
							</select>
							<span class="erro"></span>
							</div>
							<button class="btn btn-primary" type="submit">Salvar</button>
						</div>
					</form>


				</div>
		
		</form>
	</div>
</div>
<script type="text/javascript">
$("#frmRetirada").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#status").val() == ""){
		erros += "<li>Selecione uma opção</li>"; 
	}
	if($("#status").val() == "Desperdício"){
		window.location='RegistroDesperdicio.php'
	}
	if( erros != "" ){
		$( ".erros" ).text("");
		$( ".erros" ).prepend("<ul>"+erros+"</ul>")
	}else{
		$("#frmUsuario").submit()
	}
});
</script>
<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Cadastro de produto"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>