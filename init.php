<?php
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'processo');
// habilita todas as exibi�oes de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
// inclui o arquivo de fun�oees
require_once 'function.php';
?>