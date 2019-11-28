<?php

	include "../conexao.php";
	session_start();

	$id = $_GET['id'];

	$sql2 = "DELETE FROM `imagens` WHERE id_publicacao = $id";
	$result2 = mysqli_query($conexao, $sql2);

	$sql = "DELETE FROM `publicacao` WHERE id_publicacao = $id";
	$result = mysqli_query($conexao, $sql);


	if ($result2) {
		if ($result) {
			$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicacão negada e excluída!</strong></div>";
		header('location: solicitacoes.php');
		} else {
			$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao negar publicação.</strong></div>";
			header('location: solicitacoes.php');
			}
		
	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao negar publicação.</strong></div>";
		header('location: solicitacoes.php');
	}

	mysql_close($conexao);

?>