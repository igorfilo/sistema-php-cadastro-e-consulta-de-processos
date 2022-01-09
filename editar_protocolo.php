<?php
require 'conexao.php';

// Recebe o id do protocolo do protocolo via GET
$id_protocolo = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_protocolo) && is_numeric($id_protocolo)):

	// Captura os dados do protocolo solicitado
	$conexao = conexao::getInstance();
	$sql = "SELECT id, nprotocolo, assunto, data, hora, destino, status FROM tab_protocolo WHERE id = :id";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_protocolo);
	$stm->execute();
	$protocolo = $stm->fetch(PDO::FETCH_OBJ);


endif;

?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Protocolo - 3ªCIBM</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "fotos/brasao-cbm.ico"/>
	
</head>
<body>
	<div class='container'>
		
		<fieldset>
		<div id="label">
			<legend><h3 style="text-align:center;">EDIÇÃO DE PROTOCOLO</h3></legend>
			
			<?php if(empty($protocolo)):?>
				<h3 class="text-center text-danger">protocolo não encontrado!</h3>
			<?php else: ?>
				<form action="acao_protocolo.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="col-md-3">
			      <label for="nprotocolo">Número de Protocolo</label>
			      <input type="text" class="form-control" id="nprotocolo" name="nprotocolo" value="<?php echo date('Y', strtotime($protocolo->data));?>-<?=$protocolo->id?>" readonly />
			    </div>

			    <div id="assuntotxt" class="col-md-9">
			      <label for="assunto">Assunto</label>
			      <textarea class="form-control" id="assunto" name="assunto" style="height:100px; resize:none;" value="<?=$protocolo->assunto?>" placeholder="Digite o Assunto do Protocolo"><?=$protocolo->assunto?></textarea>
				  
			      <span class='msg-erro msg-assunto'></span>
			    </div>

			    <div class="col-md-3">
			      <label for="data">Data</label>
			      <input type="date" class="form-control" id="data" maxlength="14" name="data" value="<?=$protocolo->data?>" readonly />
			     
			    </div>
			    <div class="col-md-3">
			      <label for="hora">Hora</label>
			      <input type="time" class="form-control" id="hora" maxlength="10" name="hora" value="<?=$protocolo->hora?>" readonly />
			      
			    </div>
			    <div class="col-md-3">
			      <label for="destino">UBM/Setor de Destino</label>
			      <select class="form-control" name="destino" id="destino">
								<option value="<?=$protocolo->destino?>"><?=$protocolo->destino?></option>
								<option value="Local 1">Local 1</option>
								<option value="Local 2">Local 2</option>
                                <option value="Local 3">Local 3</option>
                                <option value="Local 4">Local 4</option>
                                <option value="Local 5">Local 5</option>
                                <option value="Local 6">Local 6</option>
                   
					</select>
			      <span class='msg-erro msg-destino'></span>
			    </div>
			   
			    <div class="col-md-3">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="<?=$protocolo->status?>"><?=$protocolo->status?></option>
				    <option value="Encaminhado">Encaminhado</option>
				    <option value="Recebido">Recebido</option>
				    <option value="Arquivado">Arquivado</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>
			    </div>
				    <input type="hidden" name="acao_protocolo" value="editar">
				    <input type="hidden" name="id" value="<?=$protocolo->id?>">
				 
				<div class="col-md-12" style="margin-top: 30px; text-align:center; margin-bottom: 10px;">
					<button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span>
				      Salvar
				    </button>
				    <a href='protocolo.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Cancelar</a>
				</div>
				</form>
			<?php endif; ?>
		</fieldset>
<?php include 'footer.php'; ?>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>