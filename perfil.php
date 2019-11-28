<?php

	session_start();
	include "conexao.php";

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			exit();
		}

	$sql = "SELECT * FROM usuarios where id_usuario = ".$_SESSION['id_usuario'];
	$result = mysqli_query($conexao, $sql);
	$array = mysqli_fetch_array($result);

	$foto = $array['foto'];
?>

<!DOCTYPE html>
<html>
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

    <!-- Add CSS via jsdilvr CDN -->
	<link rel="stylesheet" type="text/css" href="horizontal/css/horizontal_timeline.2.0.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="font/css/all.css">
	
	</head>
	<body>

	<?php

		include "menu/menu.php";


	?>
		
			<div class='container pt'>
			<div class="perfil">
								<div class="jumbotron">

				<?php

					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
				<div class="row">
	
			<?php


				if ($foto == true) {
					  
					echo "<div class='col-12 col-sm-12 col-md-12 col-lg-4 d-flex justify-content-center'>
							<img src='img/imagens/$foto' style='height: 300px; width: 300px; border-radius: 50%;' class='text-center'>
						</div>";
					echo "<div class='tabela col-12 col-sm-12 col-md-12 col-lg-8'>
						<h3>Meus dados:</h3>
						<div class='table-responsive'>
						<table class='table'>
							<thead>
								<tr>
									<th>Nome</th>
									<th>E-mail</th>
									<th></th>
								</tr>
							</thead>
							<tbody>";
								echo "<tr>
									<td>".$array['nome']."</td>";
								echo "<td>".$array['email']."</td>";
								echo "<td><h6><a href='user/editar_usuario.php?id=".$array['id_usuario']."'>Editar  <i class='far fa-edit'></i></a></h6></td>
									</tr>";
						
						echo "</tbody>
							</table>
							</div>
							</div>";

			} else {

				echo "<div class='col-4 col-sm-12 col-md-12 col-lg-4'>
							<img src='img/imagens/usuario.png' style='height: 300px; width: 300px; border-radius: 50%; border: solid;'>
						</div>";
					echo "<div class='tabela col-8 col-sm-12 col-md-12 col-lg-8'>
						<h3>Meus dados:</h3>
						<div class='table-responsive'>
						<table class='table'>
							<thead>
								<tr>
									<th>Nome</th>
									<th>E-mail</th>
									<th></th>
								</tr>
							</thead>
							<tbody>";
								echo "<tr><td>".$array['nome']."</td>";
								echo "<td>".$array['email']."</td>";
								echo "<td><h6><a href='user/editar_usuario.php?id=".$array['id_usuario']."'>Editar  <i class='far fa-edit'></i></a></h6></td></tr>";
						echo "</tbody>
							</table>
							</div>";	

				}
				
			?>

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

