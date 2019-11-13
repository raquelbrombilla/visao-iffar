<?php
	$server = "localhost";
	$user = "root";
	$senha = "root";
	$banco = "visao_iffar"; 

	$conexao = mysqli_connect($server, $user, $senha, $banco);

	if(!$conexao){
		echo "Não foi possível conectar ao MySQL.".PHP_EOL;

		echo "Debugging erro: ".mysqli_connect_error(),PHP_EOL;
		exit;
	} 

?>
