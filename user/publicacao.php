<?php
	
	session_start();
	include "../conexao.php";

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			exit();
		}


	$sql = "select * from publicacao p where p.id_usuario =".$_SESSION['id_usuario'];
	$result = mysqli_query($conexao, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>

    <!-- Template BT --- menu -->
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../font/css/all.css">


    <!-- fontes Google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	
</head>
<body>

	<?php

		include "../menu/menu.php";

	?>

	<div class="container">
		<div class="publicacao justify-content-center">
			<?php

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }  
          
         while ($publi = mysqli_fetch_array($result)) {
          
				echo "<div class='row'>";

						echo "</div>";

						echo "<div class='titulo_publi'><h1 class='mt-4 text-center'>".$publi['titulo']."</h1></div>";
						?>
						<hr>
						<div class="row d-flex">

							<?php
							
								echo "<div class='data col-6 d-flex justify-content-start'><h6>Acontecimento do ano de ".$publi['data']."</h6></div>";
								echo "<div class='data_publi col-6 d-flex justify-content-end'>Publicado em ".$publi['data_publicacao']."</div>";

							?> 
							</div>

						
						<?php
						
							$id_postagem = $publi['id_publicacao'];

				?>

				<div id="myCarousel" class="carousel slide d-flex" style="margin-top: 5%; margin-bottom: 5%;" data-ride="carousel">		
	  				<div class="carousel-inner justify-content-center">

						<?php 

								$sql3 = "SELECT * FROM IMAGENS where id_publicacao = $id_postagem";
								$result3 = mysqli_query($conexao, $sql3); 
								$total = mysqli_num_rows($result3);

								if($total > 0){

									foreach ($result3 as $key => $fotos) {							
											
											if ($key == 0 ){
												echo "<div class='carousel-item active'>";
											} else {
												echo "<div class='carousel-item'>";
											}

											echo "<img class='d-block w-100' src='../img/imagensPublicacoes/".$fotos['endereco']."' style='height: 400px;' >";
											echo "</div>"; //fecha carousel-item
										
										
									}// fecha foreach
								}//fecha o if

							$sql5 = "SELECT * FROM USUARIOS WHERE id_usuario =".$_SESSION['id_usuario']; 
							$result5 = mysqli_query($conexao, $sql5);
							$user = mysqli_fetch_array($result5);
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

				if($publi['ativa'] == 1){
					echo "<p style='color: #1fe01f; font-weight: 500;'>Essa publicação já foi aprovada!</p>";
				} else {
					echo "<p style='color: red; font-weight: 500;'>Essa publicação aguarda aprovação.</p>";

				}


			?>

			<hr>
			<div class='data_publi col-6 d-flex justify-content-start'><h7>Por <?php echo $user['nome']?> </h7></div>
			<hr>
				<?php
					echo "<div class='descricao_publi' style='text-align:justify; font-size:17px; text-indent:50px;'><p>".$publi['descricao']."</p></div>";
					echo "<hr>";

	
			
			}// fecha o while

		?>
		</div>
	</div>

	<?php

		include "../footer.php";

	?>
	
</body>
</html>