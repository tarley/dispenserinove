<?php
session_start ();
ob_start ();

require_once 'classes/CrudUsuario.php';
require_once 'classes/Util.php';
$u = new Util ();
$crud = new Usuario ();

if (!$crud->is_admin ()) {
	$u->alerta ( "Sem acesso!" );
	$usuario->redirect ( "ConsultarRetirada.php" );
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	if ($crud->verificar_nome_usuario ( $_POST [nome_usuario] )) {
		if ($crud->register ( $_POST [nome], $_POST [turno], $_POST [senha], $_POST [nome_usuario], $_POST [admin] )) {
			$u->alerta ( "Usuario gravado com sucesso!" );
		} else {
			$u->alerta ( "Erro ao tentar gravar usuario" );
		}
	} else {
		$u->alerta ( "Nome de usuario j� existe" );
	}
}
?>
<div class="panel panel-default">
	<div class="panel-heading">Cadastro de Usu&aacuterio</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id="frmUsuario">
			<div class="row">
				<div class="col-md-12">
					<span class="erros"> </span>

					<div class="form-group">
						<label class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nome" id="nome" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nome de usu&aacuterio</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nome_usuario"
								id="nome_usuario" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Turno</label>
						<div class="col-sm-3">
							<select class="form-control" name="turno" id="turno">
								<option value="m">Manh&atilde;</option>
								<option value="t">Tarde</option>
								<option value="n">Noite</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Senha</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" name="senha"
								id="senha" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Confirma&ccedil;&atilde;o da
							Senha</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" name="csenha"
								id="csenha" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-3">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" id="admin" value="1" name="admin"> <label
									for="inlineCheckbox3">Administrador </label>
							</div>
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
$("#frmUsuario").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#nome").val() == ""){
		erros += "<li>Nome &eacute; obrigat&oacute;rio</li>"; 
	}
	if( $("#nome_usuario").val() == "" ){
		erros += "<li>Nome de usu&aacute;rio &eacute; obrigat&oacute;rio</li>";
	}
	if( $("#senha").val() != $("#csenha").val() ){
		erros += "<li>A senha e a confirma&ccedil;&atilde;o est&atilde;o diferentes</li>";
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
$pagetitle = "Cadastro de usu&aacuterio"; // NOME DESSA P�GINA
include ("masterpage.php");// Caminho da "masterpage.php"
?>