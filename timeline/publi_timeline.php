<?php
 
	include "../conexao.php";
	session_start();

	$sql = "select * from timeline order by date asc";
	$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="en">
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
		<div class="perfil col-12">
			<?php

				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}  
			
			?>

			<div class="row">
				<h3 class="col-5 d-flex justify-content-start">Publicações da timeline</h3>
				
				<div class="col-7 d-flex justify-content-end">
					<button class='botao botao-color'>
							<a href='cadastro_timeline.php' class='a-btn'>
								CADASTRAR +
							</a>
					</button>	
				</div>
			</div>															
			<br>


			<table class="table col-12">
				<thead>
					<tr>
						<th class="col-3"></th> 
						<th class="col-1">Data</th>
						<th class="col-4">Descrição</th>
						<th class="col-2"></th>
						<th class="col-2"></th>
					</tr>
				</thead>
				<tbody>
					<?php

						foreach ($result as $tim) {

							echo "<tr>
								<td class='col-3'><img src='../img/imagensHome/".$tim['foto']."' style='width: 200px;'></td>
								<td class='col-1'>".$tim['date']."</td>
								<td class='col-4'>". $tim['descricao']."</td>
								<td class='col-2'><a href='atualizar_timeline.php?id=".$tim['id_timeline']."' style='color: #383d41;'><i class='fas fa-edit'></i></a></td>
								<td class='col-2'><a href='excluir_timeline.php?id=".$tim['id_timeline']."' style='color: #383d41;'><i class='fas fa-trash'></i></a></td>

							</tr>
							
						</tbody>";

					
		 			    }	
				?>

				

			</table>
		</div>    
	</div>
<?php

	include "../footer.php";

?>

</body>
</html>

