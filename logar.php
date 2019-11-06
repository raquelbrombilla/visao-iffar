<?php
    session_start();

    include "conexaobanco.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

        if(empty($email) or empty($senha)){
            $_SESSION['erros'] = "Campos não podem ser nulos";

            header('location: login.php');
            exit();
        }else{

    $email = mysqli_real_escape_string($conexao, $email);

    $senha = mysqli_real_escape_string($conexao, $senha);

    $query = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);

    $usuario = mysqli_fetch_array($result);

 


    if($row == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $usuario["admin"];
        $_SESSION['id_usuario'] = $usuario["id_usuario"];
        unset($_SESSION['erros']);
        header('location:perfil.php');

    }else{
        $_SESSION['erros'] = "Usuário ou senha incorretos!";
        header('location:login.php');
    }
}


?>