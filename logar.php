<?php
    session_start();

    include "conexaobanco.php";
    $senha = $_POST['senha'];
    $email = $_POST['email'];

        if(empty($email) or empty($senha)){
            $_SESSION['erros'] = "Campos não podem ser nulos.";
            header('location: login.php');
            exit();
        }else{

    $email = mysqli_real_escape_string($cadastro, $email);

    $senha = mysqli_real_escape_string($cadastro, $senha);

    $query = "select * from usuario where email = '{$email}' and senha = '{$senha}'";

    $result = mysqli_query($cadastro, $query);

    $row = mysqli_num_rows($result);

    $usuario = mysqli_fetch_array($result);

        if($row == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo'] = $usuario["tipo"];
            unset($_SESSION['erros']);
            echo"Login realizado com sucesso!!!";
        }else{
            $_SESSION['erros'] = "Usuário ou senha incorretos!";
            header('location:login.php');
        }
    }
?>