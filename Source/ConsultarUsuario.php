<?php
session_start ();
ob_start ();

require_once 'classes/CrudUsuario.php';
require_once 'classes/Util.php';
$u = new Util ();
$crud = new Usuario ();

if (! $crud->is_admin ()) {
	$u->alerta ( "Sem acesso!" );
	$usuario->redirect ( "ConsultarRetirada.php" );
}

$lista = $crud->getAll ();

if (isset ( $_GET ["nome"] )) {
	$nome = $_GET ["nome"];
	$lista = $crud->getByFilter ( $nome, $status );
}
?>

<div class="panel panel-default">
	<div class="panel-heading">Consulta de Usuário</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form class="form-inline" id="frmUsuario">
					<div class="form-group">
						<label for="nomw">Name</label> <input type="text"
							class="form-control" id="nome">
					</div>
					<div class="form-group">
						<label for="status">Status</label> <select name="status"
							id="status" class="form-control">
							<option value="1">Ativo</option>
							<option value="0">Inativo</option>
						</select>
					</div>
					<button class="btn btn-default" type="submit">Pesquisar</button>
					<a href="ConsultarUsuario.php" class="btn btn-default">Limpar</a>
				</form>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
					<?php if($lista != null){ ?>
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>C&oacute;digo</th>
							<th>Nome</th>
							<th>Turno</th>
							<th>Nome de Usuário</th>
							<th>Data Cadastro</th>
							<th>Administrador</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
							<?php foreach($lista as $key => $value) { ?>
							<tr>
							<td><?php echo $value["cod_func"]; ?></td>
							<td><?php echo $value["nom_func"]; ?></td>
							<td><?php echo $value["des_turno"]; ?></td>
							<td><?php echo $value["nom_usuario"]; ?></td>
							<td><?php echo $value["dta_cadastro"]; ?></td>
							<td><?php echo $value["admin"]==1? "Sim" : "Não"; ?></td>
							<td class="text-center"><a
								href="<?php echo "Remove.php?id=$value[cod_func]&tipo=usuario"; ?>">
									<i class="fa fa-remove"></i>
							</a></td>
							<td class="text-center"><a href=""> <i class="fa fa-pencil"></i>
							</a></td>
						</tr>
							<?php }?>
						</tbody>
				</table>
					<?php } ?>
				</div>
		</div>
	</div>
</div>

<script>
$("#frmUsuario").submit(function (event){
	event.preventDefault();
	var erros = "";
	
	if($("#nome").val() == ""){
		erros += "<li>Nome &eacute; obrigat&oacute;rio</li>"; 
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
$pagetitle = "Consultar Usuário"; // NOME DESSA P�GINA
include ("masterpage.php"); // Caminho da "masterpage.php"
?>
