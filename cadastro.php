<?php include 'header.php';  ?>
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
			<h3 style="text-align: center;">CADASTRO DE PROCESSOS </h3> <hr />
			
			<form action="acao_processo.php" method="post" id='form-contato' enctype='multipart/form-data' style="text-align:center;">

			    <div class="col-md-6">
			      <label for="nprotocolo">Número de Protocolo</label>
			      <input type="text" class="form-control" id="nprotocolo" name="nprotocolo" placeholder="Infome o Número de Protocolo" onKeyPress = "tecla()" maxlength="22">
			      <span class='msg-erro msg-nprotocolo'></span>
			    </div>
				
				<!-- Função para inserir apenas números no campo "nº de protocolo" 
				<script>
				  function tecla(){
					evt = window.event;
					var tecla = evt.keyCode;

					if(tecla > 47 && tecla > 58){ 
					  alert('Digite apenas números de Protocolo');
					  evt.preventDefault();
					}
				  }
				</script> !-->
				

			    <div class="col-md-6">
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
                    <span class='msg-erro msg-destino'></span>
					</select>
                    </div>
				  
				 
			    </div>
			   
			    <div class="col-md-3">
			      <label for="interessado">Interessado</label>
			      <select class="form-control" name="interessado" id="interessado">
				    
					<option value="">Selecione a pessoa interessada</option>
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
			    
			    <div class="col-md-6">
			      <label for="hora">Upload de arquivo</label>
			      <input type="file" class="form-control" id="arquivo" name="arquivo">
			      <span class='msg-erro msg-arquivo'></span>
			    </div>
			    
			    
				<div class="col-md-12" style="margin-top: 15px; margin-bottom: 5px;">
			    <input type="hidden" name="acao_processo" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'><span class="glyphicon glyphicon-ok"> </span> 
			      Salvar
			    </button>
			    <a href='processo.php' class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span> Cancelar</a>
				</div>
				

				
			</form>
		</fieldset>
		
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/custom.js"></script>
	
	
</body>
</html>