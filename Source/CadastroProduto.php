<?php
    ob_start();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'classes/CrudProduto.php';
		require_once 'classes/Util.php';
		$u = new Util();
		$crud = new CrudProduto();
		
		if($crud->produtoExiste($_POST['codigo'])){
			if($crud->insert($_POST["codigo"], $_POST["descricao"])){
				$u->alerta("Produto gravado com sucesso!");
			}else{
				$u->alerta("Erro ao tentar gravar produto!");
			}
		}
		else{
			$u->alerta("Produto já está cadastrado");
		}
	}
?>

<div class="panel panel-default">
	<div class="panel-heading">Cadastro de Produto</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" id="frmProduto">
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label class="col-sm-2 control-label">C&oacute;digo do Produto</label>
						<div class="col-sm-3">
							<input required="required" type="number" class="form-control" name="codigo" id="codigo" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Descri&ccedil;&atilde;o do Produto</label>
						<div class="col-sm-3">
							<input required="required" type="text" class="form-control" name="descricao" id="descricao" />
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
$("#frmProduto").submit(function( event ) {
	event.preventDefault();
	var erros = "";
	
	if($("#codigo").val() == ""){
		erros += "<li>Código do Produto &eacute; obrigat&oacute;rio</li>"; 
	}
	if( $("#descricao").val() == "" ){
		erros += "<li>Descrição do Produto &eacute; obrigat&oacute;rio</li>";
	}
	
	if( erros != "" ){
		$( ".erros" ).text("");
		$( ".erros" ).prepend("<ul>"+erros+"</ul>")
	}else{
		$("#frmProduto").submit()
	}
});
</script>

<?php
    $pagemaincontent = ob_get_contents();
    ob_end_clean();
    $pagetitle = "Cadastro de produto"; // NOME DESSA P�GINA
    include("masterpage.php");// Caminho da "masterpage.php"
?>