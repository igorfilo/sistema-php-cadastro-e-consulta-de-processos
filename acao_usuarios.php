<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Painel | Usuários</title>
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
		$acao_usuarios  = (isset($_POST['acao_usuarios'])) ? $_POST['acao_usuarios'] : '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$usuario  = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
		$senha  = (isset($_POST['senha'])) ? $_POST['senha'] : '';
		$senha_alterada = (isset($_POST['senha_alterada'])) ? $_POST['senha_alterada'] : '';
		$nome_completo = (isset($_POST['nome_completo'])) ? $_POST['nome_completo'] : '';
		$telefone = (isset($_POST['telefone'])) ? $_POST['telefone'] : '';
		$obs = (isset($_POST['obs'])) ? $_POST['obs'] : '';
		$obs = (isset($_POST['data_cadastro'])) ? $_POST['data_cadastro'] : '';


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao_usuarios == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao_usuarios != 'excluir'):

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao_usuarios == 'incluir'):

			$data_cadastro = date('Y-m-d');
			$usuario = strtolower($_POST['usuario']);
			 
			$sql = 'INSERT INTO membro (usuario, senha, nome_completo, telefone, obs, data_cadastro)
							   VALUES(:usuario, :senha, :nome_completo, :telefone, :obs, :data_cadastro)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':usuario', $usuario);
			$stm->bindValue(':senha', SHA1($senha));
			$stm->bindValue(':nome_completo', $nome_completo);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':obs', $obs);
			$stm->bindValue(':data_cadastro', $data_cadastro);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			
			endif;

			echo "<meta http-equiv=refresh content='3;URL=listar_usuarios.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao_usuarios == 'editar'):

			$sql = 'UPDATE membro SET usuario=:usuario, senha=:senha, nome_completo=:nome_completo, telefone=:telefone, obs=:obs WHERE id=:id';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue( ':usuario' , $_REQUEST['usuario']); 
			
			// Verifica se a senha foi alterada
		if (isset($_REQUEST['senha_alterada']) && $_REQUEST['senha_alterada'] != ''):

			// Criptografa a senha
			$senha = sha1($_REQUEST['senha_alterada']);

			// BindValue a senha criptografada
			$stm->bindValue(':senha', $senha);
		else:

			// Recupera a senha do banco
			$senha = $conexao->query("SELECT senha FROM membro WHERE id = {$id}")->fetchColumn();

			// BindValue a senha atual do banco
			$stm->bindValue(':senha', $senha);
		endif;
			
			$stm->bindValue(':nome_completo', $_REQUEST['nome_completo']);
			$stm->bindValue(':telefone', $_REQUEST['telefone']);
			$stm->bindValue(':obs', $_REQUEST['obs']);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();
			
			
			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Usuário editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=listar_usuarios.php'>";
		endif;


		// Verifica se foi solicitada a exclusão dos dados
		if ($acao_usuarios == 'excluir'):

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM membro WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=listar_usuarios.php'>";
		endif;
		
		?>

	</div>
</body>
</html>