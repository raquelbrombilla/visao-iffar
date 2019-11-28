<?php

	include "../conexao.php";
	session_start();

	if( !isset($_SESSION['admin']) ){
			header('location: login.php');
			 $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Apenas administradores.</strong></div>";
		exit();
	} 

	$id = $_GET['id'];

	$sql = "select * from timeline where id_timeline = $id";
	$result = mysqli_query($conexao, $sql); 
	$publicacao = mysqli_fetch_array($result);

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


	<div class="container_form">  
		  <form id="contact"  method="POST" action="editar_timeline.php" enctype="multipart/form-data">
			    <h3>Edição das publicações da timeline</h3>
			    <h4>Altere os campos abaixo:</h4>

			   		 <?php

			            if(isset($_SESSION['msg'])){
			              echo $_SESSION['msg'];
			              unset($_SESSION['msg']);
			            }  

			          ?>

			    <fieldset>
			      <input type="number" name="data" min="1950" max="2030" required value="<?php echo $publicacao['date'];?>">
			    </fieldset>
			    <fieldset>
			      <textarea tabindex="3" name="descricao" required ><?php echo $publicacao['descricao'];?></textarea>
			    </fieldset>

			    <fieldset>
			      <input type="file" id="arquivo" name="foto">
			    </fieldset>
			    <input type="hidden" value="<?php echo $publicacao['id_timeline']; ?>" name="id">
			    
			    <fieldset>
			      <button name="submit" type="submit" id="contact-submit" required>Enviar</button>
			    </fieldset>

			    
		  </form>
	</div>


</body>
</html>

