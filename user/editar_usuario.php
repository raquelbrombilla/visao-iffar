 <?php 

	include "../conexao.php";
	session_start();

	$sql = "select * from usuarios where id_usuario = ".$_SESSION['id_usuario'];
	$result = mysqli_query($conexao, $sql);
	$user = mysqli_fetch_array($result);
	
	mysqli_close($conexao);
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
          <form id="contact"  method="POST" action="atualizar_usuario.php" enctype="multipart/form-data">
                <h3>Editar cadastro</h3>
                <h4>Altere os campos abaixo:</h4>
                    <?php

                      if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                      }  
                   ?>

                <fieldset>
					<input type="text" name="nome" value="<?php echo $user['nome']; ?>">
				</fieldset>
				<fieldset>
					<input type="email" name="email" value="<?php echo $user['email']; ?>">
				</fieldset>
				<fieldset>
					<input type="file" name="foto" >
				</fieldset>
					<input type="hidden" name="id" value ="<?php echo $user['id_usuario']; ?>">
                <fieldset>
                  <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Salvar</button>
                </fieldset>
          </form>
    </div>

 	
 </body>
 </html>