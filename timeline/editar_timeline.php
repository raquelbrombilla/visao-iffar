<?php
	
	include "../conexao.php";
	session_start();

	if( !isset($_SESSION['admin']) ){
		$_SESSION['msg'] = "Somente administradores.";
		exit();
	}

	$id = $_POST['id'];
	$data = $_POST['data'];	
	$descricao = $_POST['descricao'];
	$foto = $_FILES['foto']['name'];

				
		if (isset($_FILES['foto']['name'] ) && $_FILES['foto']['error'] == 0) {

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
		           // echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br />';

		        	$sql = "UPDATE `timeline` SET `foto`= '$novoNome',`descricao`= '$descricao',`date`= $data where id_timeline = $id";
					$result = mysqli_query($conexao, $sql);

				if ($result) {

						$_SESSION['msg'] = "<div class='alert alert-success'><strong>Publicação atualizada com sucesso!</strong></div>";
						header("location: publi_timeline.php");
						exit();
					} else {

						$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro ao atualizar publicação.</strong></div>"; 
						header("location: publi_timeline.php");
					}
				}
			} else {

		    	$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Arquivo da foto inválido. Você pode enviar apenas arquivos jpg, jpeg, gif e png. <br></strong></div>";
				header("location: publi_timeline.php");
				}

		} else {
	
			$_SESSION['msg'] = "<div class='alert alert-danger'><strong>Selecione uma foto.</strong></div>";
			header("location: publi_timeline.php");
			}

	mysqli_close($conexao);

	
?>