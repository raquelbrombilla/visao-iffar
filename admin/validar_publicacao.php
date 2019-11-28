<?php
	include "../conexao.php";
	session_start();
	
	$id = $_GET['id'];

	$sql = "SELECT * FROM publicacao WHERE id_publicacao = $id" ;
	$result = mysqli_query($conexao, $sql);
	$publicacao = mysqli_fetch_array($result);


	$sql2 = "SELECT usuarios.nome FROM usuarios WHERE comentarios.id_publicacao = $id and comentarios.id_usuario = usuarios.id_usuario";

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
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
   
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/css.css">

   <!-- timeline -->
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'><link rel="stylesheet" href="timeline/style.css">

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">


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

			<hr>
				<?php
					echo "<div class='descricao_publi' style='text-align:justify; font-size:17px; text-indent:50px;'><p>".$publicacao['descricao']."</p></div>";
					echo "<hr>";
		
		?>

		<button class='btn botao-color'>
			<a href='aceitar_publicacao.php?id=<?php echo $publicacao['id_publicacao'];?>' class='a-btn'>
				ACEITAR
			</a>
		</button>
		<button class='btn botao-color2'>
			<a href='negar_publicacao.php?id=<?php echo $publicacao['id_publicacao'];?>	' class='a-btn'>
				NEGAR
			</a>
		</button>
		</div>
	</div>





	<?php

		include "../footer.php";

	?>
</body>
</html>