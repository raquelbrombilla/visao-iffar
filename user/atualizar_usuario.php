<?php

    include "../conexao.php";
    session_start();

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $foto = $_FILES['foto']['name'];

         if (isset($_FILES['foto']['name'] ) && $_FILES['foto']['error'] == 0) {
             
            $arquivo_tmp = $_FILES['foto']['tmp_name'];
            $nome_img = $_FILES['foto']['name'];
            
            $extensao = pathinfo ( $nome_img, PATHINFO_EXTENSION );// Pega a extensão
            $extensao = strtolower ( $extensao ); // Converte a extensão para minúsculo
          
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { // Somente imagens, .jpg;.jpeg;.gif;.png
                // Cria um nome unico p imagem, evita que tenha 2x a imagem no servidor
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid ( time () ) . '.' . $extensao;
     
                $destino = '../img/imagens/'. $novoNome; //caminho das imagens

                // tenta mover o arquivo para o destino
                if (move_uploaded_file ( $arquivo_tmp, $destino) ) {

                    $sql = "update usuarios set email = '$email', nome = '$nome', foto = '$novoNome' where id_usuario = " .$_SESSION['id_usuario'];
                    $result = mysqli_query($conexao,$sql);

                    if ($result == true) {
                        $_SESSION['msg'] ="<div class='alert alert-success'><strong>Usuário atualizado com sucesso!</strong></div>";
                        header("location: ../perfil.php");
                        exit();
                    } else
                    echo 'Erro ao atualizar o arquivo. <br />';
                } else
                    echo "Erro ao atualizar foto";

            } else
                echo 'Arquivo inválido. Você pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
            
        } else { 
                    $sql2 = "update usuarios set email = '$email', nome = '$nome' where id_usuario = " .$_SESSION['id_usuario'];
                    $result2 = mysqli_query($conexao,$sql2);
                    var_dump($result2);

                    if ($result2) {
                        $_SESSION['msg'] ="<div class='alert alert-success'><strong>Usuário atualizado com sucesso!</strong></div>";
                        header("location: ../perfil.php");
                        exit();
                    } else {
                        $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Esse email já está sendo usado.</strong></div>";
                        header("location: ../perfil.php");
                     }
                
        }
        
        mysqli_close($conexao);
?>


