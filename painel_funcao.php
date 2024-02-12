<?php
	#Funções principais do sistema

	#	Função de consulta no banco de dados
        function DBQuery ($colunas,$tabela,$parametro){
                $parametro = ($parametro) ? " {$parametro}": null;
                $tabela = ($tabela) ? " {$tabela}": null;
		$colunas = ($colunas) ? " {$colunas}": null;
                
		$sql = "SELECT {$colunas} FROM {$tabela} {$parametro}";
		
		$res = DBExecute($sql);
		return $res;
        }
        
        #       Função de alteração
        function DBUpdMembro ($tabela,$colunaevalor,$parametro){
            
                $sql="UPDATE {$tabela} SET {$colunaevalor} WHERE id={$parametro}"; 
                
                $res = DBExecute($sql);
                return $res;
        }
	
	#	Função de cadastro no banco de dados
	function DBCad($tabela,$coluna, $parametro){
		$tabela = ($tabela) ? " {$tabela}": null;
                $coluna = ($coluna) ? " {$coluna}": null;
		$parametro = ($parametro) ? " {$parametro}": null;
		
		$sql = "INSERT INTO {$tabela} ({$coluna}) VALUES ({$parametro});";
                
		$resultado = DBExecute($sql);
		return $resultado;
	}
	
        #	Função de exclusão no banco
	function DBDellReg($tabela, $parametro){
		$parametro = ($parametro) ? " {$parametro}": null;
                $tabela = ($tabela) ? " {$tabela}": null;
                
		$sql = "DELETE from {$tabela} WHERE id={$parametro};";
		
		$resultado = DBExecute($sql);
		return $resultado;

	}
        
        
        
	#	Função de execução de comandos SQL
	function DBExecute($sql){
	$conn = DBConnect();
	
	$resultado = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	DBClose($conn);
	
	return $resultado;
	}
?>