<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao_protocolo  = (isset($_POST['acao_protocolo'])) ? $_POST['acao_protocolo'] : '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nprotocolo  = (isset($_POST['nprotocolo'])) ? $_POST['nprotocolo'] : '';
		$assunto  = (isset($_POST['assunto'])) ? $_POST['assunto'] : '';
		$data = (isset($_POST['data'])) ? $_POST['data'] : '';
		$hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';
		$destino = (isset($_POST['destino'])) ? $_POST['destino'] : '';
		$status  = (isset($_POST['status'])) ? $_POST['status'] : '';


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao_protocolo == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registro desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao_protocolo != 'excluir'):

			if ($status == ''):
			   $mensagem .= '<li>Favor preencher o Status.</li>';
			endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao_protocolo == 'incluir'):

			$sql = 'INSERT INTO tab_protocolo (nprotocolo, assunto, data, hora, destino, status)
							   VALUES(:nprotocolo, :assunto, :data, :hora, :destino, :status)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nprotocolo', date('Y', strtotime($data))."-".$id);
			$stm->bindValue(':assunto', $assunto);
			$stm->bindValue(':data', $data);
			$stm->bindValue(':hora', $hora);
			$stm->bindValue(':destino', $destino);
			$stm->bindValue(':status', $status);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			
			endif;

			echo "<meta http-equiv=refresh content='3;URL=protocolo.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao_protocolo == 'editar'):

			$sql = 'UPDATE tab_protocolo SET nprotocolo=:nprotocolo, assunto=:assunto, data=:data, hora=:hora, destino=:destino, status=:status WHERE id=:id';
			
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue( ':nprotocolo' , $_REQUEST['nprotocolo']); 
			$stm->bindValue(':assunto', $_REQUEST['assunto']);
			$stm->bindValue(':data', $_REQUEST['data']);
			$stm->bindValue(':hora', $_REQUEST['hora']);
			$stm->bindValue(':destino', $_REQUEST['destino']);
			$stm->bindValue(':status', $_REQUEST['status']);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();
			
			
			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=protocolo.php'>";
		endif;


		// Verifica se foi solicitada a exclusão dos dados
		if ($acao_protocolo == 'excluir'):

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_protocolo WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=protocolo.php'>";
		endif;
		?>

	</div>
</body>
</html>