<?php
require 'conexao.php';

// Recebe o id do protocolo do protocolo via GET
$id_usuarios = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_usuarios) && is_numeric($id_usuarios)):

	// Captura os dados do protocolo solicitado
	$conexao = conexao::getInstance();
	$sql = "SELECT * FROM membro WHERE id = :id";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_usuarios);
	$stm->execute();
	$usuarios = $stm->fetch(PDO::FETCH_OBJ);


endif;

?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Painel | Editar Usuário</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "fotos/brasao-cbm.ico"/>
	
</head>
<body>
	<div class='container'>
		
		<fieldset>
		<div id="label">
			<legend><h3 style="text-align:center;">EDITAR USUÁRIOS</h3></legend>
			
			<?php if(empty($usuarios)):?>
				<h3 class="text-center text-danger">Usuário não encontrado!</h3>
			<?php else: ?>
				<form action="acao_usuarios.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
				<!-- exibir nome de usuário -->
				<div class="col-md-6"><br />
			      <label for="usuario">Nome de Usuário</label>
			      <input type="text" class="form-control" id="usuario" name="usuario" value="<?=$usuarios->usuario?>" />
				  <span class='msg-erro msg-usuario'></span>
				</div>

				<!-- campo senha para ser alterado caso necessário -->
			    <div class="col-md-6"><br />
			      <label for="senha">Senha</label>
			      <input type="hidden" class="form-control" id="senha" maxlength="20" name="senha" value="<?=$usuarios->senha?>"  /> 
			      <input type="password" class="form-control" id="senha_alterada" maxlength="20" name="senha_alterada" placeholder="Digite apenas se for alterar a senha"  />		     
			    </div>
				
				<!-- exibir nome completo -->
				<div class="col-md-6"><br />
			      <label for="nome_completo">Nome Completo</label>
			      <input type="text" class="form-control" id="nome_completo" maxlength="14" name="nome_completo" value="<?=$usuarios->nome_completo?>"  />
			     
			    </div> 

				<!-- exibir telefone -->
				<div class="col-md-3"><br />
			      <label for="telefone">Telefone</label>
			      <input type="text" class="form-control" id="telefone" maxlength="14" name="telefone" value="<?=$usuarios->telefone?>"  />
			     
			    </div>
				
				<!-- exibir data de cadastro -->
				<div class="col-md-3"><br />
					<label for="data_cadastro">Data de Cadastro</label> <br />
					<?php echo date('d/m/Y', strtotime($usuarios->data_cadastro)); ?>
			   </div>
			   
			   <!-- exibir observações -->
			     <div class="col-md-12"><br />
			      <label for="obs">Observações</label>
			      <textarea class="form-control" id="obs" name="obs" style="height:100px; resize:none;" value="<?=$usuarios->obs?>" placeholder="Digite as observações"><?=$usuarios->obs?></textarea>
			    </div>
				

			    </div>
				    <input type="hidden" name="acao_usuarios" value="editar">
				    <input type="hidden" name="id" value="<?=$usuarios->id?>">
				 
				<div class="col-md-12" style="margin-top: 30px; text-align:center; margin-bottom: 10px;">
					<button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span>
				      Salvar
				    </button>
				    <a href='listar_usuarios.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Cancelar</a>
				</div>
				</form>
			<?php endif; ?>
		</fieldset>
<?php include 'footer.php'; ?>
	</div>
	<script type="text/javascript" src="js/custom_usuarios.js"></script>
</body>
</html>