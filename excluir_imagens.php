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

	$sql2 = "select * from imagens where id_publicacao = $id";
	$result2 = mysqli_query($conexao, $sql2);
	$total = mysqli_num_rows($result2);

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
		<div class="perfil">

			<?php

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }  
          ?>


		<?php
			if($total > 0){

				foreach ($result2 as $key => $fotos) {							

					echo "<img src='img/imagensPublicacoes/".$fotos['endereco']."' style='width: 500px;' class='col-8'>";
					
						echo "<a href='/Visao-IFFar/excluir.php?id_imagem=".$fotos['id_imagem']."' class='btn botao-color col-2'>
							EXCLUIR
						</a>";	
																			
											
				}// fecha foreach

				echo "<a href='/Visao-IFFar/adicionar_imagens.php?id_publicacao=$id' class='btn botao-color' style='margin-right: 2%;'>
						                    ADICIONAR FOTOS
						                </a>";
			}    
			

		?>
		</div>

	</div>
	<!-- scripts -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js'></script><script  src="timeline/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>