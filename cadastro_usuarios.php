<?php include 'header.php';  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Processos - 3ªCIBM</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="js/inputmask.js"></script>
</head>
	
<body>

	<div class='container'>
	
		<fieldset>
			<h3 style="text-align: center;">CADASTRO DE USUÁRIOS </h3> <hr />
			
			<form action="acao_usuarios.php" method="post" id='form-contato' enctype='multipart/form-data' style="text-align:center;">

				<!-- Input do nome de usuário -->
				<div class="col-md-6"><br />
			      <label for="usuario">Nome de Usuário</label>
			      <input type="text" class="form-control" id="usuario" name="usuario" maxlength="60"placeholder="Insira o nome de usuário" />
				</div>
				
				<!-- Input da senha -->
				<div class="col-md-6"><br />
			      <label for="senha">Senha</label>
			      <input type="password" class="form-control" id="senha" maxlength="20" name="senha" placeholder="Insira a senha" />
				</div>
				
				<!-- Input do nome completo -->
				<div class="col-md-6"><br />
			      <label for="nome_completo">Nome Completo</label>
			      <input type="text" class="form-control" id="nome_completo" maxlength="100" name="nome_completo" placeholder="Insira o nome completo" />
			    </div> 
			   
			   <!-- Input do telefone -->
				
				<div class="col-md-3"><br />
			      <label for="telefone">Telefone</label>
			      <input type="text" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Digite o número de telefone"/>
			    </div> 
				
				<!-- Input da data de cadastro -->
				 <div class="col-md-3"><br />
			      <label for="data">Data do Cadastro</label>
			      <input type="date" class="form-control" id="data_cadastro" maxlength="14" name="data_cadastro" placeholder="Data do cadastro" value="<?php echo date('Y-m-d'); ?>" disabled>
			      
			    </div>
				
				<!-- Input da Observações -->
				<div class="col-md-12"><br />
			      <label for="obs">Observações</label>
			      <textarea class="form-control" id="obs" name="obs" style="height:100px; resize:none;"  placeholder="Digite as observações"></textarea>
				</div>
				
			    
				<div class="col-md-12" style="margin-top: 15px; margin-bottom: 5px;">
			    <input type="hidden" name="acao_usuarios" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span> 
			      Salvar
			    </button>
			    <a href='painel.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span> Cancelar</a>
				</div>
				

				
			</form>
		</fieldset>
		
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/custom.js"></script>
	
	
</body>
</html>