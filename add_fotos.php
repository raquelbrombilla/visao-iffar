<?php
	
	include "conexao.php";
	session_start();


	$id_publicacao = $_POST['id'];
	$total = COUNT($_FILES['foto']['name']);


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

		         	$sql2 = "select id_publicacao from publicacao where id_usuario = ".$_SESSION['id_usuario'];

					$result2 = mysqli_query($conexao, $sql2);

					$id = mysqli_fetch_array($result2);

					$id_publicacao = $id['id_publicacao'];

					$sql5 = "INSERT INTO imagens (id_publicacao, endereco) values ('$id_publicacao', '$novoNome')";
					$result5 = mysqli_query($conexao, $sql5);


					if ($result5) {

						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Imagens adicionadas com sucesso.</strong></div>";
						header("location: verMais.php?id_publicacao=$id_publicacao");
						
					} else {
							
						$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao adicionar imagens.</strong></div>";
						header("location: verMais.php?id_publicacao=$id_publicacao");
					} 

				} //move upload

		
		}else {//if  extensao

			    $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Arquivo da foto inválido. Você pode enviar apenas arquivos jpg, jpeg, gif e png. <br></strong></div>";
				header("location: verMais.php?id_publicacao=$id_publicacao");
			}
	} // if isset
} //for
header("location: verMais.php?id_publicacao=$id_publicacao");

?>