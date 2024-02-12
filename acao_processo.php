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
		require 'funcoes.php';

		error_reporting(E_ERROR | E_PARSE);

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao_processo  = (isset($_POST['acao_processo'])) ? $_POST['acao_processo'] : '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nprotocolo  = (isset($_POST['nprotocolo'])) ? $_POST['nprotocolo'] : '';
		$assunto  = (isset($_POST['assunto'])) ? $_POST['assunto'] : '';
		$data = (isset($_POST['data'])) ? $_POST['data'] : '';
		$hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';
		$destino = (isset($_POST['destino'])) ? $_POST['destino'] : '';
		$interessado  = (isset($_POST['interessado'])) ? $_POST['interessado'] : '';
		$arquivo  = (isset($_POST['arquivo'])) ? $_POST['arquivo'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao_processo == 'editar' && $id == '') :
			$mensagem .= '<li>ID do registros desconhecido.</li>';
		endif;

		// Se for ação diferente de excluir valida os dados obrigatórios
		if ($acao_processo != 'excluir') :

			if ($interessado == '') :
				$mensagem .= '<li>Favor preencher o interessado.</li>';
			endif;

			if ($mensagem != '') :
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>" . $mensagem . "</div> ";
				exit;
			endif;

		endif;

		// Verifica se foi solicitada a inclusão de dados
		if ($acao_processo == 'incluir') :

			//  <!-- Inicio do upload de arquivo --> 
			{
				// arquivo
				$arquivo = $_FILES['arquivo'];

				// Tamanho máximo do arquivo (em Bytes)
				$tamanhoPermitido = 1024 * 1024 * 10; // 10Mb

				//Define o diretorio para onde enviaremos o arquivo
				$diretorio = "uploads/";

				// verifica se arquivo foi enviado e sem erros
				if ($arquivo['error'] == UPLOAD_ERR_OK) {

					// pego a extensão do arquivo
					$extensao = extensao($arquivo['name']);

					// valida a extensão
					if (in_array($extensao, array("pdf"))) {

						// verifica tamanho do arquivo
						if ($arquivo['size'] > $tamanhoPermitido) {

							$msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até " . $tamanhoPermitido / MB . " MB.";
							$class = "alert-warning";
						} else {
							// Recebe o número de protocolo
							$nprotocolo = $_POST['nprotocolo'];

							// Gera o nome do arquivo
							$nome_arquivo = $nprotocolo . "-" . $data . "." . $extensao;

							// Verifica se o novo_nome contém "/"
							if (strpos($nome_arquivo, "/") !== false) :

								// Substitui todas as ocorrências de "/" por ""
								$novo_nome = str_replace("/", "", $nome_arquivo);

								// Atualiza o nome do arquivo
								$nome_arquivo = $novo_nome;

							endif;

							// atribui novo nome ao arquivo
							$novo_nome  = $nome_arquivo;

							// faz o upload
							$enviou = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);
						}
					}
				}
			}

			//  <!-- Fim do upload de arquivo --> 

			$sql = 'INSERT INTO tab_processos (nprotocolo, assunto, data, hora, destino, interessado, arquivo)
							   VALUES(:nprotocolo, :assunto, :data, :hora, :destino, :interessado, :arquivo)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nprotocolo', $nprotocolo);
			$stm->bindValue(':assunto', $assunto);
			$stm->bindValue(':data', $data);
			$stm->bindValue(':hora', $hora);
			$stm->bindValue(':destino', $destino);
			$stm->bindValue(':interessado', $interessado);
			$stm->bindValue(':arquivo', $novo_nome);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";

			endif;

			echo "<meta http-equiv=refresh content='3;URL=processo.php'>";
			$conexao = null;
		endif;

		// Verifica se foi solicitada a edição de dados
		if ($acao_processo == 'editar') :

			$sql = 'UPDATE tab_processos SET nprotocolo=:nprotocolo, assunto=:assunto, data=:data, hora=:hora, destino=:destino, interessado=:interessado, arquivo=:arquivo WHERE id=:id';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nprotocolo', $_REQUEST['nprotocolo']);
			$stm->bindValue(':assunto', $_REQUEST['assunto']);
			$stm->bindValue(':data', $_REQUEST['data']);
			$stm->bindValue(':hora', $_REQUEST['hora']);
			$stm->bindValue(':destino', $_REQUEST['destino']);
			$stm->bindValue(':interessado', $_REQUEST['interessado']);
			$stm->bindValue(':arquivo', $_REQUEST['arquivo']);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=processo.php'>";
		endif;


		// Verifica se foi solicitada a exclusão dos dados
		if ($acao_processo == 'excluir') :

			// Obtém o nome do arquivo do banco de dados
			$sql = 'SELECT arquivo FROM tab_processos WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->execute();
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			$novo_nome = basename($row['arquivo']);
		
			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_processos WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();
		
			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;
		
			// Verifica se o arquivo existe
			if (file_exists($diretorio . $novo_nome)) :
		
				// Verifica se o arquivo pode ser excluído
				if (is_writable($diretorio . $novo_nome)) :
		
					// Exclui o arquivo
					unlink($diretorio . $novo_nome);
		
				else :
					echo "<div class='alert alert-danger' role='alert'>O arquivo não pode ser excluído!</div>";
				endif;
		
			endif;
			echo "<meta http-equiv=refresh content='3;URL=processo.php'>";
		
		endif;
		$conexao = null;
		?>
	</div>
</body>

</html>