<?php
		
		include "conexao.php";
		session_start();
    	
    	if (!isset($_SESSION['id_usuario'])) {
	      $_SESSION['msg'] = "<div class='alert alert-danger'><strong>É necessário fazer login para curtir a publicação!<strong></div>";
	      header('location: login.php');
	      exit();
	    } 

	    //$id_curtida = $_GET['id_curtida'];
	    //$data = date("Y-m-d H-i-s");
	    $id_usuario = $_SESSION['id_usuario'];
	    $id_postagem = $_GET['id_postagem'];
	    $data = date('Y-m-d H:i:s');
	    

	  	//Algum teste para ver se o usuário já curtiu a publi.
	  	$select = "SELECT * FROM curtidas WHERE  id_usuario = $id_usuario and id_publicacao = $id_postagem";
	  	$puxar = mysqli_query($conexao, $select);
	  	$rows = mysqli_num_rows($puxar);

	  	//Se não retornar nenhuma linha(0), é porque ninguém curtiu, então..


	  	if($rows == 0){

	    	$adiciona = "INSERT INTO curtidas (id_usuario, id_publicacao,data) VALUES ($id_usuario, $id_postagem, '$data')";

		    $result = mysqli_query($conexao, $adiciona);
		    //header("location: verMais.php?id_publicacao=$id_postagem");
		   // $_SESSION['msg'] = "<div class='alert alert-'><strong>Curtida realizada com</strong></div>";
		   header("location:verMais.php?id_publicacao=$id_postagem");
	   
		//Se alguém curtiu, irá retornar um linha, então quer dizer que a pessoa "desfazer o like", já que só pode curtir uma vez
		} else{
			$excluircurtida = "DELETE FROM curtidas WHERE id_publicacao = $id_postagem and id_usuario = $id_usuario";
			echo $excluircurtida;
			$result2 = mysqli_query($conexao, $excluircurtida);
			//header("location: verMais.php?id_publicacao=$id_postagem
			header("location:verMais.php?id_publicacao=$id_postagem");
		}
	?>
