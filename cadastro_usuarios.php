<?php 
  session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
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
          <form id="contact"  method="POST" action="cadastrar_usuarios.php" enctype="multipart/form-data">
                <h3>Cadastro</h3>
                <h4>Preencha os campos abaixo:</h4>
                    <?php

                      if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                      }  
                   ?>
                <fieldset>
                    <input placeholder="Nome" type="text" name="nome" tabindex="1" required autofocus>
                </fieldset>
                <fieldset>
                    <input placeholder="E-mail" type="email" name="email" tabindex="1" required autofocus>
                </fieldset>
                 <fieldset>
                  <input placeholder="Senha" type="password" name="senha" tabindex="1" pattern=".{3,12}" required autofocus>
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