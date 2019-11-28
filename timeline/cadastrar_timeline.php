<?php
	
	include "../conexao.php";
	session_start();

	if( !isset($_SESSION['admin']) ) {
			header('location: ../index.php');
			exit();
	}

	$descricao = $_POST['descricao'];
	$data = $_POST['data'];
	$foto = $_FILES['foto']['name'];

			
			if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
	 			
			    $arquivo_tmp = $_FILES['foto']['tmp_name'];
			    $imagem = $_FILES['foto']['name'];
			    
			    $extensao = pathinfo ( $imagem, PATHINFO_EXTENSION );// Pega a extensão
			    $extensao = strtolower ( $extensao ); // Converte a extensão para minúsculo

			    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { // Somente imagens, .jpg;.jpeg;.gif;.png
			        // Cria um nome unico p imagem, evita que tenha 2x a imagem no servidor
			        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
			        $novoNome = uniqid ( time () ) . '.' . $extensao;
		 
			        $destino = '../img/imagensHome/'. $novoNome; //caminho das imagem

			        if (move_uploaded_file ( $arquivo_tmp, $destino) ) {	

			        	$sql = "INSERT INTO `timeline`(`foto`, `descricao`, `date`) VALUES ('$novoNome', '$descricao', $data)";
						$result = mysqli_query($conexao, $sql);
						

						if ($result) {
					
							$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação da timeline cadastrada!</strong></div>";
							header('location: publi_timeline.php');
						} else {
							$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao cadastrar publicação da timeline.</strong></div>";
								header('location: publi_timeline.php');
						} // else

					} //if moveu
					
				} // if extensao

		} // if isset

	
	
	header("location: publi_timeline.php");

	mysqli_close($conexao);

?>