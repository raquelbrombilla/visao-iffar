<?php

	include "conexao.php";
	session_start();

	$id = $_GET['id_imagem'];

	$sql3 = "select * from imagens where id_imagem = $id";
	$result3 = mysqli_query($conexao, $sql3);
	$id_publicacao = mysqli_fetch_array($result3);

	$id_publicacao2 = $id_publicacao['id_publicacao'];

	$sql = "DELETE FROM imagens WHERE id_imagem = $id";
	$result = mysqli_query($conexao, $sql); 

	if ($result) {
		$_SESSION['msg'] = "<div class='alert alert-success'><strong>Imagem excluída com sucesso!</strong></div>";
		header("location: excluir_imagens.php?id_publicacao=$id_publicacao2");
		exit();
	} else {

		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao excluir imagem.</strong></div>"; 		
		header("location: excluir_imagens.php?id_publicacao=$id_publicacao2");
	}

	mysqli_close($conexao);
	

?>