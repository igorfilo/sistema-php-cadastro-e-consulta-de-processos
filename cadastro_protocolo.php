<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Processos - 3ªCIBM</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "fotos/brasao-cbm.ico"/>
</head>
<body>

	<div class='container'>
	
		<fieldset>
			<h3 style="text-align: center;">CADASTRO DE PROTOCOLO</h3> <hr />
			
			<form action="acao_protocolo.php" method="post" id='form-contato' enctype='multipart/form-data' style="text-align:center;">

			    <div class="col-md-3">
			      <label for="nprotocolo">Número de Protocolo</label>
			      <input type="text" class="form-control" id="nprotocolo" name="nprotocolo" readonly />

			      <span class='msg-erro msg-nprotocolo'></span>
			    </div>
				
				

			    <div class="col-md-9">
					<label for="assunto">Assunto</label>
					<textarea class="form-control" id="assunto" name="assunto" style="height: 100px; resize: none;" placeholder="Digite o Assunto do protocolo" autofocus></textarea>
					<span class='msg-erro msg-assunto'></span>
			    </div>

			    <div class="col-md-3">
			      <label for="data">Data do Cadastro</label>
			      <input type="date" class="form-control" id="data" maxlength="14" name="data" placeholder="Informe a Data">
			      <span class='msg-erro msg-data'></span>
			    </div>
			    <div class="col-md-3">
			      <label for="hora">Hora do Cadastro</label>
			      <input type="time" class="form-control" id="hora" maxlength="10" name="hora">
			      <span class='msg-erro msg-hora'></span>
			    </div>
			    <div class="col-md-3">
					<div class="form-group">
					<label for="destino">Selecione para onde enviar</label>
                    <select class="form-control" name="destino" id="destino">
								<option value="Local 1">Local 1</option>
								<option value="Local 2">Local 2</option>
                                <option value="Local 3">Local 3</option>
                                <option value="Local 4">Local 4</option>
                                <option value="Local 5">Local 5</option>
                                <option value="Local 6">Local 6</option>
                    <span class='msg-erro msg-destino'></span>
					</select>
                    </div>
				 
			    </div>
			   
			    <div class="col-md-3">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="">Selecione o Status</option>
				    <option value="Encaminhado">Encaminhado</option>
				    <option value="Recebido">Recebido</option>
				    <option value="Arquivado">Arquivado</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>
				<div class="col-md-12" style="margin-top: 15px; margin-bottom: 5px;">
			    <input type="hidden" name="acao_protocolo" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span> 
			      Salvar
			    </button>
			    <a href='protocolo.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span> Cancelar</a>
				</div>
			</form>
		</fieldset>
		
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>