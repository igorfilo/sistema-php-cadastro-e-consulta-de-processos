<?php include 'header.php';

require 'conexao.php';
$conexao = conexao::getInstance();
// Executa um SELECT para retornar os nomes dos membros
$sql = 'SELECT nome_completo FROM membro';
$stm = $conexao->prepare($sql);
$stm->execute();

// Armazena os resultados do SELECT em um array
$resultados = $stm->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Processos</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" type="imagem/x-icon" href="#" />
</head>

<body>

	<div class='container'>

		<fieldset>
			<h3 style="text-align: center;">CADASTRO DE PROCESSOS </h3>
			<hr />

			<form action="acao_processo.php" method="post" id='form-contato' enctype='multipart/form-data' style="text-align:center;">

				<div class="col-md-6">
					<label for="nprotocolo">Número de Protocolo</label>
					<input type="text" class="form-control" id="nprotocolo" name="nprotocolo" placeholder="Infome o Número de Protocolo" onKeyPress="tecla()" maxlength="22">
					<span class='msg-erro msg-nprotocolo'></span>
				</div>

				<div class="col-md-6">
					<label for="assunto">Assunto</label>
					<textarea class="form-control" id="assunto" name="assunto" style="height: 100px; resize: none;" placeholder="Digite o Assunto do protocolo" autofocus></textarea>
					<span class='msg-erro msg-assunto'></span>
				</div>

				<div class="col-md-3">
					<label for="data">Data do Cadastro</label>
					<input type="date" class="form-control" id="data" maxlength="14" name="data" value="<?php echo date('Y-m-d'); ?>">
					<span class='msg-erro msg-data'></span>
				</div>
				<div class="col-md-3">
					<label for="hora">Hora do Cadastro</label>
					<input type="time" class="form-control" id="hora" maxlength="10" name="hora" value="<?php echo date('H:i'); ?>">
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
					<select class="form-control" id="interessado" name="interessado">
						<option value="">Selecione um interessado</option>
						<?php foreach ($resultados as $resultado) : ?>
							<option value="<?php echo $resultado['nome_completo']; ?>"><?php echo $resultado['nome_completo']; ?></option>
						<?php endforeach; ?>
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
					<button type="submit" class="btn btn-primary" id='botao'>
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