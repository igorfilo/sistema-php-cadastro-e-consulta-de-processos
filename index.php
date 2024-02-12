<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Página Inicial</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" type="imagem/x-icon" href="fotos/brasao-cbm.ico" />
</head>

<body>

	<div class='container'>
		<fieldset>

			<div class="col-md-6">
				<a href='processo.php'>
					<article id="bloco"> <span class="glyphicon glyphicon-file"></span> PROCESSOS </article>
				</a>
			</div>
			<div class="col-md-6">
				<a href='protocolo.php' class="processo-bloco2">
					<article id="bloco2"> <span class="glyphicon glyphicon-tag"></span> PROTOCOLOS </article>
				</a>
			</div>
			<div class="col-md-6">
				<a href='painel.php'>
					<article id="bloco"> <span class="glyphicon glyphicon-user"></span> USUÁRIOS </article>
				</a>
			</div>

		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
<footer>
	<?php include 'footer.php'; ?>
</footer>

</html>