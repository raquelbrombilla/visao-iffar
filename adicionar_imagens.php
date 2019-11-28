<?php
	
	include "conexao.php";
	
	session_start();

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			 $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Faça login para cadastrar publicações.</strong></div>";
			exit();
		}

	$id_publicacao = $_GET['id_publicacao'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>

    <!-- Template BT --- menu -->
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/form.css">


    <!-- fontes Google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">


</head>
<body>

	<?php

		include "menu/menu.php";
	?>

	<div class="container_form">  
		  <form id="contact"  method="POST" action="add_fotos.php" enctype="multipart/form-data">
			    <h3>Adição de publicações</h3>
			    <h4>Selecione algumas fotos</h4>

			   		 <?php

			            if(isset($_SESSION['msg'])){
			              echo $_SESSION['msg'];
			              unset($_SESSION['msg']);
			            }  

			         
			          ?>

			    <fieldset>

			      <input type="file" id="arquivo" name="foto[]" multiple="multiple" required>
			  
			    </fieldset>
			    <input type="hidden" value="<?php $id_publicacao ?>" name="id">
			    
			    
			    <fieldset>
			      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
			    </fieldset>
		  </form>
	</div>

</body>
</html>

