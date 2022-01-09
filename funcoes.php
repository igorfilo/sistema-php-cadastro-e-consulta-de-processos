 <?php
		function extensao($arquivo){
			$arquivo = strtolower($arquivo);
			$explode = explode(".", $arquivo);
			$arquivo = end($explode);
		 
			return ($arquivo);
		}
		 
		define('KB', 1024);
		define('MB', 1048576); // 1024 * 1024
		define('GB', 1073741824); // 1024 * 1024 * 1024
		define('TB', 1099511627776); // 1024 * 1024 * 1024 * 1024
?>