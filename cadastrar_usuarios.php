<?php
    session_start();
    include "conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
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
     
                $destino = 'img/imagens/'. $novoNome; //caminho das imagens

                // tenta mover o arquivo para o destino
                if (move_uploaded_file ( $arquivo_tmp, $destino) ) {
                    
                    $email = mysqli_real_escape_string($conexao, $email);
                    $senha = md5(mysqli_real_escape_string($conexao, $senha));

                    $sql = "insert into usuarios(email,nome,senha,foto,admin) values('$email','$nome','$senha','$novoNome','0')";
                    $result = mysqli_query($conexao,$sql);

                    if (mysqli_insert_id($conexao)) {
                        $_SESSION['msg'] ="<div class='alert alert-success'><strong>Usuário cadastrado com sucesso!</strong></div>";
                        header("location: login.php");
                        exit();
                    } else
                    echo 'Erro ao salvar o arquivo. <br />';
                } else
                    echo "erro ao salvar foto";

            } else
                echo 'Arquivo inválido. Você pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
            
        } else { 

                    $email = mysqli_real_escape_string($conexao, $email);
                    $senha = md5(mysqli_real_escape_string($conexao, $senha));

                    $sql = "insert into usuarios(email,nome,senha,admin) values('$email','$nome','$senha','0')";
                    $result = mysqli_query($conexao,$sql);

                    if (mysqli_insert_id($conexao)) {
                        $_SESSION['msg'] ="<div class='alert alert-success'><strong>Usuário cadastrado com sucesso!</strong></div>";
                        header("location: login.php");
                        exit();
                    } else {
                        $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Esse email já está sendo usado.</strong></div>";
                        header("location: cadastro_usuarios.php");
                     }
                
        }
        
        mysqli_close($conexao);

    
?>