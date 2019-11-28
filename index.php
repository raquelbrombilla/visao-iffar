<?php
	include "conexao.php";
	session_start();

	$sql = "select * from timeline order by date asc";
	$result = mysqli_query($conexao, $sql);	

	$sql2 = "SELECT * FROM PUBLICACAO WHERE ATIVA = 1 order by id_publicacao desc";
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
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
		
	<div class="container-timeline">
		<?php

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }  
          ?>
 		<div class="timeline">
	    		<div class="timeline-nav">

	    			<?php

	    				foreach ($result as $tim) {
	    						echo '<div class="timeline-nav__item">'.$tim['date'].'</div>';
	    					}	
	    			?>
			     
	    		</div>
	 			<hr>
    		<div class="timeline-wrapper">
      		<div class="timeline-slider">
      			<?php
      				foreach ($result as $tim) {
      			?>
        	<div class="timeline-slide imagem" style="background-image: url('img/imagensHome/<?= $tim["foto"]?>');  " data-year="<?= $tim['date']; ?>">      
        		<span class="timeline-year"><?= $tim['date']; ?></span>
          		<div class="timeline-slide__content">
            	<h4 class="timeline-title"><?= $tim['descricao']; ?></h4>
           
        	</div>
       		</div>
        	<?php
        		}
        	?>
        
		      	</div>
		   		  <hr>
		   		  <?php
		   		  if (isset($_SESSION['admin'])) {
		   		  	if ($_SESSION['admin'] == 1) {
		   		  		
		   		  ?>
			   		  <div class="container d-flex justify-content-end">
			   		  	<button  class='btn botao-color'><a href="timeline/publi_timeline.php" class='a-btn'>Editar timeline <i class="far fa-edit"></i></a></button>
			   		  </div>

		   		  <?php }
		   		  
		   		  }
		   		  	 ?>

		   		  
		    	</div>
		</div>
	</div>

			<div class="titulo">
				Publicações
				<div class="container">
					<hr class="hr">
				</div>
			</div>

	<div class="container">

		<div class="card-group col-12">
			<div class="row justify-content-center">
				<?php
					while ($publicacao = mysqli_fetch_array($result2)) {

						$id_postagem = $publicacao['id_publicacao'];
						$id_usuario = $publicacao['id_usuario'];

						$sql4 = "SELECT * FROM USUARIOS WHERE id_usuario = $id_usuario";
						$result4 = mysqli_query($conexao, $sql4);

						$user = mysqli_fetch_array($result4);

				?>

		  	<div class="card col-8 col-sm-8 col-md-5 col-lg-3 d-flex mr-4 mb-4" style="min-height: 500px;">
		  	
		  		<?php
		  			$sql3 = "SELECT * FROM IMAGENS where id_publicacao = $id_postagem limit 1";
					$result3 = mysqli_query($conexao, $sql3); 
					$foto = mysqli_fetch_array($result3);

					echo "<img class='card-img-top' src='img/imagensPublicacoes/".$foto["endereco"]."' alt='Card image' style='width:100%; height:50%; margin-top: 10%;'>";
				?>		
				      	<div class="card-body">
			    			<h6 class="card-title"><?php echo $publicacao['titulo'] ?></h6>
			      			<p class="card-text">Publicação referente ao ano de <?php echo $publicacao['data'] ?></p>
			      			<div class="card-text">
			      				<a href="/Visao-IFFar/verMais.php?id_publicacao=<?php echo $id_postagem; ?>" class="btn botao-color">
			      					Ver mais + 
			      				</a>
			      				<br>
			      				<small class="text-muted" style='margin-top: 5%'>Por <?php echo $user['nome']?></small>	
			      			</div>		      			
			      			
			    		</div> <!-- card body -->
			</div> <!-- card -->

			<?php

				}

			?>

			</div> <!-- row -->
		</div><!-- card group -->
	  
	</div> <!-- container -->


	<?php

		include "footer.php";

	?>


</body>
</html>