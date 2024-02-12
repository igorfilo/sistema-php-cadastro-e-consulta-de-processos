<?php
#	inclue arquivos necessarios.

require 'conexao.php';
require 'Utils.php';


?>

<!--	Menu painel admin -->
<html>
	<head>
	<meta charset="utf-8">
	<title>Listagem de Processos</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = ""/>
	
	<?php include 'header.php';?>
		
	</head>
<body>
    <center>
    <h2>PAINEL ADMINISTRATIVO</h2>
       
		<div class='container'>
			<fieldset>		
			<div class="col-md-6">
			<a href='listar_usuarios.php'><article id="bloco"> <span class="glyphicon glyphicon-list-alt"></span> Listar Usuários </article></a>
			</div>
			<div class="col-md-6">
			<a href='cadastro_usuarios.php' class="processo-bloco2"><article id="bloco2"> <span class="glyphicon glyphicon-plus"></span> Cadastrar Usuários </article></a>
			</div> <br/>
			<div class="col-md-6">
			<a href='#'><article id="bloco"> <span class="glyphicon glyphicon-wrench"></span> Cadastrar Administrador </article></a>
						
			</fieldset>
		
		</div>

    </center>
</body>
<footer>
	<?php include 'footer.php'; ?> 
</footer>
</html>
