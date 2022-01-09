<?php
// inclui o arquivo de inicializa�ao
require 'init.php';
// resgata vari�veis do formul�rio
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
if (empty($login) || empty($senha))
{
	echo "<div class='alert alert-danger' role='alert'>DIGITE O LOGIN E A SENHA</div> ";
	echo "<meta http-equiv=refresh content='3;URL=logar.php'>";
exit;
}
// cria o hash da senha
$passwordHash = make_hash($senha);
$PDO = db_connect();
$sql = "SELECT id, nome FROM usuarios WHERE login =:login AND senha =:senha";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $passwordHash);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($users) <= 0)
{
    echo "<div class='alert alert-danger' role='alert'>USUARIO OU SENHA INCORRETOS</div> ";
	echo "<meta http-equiv=refresh content='3;URL=logar.php'>";
    exit;
}
// pega o primeiro usu�rio
$user = $users[0];
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nome'];
header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/css/custom.css">
</head>
</html>