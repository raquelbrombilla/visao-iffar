<?php
	include "conexao.php";
    session_start();
    
    $pesquisar = $_POST['pesquisar'];

    $sql = "SELECT * FROM publicacao WHERE descricao LIKE '%$pesquisar%' or titulo  LIKE '%$pesquisar%' or data LIKE '%$pesquisar%' ";
    $result6 = mysqli_query($conexao, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">
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
     <link rel="stylesheet" href="font/css/all.css">


   <!-- timeline -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'><link rel="stylesheet" href="timeline/style.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">


</head>
<body>

    <?php

        include "menu/menu.php";
    ?>

    <div class="container">
        <div class="publicacao">
            <h3>Públicações que correspondem a: "<?php echo $pesquisar?>"</h3>

    <?php
         $i =1;
        while($rows_pesquisa = mysqli_fetch_array($result6)){
            echo "<h4>".$i.".</h4>";
        ?>
        <div class="container mb-4">
            <h5>Título: </h5><p style="text-indent: 70px; text-align: justify; font-size: 17px;"><?php echo $rows_pesquisa['titulo'] ?></p>
            <h5>Ano: </h5><p style="text-indent: 70px; text-align: justify; font-size: 17px;"><?php echo $rows_pesquisa['data'] ?></p>
            <h5>Descrição: </h5><p style="text-indent: 70px; text-align: justify; font-size: 17px;"><?php echo $rows_pesquisa['descricao'] ?></p>
           
                <a href="/Visao-IFFar/verMais.php?id_publicacao=<?php echo $rows_pesquisa['id_publicacao'] ?>" class="btn botao-color">
                    Ver mais + 
                </a>
         
        </div>
    
    <?php
        
       $i++; }

    ?>
        </div>
    </div>

</body>
</html>