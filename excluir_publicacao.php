<?php

	include "conexao.php";
	session_start();

	$id = $_GET['id_publicacao'];
	
	$sql2 = "DELETE FROM imagens WHERE id_publicacao = $id";
	$result2 = mysqli_query($conexao, $sql2); 

	$sql3 = "DELETE FROM curtidas WHERE id_publicacao = $id";
	$result3 = mysqli_query($conexao, $sql3); 

	$sql4 = "DELETE FROM comentarios WHERE id_publicacao = $id";
	$result4 = mysqli_query($conexao, $sql4); 

	$sql = "DELETE FROM publicacao WHERE id_publicacao = $id";
	$result = mysqli_query($conexao, $sql); 

	if ($result) {
			$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação excluída com sucesso!</strong></div>";
			header("location: index.php");
			exit();
		
	} else {
		var_dump($result);
		echo $sql;
		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao excluir publicação.</strong></div>"; 		
		header("location: index.php");
	}

	header("location: index.php");


?>