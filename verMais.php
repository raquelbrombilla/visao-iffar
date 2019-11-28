<?php
	include "conexao.php";
	session_start();
	
	$id = $_GET['id_publicacao'];
	$sql = "SELECT * FROM publicacao WHERE id_publicacao = $id" ;
	$result = mysqli_query($conexao, $sql);

	$publicacao = mysqli_fetch_array($result);
	
	if (isset($_SESSION['id_usuario'])) {
		$usuario = $_SESSION['id_usuario'];

	}

	$sql2 = "SELECT distinct(comentarios.id_comentario), comentarios.*, usuarios.nome, usuarios.foto FROM comentarios, usuarios WHERE comentarios.id_publicacao = $id and comentarios.id_usuario = usuarios.id_usuario";

	$result2 = mysqli_query($conexao, $sql2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>

	<!-- Bt e template menu -->
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/css.css">
     <link rel="stylesheet" href="font/css/all.css">


   <!-- timeline -->
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'><link rel="stylesheet" href="timeline/style.css">

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">


</head>
<body>

	<?php

		include "menu/menu.php";
	?>



	<div class="container">
		<div class="publicacao justify-content-center">
			<?php

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }  
          ?>

			
			<?php

				$id_usuario = $publicacao['id_usuario'];

				$sql4 = "select * from usuarios where id_usuario = ".$id_usuario;
				$result4 = mysqli_query($conexao, $sql4);
				$user = mysqli_fetch_array($result4);

				echo "<div class='row'>";

						echo "</div>";

						echo "<div class='titulo_publi'><h1 class='mt-4 text-center'>".$publicacao['titulo']."</h1></div>";
						?>
						<hr>
						<div class="row d-flex">

							<?php
							
								echo "<div class='data col-6 d-flex justify-content-start'><h6>Acontecimento do ano de ".$publicacao['data']."</h6></div>";
								echo "<div class='data_publi col-6 d-flex justify-content-end'>Publicado em ".$publicacao['data_publicacao']."</div>";

							?> 
							</div>

						
						<?php
						
							$id_postagem = $publicacao['id_publicacao'];

				?>

				<div id="myCarousel" class="carousel slide d-flex  col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-top: 5%; margin-bottom: 5%;" data-ride="carousel">		
	  				<div class="carousel-inner col-lg-12 col-md-12 col-sm-12 col-12  justify-content-center justify-content-lg-center">

						<?php 

								$sql3 = "SELECT * FROM IMAGENS where id_publicacao = ".$publicacao['id_publicacao'];
								$result3 = mysqli_query($conexao, $sql3); 
								$total = mysqli_num_rows($result3);

								if($total > 0){

									foreach ($result3 as $key => $fotos) {							
											
											if ($key == 0 ){
												echo "<div class='carousel-item active'>";
											} else {
												echo "<div class='carousel-item'>";
											}

											echo "<img class='d-block w-100' src='img/imagensPublicacoes/".$fotos['endereco']."' style='height: 400px;' >";
											echo "</div>"; //fecha carousel-item
										
										
									}// fecha foreach
								}


						?>


				</div> <!-- carousel inner -->

				 <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Anterior</span>
				  </a>
				  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Próximo</span>
				  </a> 
				
			</div> <!-- div carousel -->

			<?php

				$sql5 = "select * from usuarios where id_usuario = $id_usuario";
				$result5 = mysqli_query($conexao, $sql5);

				$user = mysqli_fetch_array($result5);

					if(isset($_SESSION['id_usuario'])){

			    					$sql7 = "SELECT * FROM curtidas WHERE id_publicacao = $id_postagem and id_usuario = ".$_SESSION['id_usuario'];
			    					$result7 = mysqli_query($conexao, $sql7);
			    					$rows = mysqli_num_rows($result7);


				    				if ($rows > 0){
										
										echo "<a href='curtir.php?id_postagem=$id_postagem'> <i class='fas fa-heart fa-3x' style='color: #d02929; margin-bottom:2%; margin-left:7%;'></i> </a>";
										
			    					} else{

				    					echo "<a href='curtir.php?id_postagem=$id_postagem'><i class='far fa-heart fa-3x' style='color: #d02929; margin-bottom:2%; margin-left:7%;'></i></a>";	
				    					
			    					}

			    				} else {
			    					echo "<a href='curtir.php?id_postagem=$id_postagem'><i class='far fa-heart fa-3x' style='color: #d02929; margin-bottom:2%; margin-left:7%;'> </i></a>";			    				
			    				}

			    				$sql6 = "SELECT count(id_curtida) as total FROM curtidas WHERE id_publicacao = $id_postagem ";
			    				$result6 = mysqli_query($conexao, $sql6);
			    				$contaCurtidas = mysqli_fetch_array($result6);
			    				

			    				if ($contaCurtidas['total'] == 1){
					    			echo "<h6>".$contaCurtidas['total']." pessoa gostou disso</h6>";
					    		} elseif ($contaCurtidas['total'] > 1) {
					    			echo "<h6>".$contaCurtidas['total']." pessoas gostaram disso</h6>";
					    		} else {
					    			echo "<h6> 0 curtidas <i class='far fa-frown'></i></h6>";
					    		}

					    		if (isset($_SESSION['admin'])) {
					    			if ($_SESSION['admin'] == 1) {
					    				echo "<a href='/Visao-IFFar/editar_publicacao.php?id_publicacao=$id_postagem' class='btn botao-color' style='margin-right: 2%;'>
						                    EDITAR PUBLICAÇÃO
						                </a>";
						                echo "<a href='/Visao-IFFar/excluir_publicacao.php?id_publicacao=$id_postagem' class='btn botao-color' style='margin-right: 2%;'>
						                    EXCLUIR PUBLICAÇÃO
						                </a>";	
										echo "<a href='/Visao-IFFar/excluir_imagens.php?id_publicacao=$id_postagem' class='btn botao-color' style='margin-right: 2%;'>
						                    EXCLUIR FOTOS
						                </a>";	
						                echo "<a href='/Visao-IFFar/adicionar_imagens.php?id_publicacao=$id_postagem' class='btn botao-color' style='margin-right: 2%;'>
						                    ADICIONAR FOTOS
						                </a>";	

					    			}
					    			
					    		} 
			?>


			<hr>
			<div class='data_publi col-6 d-flex justify-content-start'><h7>Por <?php echo $user['nome']?> </h7></div>
			<hr>
				<?php
					echo "<div class='descricao_publi' style='text-align:justify; font-size:17px; text-indent:50px;'><p>".$publicacao['descricao']."</p></div>";
					echo "<hr>";

					echo "<h3 class='mb-4'>Comentários:</h3>";


			foreach($result2 as $coment){

			?>
				<div class="media mb-4">

					<?php

						if ($coment['foto']) {
							echo "<img class='d-flex mr-3 rounded-circle' src='img/imagens/".$coment['foto']."' style='width: 50px; border: solid 1px;'>";
						} else {
					?>
					<img class="d-flex mr-3 rounded-circle" src="img/imagens/usuario.png" style="width: 50px; border: solid 1px;">
					
					<?php
						}
					?>
					<div class="media-body">
						<h5 class="mt-0"><?php echo $coment['nome']?></h5>
						<p><?php echo $coment['comentario']?></p>
						<hr>
					</div>
				</div>

		<?php
			
			}

		?>

	<div class="container">
		<div class="card my-4">
			<h5 class="card-header">Deixe um comentário:</h5>
			<div class="card-body">
				<form method='POST' action="comentar.php">
					<div class="form-group">
						<input type="hidden" name="id" value="<?= $id ?>">
						<textarea type="text" rows="3" class="form-control" name="comentario" placeholder="Digite aqui um comentário..."></textarea>
					</div>
					<input type="submit" name="enviar" value="Comentar" class="botao botao-color">
				</form>
				
			</div>
</div>
		</div>
	</div>



			</div>
		</div>
	</div>
	<?php

		include "footer.php";

	?>
</body>
</html>