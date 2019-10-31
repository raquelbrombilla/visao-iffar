<?php
	define('HOST', '127.0.0.1');
	define('USUARIO', 'root');
	define('SENHA', '1234');
	define('DB', 'visao_iffar');
		$cadastro = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
			if(!$cadastro){
 				echo"Não foi possivel cadastrar-se no banco ". PHP_EOL;
 				echo"Debugging erro:". mysqli_connect_error().PHP_EOL;
 		exit;
 		}
?>