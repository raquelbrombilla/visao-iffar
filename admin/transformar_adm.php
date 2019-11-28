<?php
	
	include "../conexao.php";
	session_start();

	$id = $_GET['id'];

	$sql = "update usuarios set admin = 1 where id_usuario = $id";
	$result = mysqli_query($conexao, $sql);

	if ($result == true) {
		$_SESSION['msg'] = "<div class='alert alert-success'><strong>Usuário transformado em administrador!</strong></div>";
		header('location: usuarios.php');
	} else {
		echo "ERRO";
	}

?>