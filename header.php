<?php
session_start();
date_default_timezone_set('America/Cuiaba');

require 'init.php';
require 'check.php';
?>

<!-- Header -->
<meta charset="utf-8">
<link rel = "shortcut icon" type = "imagem/x-icon" href = />
<div class="form-group" style="text-align:center; height: 80px; background-color: #d43f3a; color:#FFF; padding: 2px;">
    <section>
        <article style="font-weight: bold; font-size:14px; padding-top:4px;">
		<br /> SISTEMA DE ACESSO PARTICULAR <br>
        </article>
        <article style="font-size:13px;"> CADASTRO E CONSULTA DE PROTOCOLOS <br>
        </article>
    </section>
</div>
<div class="container">
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<li><a href="index.php">Página Inicial</a></li>
	<li><a href="processo.php">Processos  <span class="sr-only"></span></a></li>
	<li><a href="protocolo.php">Protocolos  <span class="sr-only"></span></a></li>
	<li><a href="relatorio.php"> Relatório <span class="sr-only"></span></a></li>
	
	       
	
	</ul>

	<ul class="nav navbar-nav navbar-right">

	<li><a href="painel.php"><span class="glyphicon glyphicon-user"></span> Usuário: <?php echo $_SESSION['user_name']; ?> </a> </li>
	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> SAIR</a></li>

	  </ul>
	</div>
	</div>
	</nav>
</div>
<!-- Fim Header -->
