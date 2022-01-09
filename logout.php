<?php
 
// inicia a sessao
session_start();
 
// muda o valor de logged_in para false
$_SESSION['logged_in'] = false;
 
// finaliza a sessao
session_destroy();
 
// retorna para a index.php
header('Location: logar.php');

?>