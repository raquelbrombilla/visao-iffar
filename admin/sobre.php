<?php

    include "../conexao.php";
    session_start();

    $sql = "select * from descricao";
    $result = mysqli_query($conexao, $sql);

  
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

            <h3 style="padding-left: 20%;">O que é o Visão-IFFar?</h3>
            <hr>
            <div class="parag">
                 <p >Visão - IFFar é um memorial virtual criado para o Instituto Federal de Educação, Ciência e Tecnologia Farroupilha - Campus Frederico Westphalen, no qual tem como objetivos coletar informações e preservar a história do Instituto.</p>
            </div>
            <h3 style="padding-left: 20%;">Sobre nosso Instituto</h3>
            <hr>
            <div class="parag">
                <p>O Instituto Federal Farroupilha Campus Frederico Westphalen é um dos onze campings existentes na rede de Institutos Federais Farroupilhas, no qual visa uma instituição de educação superior, básica e profissional, pluricurricular e multicampi, especializada na oferta de educação profissional e tecnológica nas diferentes modalidades de ensino. </p>
                <p>Está localizado atualmente na cidade de Frederico Westphalen – RS, linha 7 de setembro, s/n , BR 386 – KM 40.</p>
            </div>
            
                <p  class="col-4 d-flex justify-content-end">CEP 983400-000 <br>Fone: (55) 3744-8900.</p>
            
                <div class=" d-flex justify-content-center"><img src="../img/logo_iffar.png"></div>
       
        </div>

        
        
    </div>



    <?php

        include "../footer.php";

    ?>
    </body>
</html>
