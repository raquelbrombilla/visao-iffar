<?php
    session_start();

    include "conexao.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

        if(empty($email) or empty($senha)){
            $_SESSION['msg'] = "Campos não podem ser nulos";
            header('location: login.php');
            exit();
        } else{

            $email = mysqli_real_escape_string($conexao, $email);
            $senha = md5(mysqli_real_escape_string($conexao, $senha));

            $sql = "select * from usuarios where email = '$email' and senha = '$senha'";

            $result = mysqli_query($conexao, $sql);

            $usuario = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);    


            if($row == 1) {
                $_SESSION['admin'] = $usuario["admin"];
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                header('location: perfil.php'); 

            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Usuário ou senha incorretos.</strong></div>";
                header('location:login.php');
                }
        }


        mysqli_close($conexao);


?>