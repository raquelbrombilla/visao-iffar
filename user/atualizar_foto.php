<?php
echo"oi":

	include "../bd/conexaobanco.php";
	session_start();

	if( !isset($_SESSION['id_usuario']) ){
			header('location: ../login/login.php');
			exit();
		}


	if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
 
	    $arquivo_tmp = $_FILES['foto']['tmp_name'];
	    $nome_img = $_FILES['foto']['name'];
	    
	    $extensao = pathinfo ( $nome_img, PATHINFO_EXTENSION );// Pega a extensão
	    $extensao = strtolower ( $extensao ); // Converte a extensão para minúsculo
	  	
	    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { // Somente imagens, .jpg;.jpeg;.gif;.png
	        // Cria um nome unico p imagem, evita que tenha 2x a imagem no servidor
	        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
	        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
	        $destino = 'fotos/'. $novoNome; //caminho das imagens








	        

	        // tenta mover o arquivo para o destino
	        if (move_uploaded_file ( $arquivo_tmp, $destino) ) {

	            $sql = "update usuarios set foto = '$novoNome' where id_usuario =".$_SESSION['id_usuario'];
				$result = mysqli_query($connection, $sql);

				if($result == true) {
					$_SESSION['msg'] ="<div class='alert alert-success'><strong>Foto atualizada com sucesso!</strong></div>";
						header("location: perfil.php");
					exit();		
				} else {
					$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao atualizar a foto.</strong></div>";
					header("location: perfil.php");
					}

	      	} else {

	      		$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao salvar o arquivo.</strong></div>";
				header("location: perfil.php");		
	      	}

	    } else {

	    	$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Arquivo inválido. Você pode enviar apenas arquivos jpg, jpeg, gif e png. <br></strong></div>";
				header("location: perfil.php");
					
	    }

	} 
	mysqli_close($connection);

	header('location: perfil.php');


?>