<?php

	include "conexao.php";
	session_start();

	if( !isset($_SESSION['admin']) ){
		$_SESSION['msg'] = "Somente administradores.";
		exit();
	}

	$id = $_POST['id'];
	$titulo = $_POST['titulo'];
	$data = $_POST['data'];	
	$descricao = $_POST['descricao'];
	

		if ($_SESSION['admin'] == 1) {
				$sql = "update publicacao  set `descricao` = '$descricao', `titulo` = '$titulo', `data` = '$data' where id_publicacao = $id";
				$result = mysqli_query($conexao, $sql);
				
		} else {
				$sql = "update publicacao  set `descricao` = '$descricao', `titulo` = '$titulo', `data` = '$data', `ativa` = 0 where id_publicacao = $id";
				$result = mysqli_query($conexao, $sql);
		}

		if ($result) {
				if ($_SESSION['admin'] == 1){
					$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação atualizada!</strong></div>";
					header("location: verMais.php?id_publicacao=$id");
				} else {
					$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação atualizada e enviada para confirmação.</strong></div>";
					header("location: verMais.php?id_publicacao=$id");
				}
		} else {
				$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao atualizar publicação.</strong></div>";
				header("location: verMais.php?id_publicacao=$id");
				}



	mysqli_close($conexao);


?>