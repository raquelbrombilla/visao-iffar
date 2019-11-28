<?php
	
	include "conexao.php";
	session_start();

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			exit();
		}

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$total = count($_FILES['foto']['name']);
	$data = $_POST['data'];
	$date = date('Y-m-d H:i:s');	

			if ($_SESSION['admin'] == 1) {
				$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `data_publicacao`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', '$date', 1, ".$_SESSION['id_usuario'].")";
				$result = mysqli_query($conexao, $sql);
			} else {
				$sql = "insert into publicacao (`descricao`, `titulo`, `data`, `data_publicacao`, `ativa`, `id_usuario`) values ('$descricao', '$titulo', '$data', '$date', 0, ".$_SESSION['id_usuario'].")";
				$result = mysqli_query($conexao, $sql);
				
			}

			if ($result) {
					if ($_SESSION['admin'] == 1){
						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação cadastrada!</strong></div>";
					} else {
						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação enviada! Aguarde a confirmação.</strong></div>";
					}

				} else {
					$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao cadastrar publicação.</strong></div>";
				}

	for ($i=0; $i < $total; $i++) { 
			
			if (isset($_FILES['foto']['name'][$i]) && $_FILES['foto']['error'][$i] == 0) {
	 			
		    $arquivo_tmp = $_FILES['foto']['tmp_name'][$i];
		    $imagem = $_FILES['foto']['name'][$i];
		    
		    $extensao = pathinfo ( $imagem, PATHINFO_EXTENSION );// Pega a extensão
		    $extensao = strtolower ( $extensao ); // Converte a extensão para minúsculo

		    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { // Somente imagens, .jpg;.jpeg;.gif;.png
		        // Cria um nome unico p imagem, evita que tenha 2x a imagem no servidor
		        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
		        $novoNome = uniqid ( time () ) . '.' . $extensao;
	 
		        $destino = 'img/imagensPublicacoes/'. $novoNome; //caminho das imagem

		        if (move_uploaded_file ( $arquivo_tmp, $destino) ) {	        	

					$sql2 = "select id_publicacao from publicacao where id_usuario = ".$_SESSION['id_usuario']." order by id_publicacao desc limit 1";

					$result2 = mysqli_query($conexao, $sql2);

					$id = mysqli_fetch_array($result2);

					$id_publicacao = $id['id_publicacao'];

					$sql3 = "insert into imagens(id_publicacao, endereco) values('$id_publicacao','$novoNome')";

					$result3 = mysqli_query($conexao, $sql3);

					if ($result3) {

					} else {
						$_SESSION['erroImg'] = "<div class='alert alert-danger'><strong>Erro ao cadastrar imagem.</strong></div>";
						
					}
				}
			}


		} 

	}
	
	header("location: cadastro_publicacao.php");

	mysqli_close($conexao);

?>