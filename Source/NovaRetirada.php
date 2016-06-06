<?php
session_start ();
ob_start ();

require_once 'classes/CrudSituacao.php';
require_once 'classes/CrudProduto.php';
require_once 'classes/CrudRetirada.php';
require_once 'classes/CrudAtendimento.php';
require_once 'classes/Util.php';
$u = new Util ();
$retirada = new CrudRetirada ();
$produto = new CrudProduto ();
$situacao = new CrudSituacao ();
$atendimento = new CrudAtentimento ();

$paciente = null;
$lista = null;

if (isset ( $_GET ['n_atendimento'] )) {
	
	if ($atendimento->pacienteExiste ( $_GET ['n_atendimento'] )) {
		$lista = $retirada->getByPaciente ( $_GET ['n_atendimento'] );
		$paciente = $_GET ['n_atendimento'];
	} else {
		$u->Redirect ( 'NovaRetirada.php', false );
	}
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	if ( $retirada->validaRetirada ( $_POST ['paciente'], $_POST ['cod_produto'] )) {
		if ($retirada->insert ( $_POST ['paciente'], $_POST ['cod_produto'], $_POST ['cod_status'], $_SESSION ['user_session'] ['cod_func'], $_POST ['qtd'])) {
			$u->alerta ( "Retidada de medicamentos gravada com sucesso!" );
		} else {
			$u->alerta ( "Erro ao tentar gravar Retidada de medicamentos!" );
			echo "<script>location.reload();</script>";
		}
	}
	else{
		$u->alerta ( "Paciente já possui esse produto vinculado!" );
		echo "<script>location.reload();</script>";
	}
}
?>

<div class="panel panel-default">
	<div class="panel-heading">Retirar de Medicamento</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="get" class="form-horizontal" id="frmNovaRetirada">
					<div class="form-group">
						<label class="col-sm-2 control-label">N&ordm; Paciente</label>
						<div class="col-sm-3">
								<?php if(!isset($_GET['n_atendimento']) && $_GET['n_atendimento'] != ""){ ?>
								<input type="text" name="n_atendimento" class="form-control"
								placeholder="N&uacute;mero paciente">
								<?php } else{?>
								<input type="text" name="n_atendimento"
								value="<?php echo $_GET['n_atendimento']; ?>"
								class="form-control" placeholder="N&uacute;mero paciente">
								<?php } ?>
							</div>
						<div class="col-md-3">
							<button type="submit" class="btn btn-default">Pesquisar</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<h3>Produto</h3>
		<div class="row">
			<div class="col-md-12">
				<form method="post" class="form-horizontal">
					<input type="hidden" value="<?php echo $paciente ?>" name="paciente" style="display: none;">
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
								<input type="number" name="qtd" class="form-control" min="1">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-3 control-label">Status:</label>
							<div class="col-sm-8">
								<select class="form-control" name="cod_status" id="status">
									<option>Selecione</option>
									<?php
									$situacao->comboSituacao ();
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<button class="btn btn-primary" type="submit"
							name="salvar_produto">Salvar</button>
					</div>
				</form>
			</div>
		</div>
		<br />
		<?php if($lista != null){ ?>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>Cod. Retirada</th>
						<th>Cod. Produto</th>
						<th>Produto</th>
						<th>Qtd</th>
						<th>Data Saida</th>
						<th>Status</th>
					</tr>			
					<?php foreach($lista as $key => $value) { ?>
					<tr>
						<td><?php echo $value["cod_retirada"]; ?></td>
						<td><?php echo $value["cod_produto"]; ?></td>
						<td><?php echo $value["des_produto"]; ?></td>
						<td><?php echo $value["num_quant_saida"]; ?></td>
						<td><?php echo $value["dta_saida"]; ?></td>
						<td><?php echo $value["des_status"]; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
$("#frmNovaRetirada").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#cod_produto").val() == ""){
		erros += "<li>Código do produto &eacute; obrigat&oacute;rio</li>"; 
	}
	if( $("#qtd").val() == "" ){
		erros += "<li>Quantidade &eacute; obrigat&oacute;rio</li>";
	}
	if($("#motivo").val() == ""){
		erros += "<li>Status &eacute; obrigat&oacute;rio</li>"; 
	}
	
	
	if( erros != "" ){
		$( ".erros" ).text("");
		$( ".erros" ).prepend("<ul>"+erros+"</ul>")
	}else{
		$("#frmNovaRetirada").submit()
	}
});
</script>

<?php
$pagemaincontent = ob_get_contents ();
ob_end_clean ();
$pagetitle = "Nova Retirada"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>