<?php
	
	include "../conexao.php";
	session_start();

	$id = $_GET['id'];

	$sql = "update usuarios set admin = 0 where id_usuario = $id";
	$result = mysqli_query($conexao, $sql);

	if ($result == true) {
		$_SESSION['msg'] = "<div class='alert alert-success'><strong>Ação concluída! Este usuário não é mais um administrador.</strong></div>";
		header('location: usuarios.php');
	} else {
		echo "ERRO";
	}

?>