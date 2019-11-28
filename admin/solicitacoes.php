<?php
	include "../conexao.php";
	session_start();

	if(!$_SESSION['admin'] == 1) {
			header('location: ../login.php'); 
		} 


		$sql = "SELECT * FROM PUBLICACAO WHERE ATIVA = 0";
		$result = mysqli_query($conexao, $sql);

		

?>


<!DOCTYPE html>
<html>
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
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/css.css">

    <!-- Add CSS via jsdilvr CDN -->

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="../font/css/all.css">
	
	</head>
	<body>

	<?php
		include "../menu/menu.php";
	?>
	

	<div class="container">
		<div class="perfil col-12">
		
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			} //if 


		?>

			<h3>Solicitações de publicações</h3>
			<div class="table-responsive">
				<table class="table">
					<div class="tabela col-12">
						<thead>
							<tr class="d-flex">
								<th class="col-2">Fotos</th> 
								<th class="col-3"></th> 
								<th class="col-2">Data</th>
								<th class="col-3">Titulo</th>
								<th class="col-2"></th>
							</tr>
						</thead>
						<tbody>
				

				<?php

					while ($solicitacao = mysqli_fetch_array($result)) {
						$sql2 = "SELECT *, count(id_imagem) as total FROM IMAGENS where id_publicacao = ".$solicitacao['id_publicacao']." limit 1";
						$result2 = mysqli_query($conexao, $sql2);

						echo "<tr class='d-flex'>";

									foreach ($result2 as $fotos) {

											echo "<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex'>".$fotos['total']."</td>
											<td class='col-3 col-lg-3 col-md-3 col-sm-3 d-flex'>";
											echo "<img src='../img/imagensPublicacoes/".$fotos['endereco']."' style='width: 200px;'><br>";
										
										

									}//foreach
								echo "</td>";
								
								echo "<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex'>".$solicitacao['data']."</td>
								<td class='col-3 col-lg-3 col-md-3 col-sm-3 d-flex'>". $solicitacao['titulo']."</td>	
								<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex' height='2%'>
								<button class='botao botao-color' style='margin-right: 10%;' >
									<a href='validar_publicacao.php?id=".$solicitacao['id_publicacao']."' class='a-btn'>
										VER MAIS
									</a>
								</button>
										
								</td>	
							</tr>";					

				    }	

					
				?>
<!-- <button class='botao botao-color' style='margin-right: 10%;' >
												<a href='aceitar_publicacao.php?id=".$solicitacao['id_publicacao']."' class='a-btn'>
													ACEITAR
												</a>
										</button>
										<button class='botao botao-color2'>
												<a href='negar_publicacao.php?id=".$solicitacao['id_publicacao']."' class='a-btn'>
													NEGAR
												</a>
										</button> -->
						</tbody>
					</div> <!-- tabela -->	
				</table>
			</div> <!-- table responsive -->
		</div> <!-- perfil -->
	</div> <!-- container -->

	<?php

		include "../footer.php";

	?>

	</body>
</html>
