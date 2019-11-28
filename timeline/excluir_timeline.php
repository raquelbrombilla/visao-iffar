<?php

	include "../conexao.php";
	session_start();

	$id = $_GET['id'];

	$sql = "DELETE FROM timeline WHERE id_timeline = $id";
	$result = mysqli_query($conexao, $sql); 

	if ($result) {
		$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação excluída com sucesso!</strong></div>";
		header("location: publi_timeline.php");
		exit();
	} else {

		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao excluir publicação.</strong></div>"; 		
		header("location: publi_timeline.php");
	}

	mysqli_close($conexao);
	


?>