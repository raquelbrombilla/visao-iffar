<?php

	include "../conexao.php";
	session_start();

	$id = $_GET['id'];

	$sql = "UPDATE `publicacao` SET `ativa`= 1 WHERE id_publicacao = $id";
	$result = mysqli_query($conexao, $sql);


	if ($result) {
		$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicacão aceita!</strong></div>";
		header('location: solicitacoes.php');
	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao aceitar publicação.</strong></div>";
		header('location: solicitacoes.php');
	}

	mysql_close($conexao);

?>