<?php
    ob_start();
?>

<div class="panel panel-default">
	<div class="panel-heading">Cadastro de Produtos</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label class="col-sm-2 control-label">Codigo do Produto</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Descri&ccedil;&atilde;o do Produto</label>
						<div class="col-sm-3">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Data de Validade</label>
						<div class="col-sm-3">
							<input type="date" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Status do Pedido <br>
						</label>
						<div class="col-sm-10">
							<div class="radio radio-info radio-inline">
								<input type="radio" id="inlineRadio1" value="option1"
									name="radioInline" checked=""> <label for="inlineRadio1"> Ativo
								</label>
							</div>
							<div class="radio radio-inline">
								<input type="radio" id="inlineRadio2" value="option2"
									name="radioInline"> <label for="inlineRadio2"> Inativo </label>
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

<?php
    $pagemaincontent = ob_get_contents();
    ob_end_clean();
    $pagetitle = "Cadastro de produto"; // NOME DESSA PÁGINA
    include("masterpage.php");// Caminho da "masterpage.php"
?>