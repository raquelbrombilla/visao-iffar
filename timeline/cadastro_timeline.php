<?php
	
	session_start();

	if( !isset($_SESSION['id_usuario']) ){
			header('location: login.php');
			 $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Faça login para cadastrar publicações.</strong></div>";
			exit();
	}

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


    <!-- fontes Google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	
</head>
<body>

	<?php

		include "../menu/menu.php";


	?>


	<div class="container_form">  
		  <form id="contact"  method="POST" action="cadastrar_timeline.php" enctype="multipart/form-data">
			    <h3>Cadastro de publicações da timeline</h3>
			    <h4>Preencha os campos abaixo:</h4>

			   		 <?php

			            if(isset($_SESSION['msg'])){
			              echo $_SESSION['msg'];
			              unset($_SESSION['msg']);
			            }  

			          ?>

			    <fieldset>
			      <input type="number" name="data" min="1950" max="2030"required>
			    </fieldset>
			    <fieldset>
			      <textarea placeholder="Descrição da publicação" tabindex="3" name="descricao" required></textarea>
			    </fieldset>

			    <fieldset>
			      <input type="file" id="arquivo" name="foto">
			    </fieldset>
			    
			    <fieldset>
			      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
			    </fieldset>
		  </form>
	</div>
	


	
</body>
</html>