<?php


	include "../conexao.php";
	session_start();

		if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			exit();
		}elseif (!$_SESSION['admin'] == 1) {
			header('location: ../login/pag_login.php'); 
		}

	$sql = "select * from usuarios";
	$result = mysqli_query($conexao,$sql);
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
		<div class="perfil">
			<?php

				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}  
			
			?>


	<h3>Usuários cadastrados</h3>
		<div class='table-responsive'>
			<table class="table">
				<div class='tabela col-12'>
				<thead> 
					<tr class="d-flex">
						<th class="col-2"></th>
						<th class="col-3">Nome</th>
						<th class="col-6 col-lg-4 col-md-4 col-sm-6">Email</th>
						<th class="col-1"></th>
						<th class="col-2"></th>
					</tr>
				</thead>
				<tbody>

				<?php
				

					if(mysqli_num_rows($result) > 0){

						foreach($result as $row){
							echo"<tr class='d-flex'>";
							
							if ($row['foto'] == true) {
								echo"<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex'><img src='../img/imagens/".$row['foto']."' class='w-50'style='border: 1px solid; border-radius: 50%;'></td>";
							} else {
								echo"<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex'><img src='../img/imagens/usuario.png' class='w-50' style='border: 1px solid; border-radius: 50%;'></td>";
							}
							
							echo"<td class='col-3 col-lg-3 col-md-3 col-sm-3 d-flex'>".$row['nome']."</td>";
							echo"<td class='col-6 col-lg-4 col-md-4 col-sm-6 d-flex'>".$row['email']."</td>";
							
							echo "<td class='col-1 col-lg-1 col-md-1 col-sm-1 d-flex'><a href='editar_usuarios.php?id=".$row['id_usuario']."' style='color: #383d41;'><i class='fas fa-edit'></i></a></td>";
							
								if ($row['admin'] == true) {
									echo "<td class='col-2 col-lg-2 col-md-2 col-sm-2  d-flex justify-content-center' height='2%'><button class='btn botao-color2'>
										<a href='remover_adm.php?id=".$row['id_usuario']."' class='a-btn'>
											REMOVER
										</a>
								</button></td></tr>";
								}else {
									echo "<td class='col-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center' height='2%'><button class='btn botao-color'>
										<a href='transformar_adm.php?id=".$row['id_usuario']."' class='a-btn'>
											ADMIN
										</a>
									</button></td></tr>";
								}

							
							}

						}
						
					mysqli_close($conexao);
			
				?>
				</tbody>
			</div>
			</table>
		</div>
		</div>
	</div>

	<?php

		include "../footer.php";

	?>
	</body>
</html>
