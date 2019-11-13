<?php

	session_start();
	include "conexao.php";

	$sql = "SELECT * FROM usuarios where id_usuario = ".$_SESSION['id_usuario'];
	$result = mysqli_query($conexao, $sql);
	$array = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>

	<!--Template form // fonte e etc -->
	<link rel="icon" type="image/png" href="form/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="form/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="form/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="form/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="form/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="form/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="form/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="form/css/util.css">
	<link rel="stylesheet" type="text/css" href="form/css/main.css">


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

    <!-- Add CSS via jsdilvr CDN -->
	<link rel="stylesheet" type="text/css" href="horizontal/css/horizontal_timeline.2.0.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="font/css/all.css">
	
	</head>
	<body>

	<?php

		include "menu/menu.php";


	?>

		<div class="container">
	
				<?php

					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}

				//	if ($array['foto'] == true) {

						echo "
							<div class='col-5'>
							<img src='imagens/".$array['foto']."'  width='285' height='300'>
							<br>


							<h5><a href='user/editar_usuario.php?id=".$array['id_usuario']."'>Editar <i class='far fa-edit'></i></a></h5>";

					//}
				?>

			
			</div>
			


		</div>
	
	</body>
</html>

