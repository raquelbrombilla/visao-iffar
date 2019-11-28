<?php 
		session_start();
		include "conexao.php";
		
		if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Você precisa estar logado para comentar.</strong></div>";

			exit();
		}

		$usuario = $_SESSION['id_usuario'];

		$id = $_POST['id']; //id publicação
		$comentario = $_POST['comentario'];
		$data = date("Y-m-d H:i:s");
		$sql7 = "INSERT INTO comentarios(id_publicacao, id_usuario, comentario, data) values ($id , $usuario, '$comentario', '$data') ";
		echo $sql7;
		$result0 = mysqli_query($conexao, $sql7);
		if ($result0) {
			$_SESSION['msg'] = "<div class='alert alert-success'><strong>Comentário realizado com sucesso.</strong></div>";
			header("location: verMais.php?id_publicacao=$id");

			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao realizar comentário.</strong></div>";
				header("location: verMais.php?id_publicacao=$id");
			}
		
	
 ?>
