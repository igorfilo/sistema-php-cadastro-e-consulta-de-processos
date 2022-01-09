<?php
require 'conexao.php';

// Recebe o id do processo do processo via GET
$id_processo = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_processo) && is_numeric($id_processo)):

	// Captura os dados do processo solicitado
	$conexao = conexao::getInstance();
	$sql = "SELECT id, nprotocolo, assunto, data, hora, destino, interessado, arquivo FROM tab_processos WHERE id = :id";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_processo);
	$stm->execute();
	$processo = $stm->fetch(PDO::FETCH_OBJ);


endif;

?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Processos - 3ªCIBM</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "fotos/brasao-cbm.ico"/>
	
</head>
<body>
	<div class='container'>
		
		<fieldset>
		<div id="label">
			<legend><h3 style="text-align:center;">EDIÇÃO DE PROCESSOS</h3></legend>
			
			<?php if(empty($processo)):?>
				<h3 class="text-center text-danger">Processo não encontrado!</h3>
			<?php else: ?>
				<form action="acao_processo.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="col-md-6">
			      <label for="nprotocolo">Número de Protocolo</label>
			      <input type="text" class="form-control" id="nprotocolo" name="nprotocolo" value="<?=$processo->nprotocolo?>" readonly />
			      
			    </div>

			    <div id="assuntotxt" class="col-md-6">
			      <label for="assunto">Assunto</label>
			      <textarea class="form-control" id="assunto" name="assunto" style="height:100px; resize:none;" value="<?=$processo->assunto?>" placeholder="Digite o Assunto do Protocolo"><?=$processo->assunto?></textarea>
				  
			      <span class='msg-erro msg-assunto'></span>
			    </div>

			    <div class="col-md-3">
			      <label for="data">Data</label>
			      <input type="date" class="form-control" id="data" maxlength="14" name="data" value="<?=$processo->data?>" readonly />
			     
			    </div>
			    <div class="col-md-3">
			      <label for="hora">Hora</label>
			      <input type="time" class="form-control" id="hora" maxlength="10" name="hora" value="<?=$processo->hora?>" readonly />
			      
			    </div>
			    <div class="col-md-3">
			      <label for="destino">UBM/Setor de Destino</label>
			      <select class="form-control" name="destino" id="destino">
											<option value="<?=$processo->destino?>"><?=$processo->destino?></option>
											<option value="DAI">------- DAI -------</option>
                                            <option value="BM-1">BM-1</option>
                                            <option value="BM-2">BM-2</option>
                                            <option value="BM-3">BM-3</option>
                                            <option value="BM-4">BM-4</option>
                                            <option value="BM-5">BM-5</option>
                                            <option value="BM-6">BM-6</option>
                                            <option value="BM-7">BM-7</option>
                                            <option value="BM-8">BM-8</option>
                                            <option value="BM-9">BM-9</option>
                                            <option value="BM-10">BM-10</option>
                                            <option value="DEIP">------- DEIP -------</option>
                                            <option value="DOP">------- DOP -------</option><br>
                                            <option value="DSCIP">------- DSCIP -------</option><br>
                   
					</select>
			      <span class='msg-erro msg-destino'></span>
			    </div>
			   
			    <div class="col-md-3">
			      <label for="interessado">Interessado</label>
			      <select class="form-control" name="interessado" id="interessado">
				    <option value="<?=$processo->interessado?>"><?=$processo->interessado?></option>
				    <option value="Nome 1">Nome 1</option>
				    <option value="Nome 2">Nome 2</option>
				    <option value="Nome 3">Nome 3</option>
				    <option value="Nome 4">Nome 4</option>
				    <option value="Nome 5">Nome 5</option>
				    <option value="Nome 6">Nome 6</option>
				    <option value="Nome 7">Nome 7</option>
				    <option value="Nome 8">Nome 8</option>
				    <option value="Nome 9">Nome 9</option>
				    <option value="Nome 10">Nome 10</option>
				  </select>
				  <span class='msg-erro msg-interessado'></span>
			    </div>
			    
			    <div class="col-lg-6"> 
			    <br />
			      <label for="arquivo">Arquivo Enviado</label> 
			      <br />
			     <div class="btn-group btn-group-lg" style="font-size: 40px;"> 
                    <a href="uploads/<?=$processo->arquivo?>" <span class="glyphicon glyphicon-folder-open" target="_blank"> </span> </a>
		     
			    </div>
			    </div>
			    
			    </div>
				    <input type="hidden" name="acao_processo" value="editar">
				    <input type="hidden" name="id" value="<?=$processo->id?>">
				 
				<div class="col-md-12" style="margin-top: 30px; text-align:center; margin-bottom: 10px;">
					<button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span>
				      Salvar
				    </button>
				    <a href='processo.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Cancelar</a>
				</div>
				</form>
			<?php endif; ?>
		</fieldset>
<?php include 'footer.php'; ?>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>