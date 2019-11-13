<?php
	
	include "conexao.php";
	session_start();

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			exit();
		}

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$foto = $_FILES['foto']['name'];
	$data = $_POST['data'];

	if (isset($_FILES['foto']['name'] ) && $_FILES['foto']['error'] == 0) {
 
	    $arquivo_tmp = $_FILES['foto']['tmp_name'];
	    $imagem = $_FILES['foto']['name'];
	    
	    $extensao = pathinfo ( $imagem, PATHINFO_EXTENSION );// Pega a extensão
	    $extensao = strtolower ( $extensao ); // Converte a extensão para minúsculo
	  
	    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { // Somente imagens, .jpg;.jpeg;.gif;.png
	        // Cria um nome unico p imagem, evita que tenha 2x a imagem no servidor
	        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
	        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
	        $destino = 'imagensHome/'. $novoNome; //caminho das imagem

	        if (move_uploaded_file ( $arquivo_tmp, $destino) ) {

	        	if ($_SESSION['admin'] == 1) {
	        		$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', 1, ".$_SESSION['id_usuario'].")";
					$result = mysqli_query($conexao, $sql);
	        	} else {
	        		$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', 0, ".$_SESSION['id_usuario'].")";
					$result = mysqli_query($conexao, $sql);
	        	}

				$sql2 = "select id_publicacao from publicacao order by id_publicacao desc limit 1";
				$result2 = mysqli_query($conexao, $sql2);

				$id = mysqli_fetch_array($result2);

				$id_publicacao = $id['id_publicacao'];

				$sql3 = "insert into imagens(id_publicacao, endereco) values('$id_publicacao','$novoNome')";
				$result3 = mysqli_query($conexao, $sql3);

				if (mysqli_insert_id($conexao)) {
					if ($_SESSION['admin'] == 1){
						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação cadastrada!</strong></div>";
					header("location: cadastro_publicacao.php");
					exit();
				} else {
					$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação enviada! Aguarde a confirmação.</strong></div>";
					header("location: cadastro_publicacao.php");
					exit();
					}

				} else {

					$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao cadastrar publicação.</strong></div>";
					header("location: cadastro_publicacao.php");
				}
			}
		}

	} else {

				if ($_SESSION['admin'] == 1) {
	        		$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', 1, ".$_SESSION['id_usuario'].")";
					$result = mysqli_query($conexao, $sql);
	        	} else {
	        		$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', 0, ".$_SESSION['id_usuario'].")";
					$result = mysqli_query($conexao, $sql);
	        	}

				if (mysqli_insert_id($conexao)) {
					if ($_SESSION['admin'] == 1){
						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação cadastrada!</strong></div>";
					header("location: cadastro_publicacao.php");
					exit();
					} else {
						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação enviada! Aguarde a confirmação.</strong></div>";
					header("location: cadastro_publicacao.php");
					exit();
					}

				} else {
					$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao cadastrar publicação.</strong></div>";
					header("location: cadastro_publicacao.php");
				}

		}

	mysqli_close($connection);

?>