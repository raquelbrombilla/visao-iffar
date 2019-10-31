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

    $email = mysqli_real_escape_string($cadastro, $email);

    $senha = mysqli_real_escape_string($cadastro, $senha);

    $query = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";

    $result = mysqli_query($cadastro, $query);

    $row = mysqli_num_rows($result);

    $usuario = mysqli_fetch_array($result);



    if($row == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $usuario["admin"];
        unset($_SESSION['erros']);
        header('location:solicitacoes.php');

    }else{
        $_SESSION['erros'] = "Usuário ou senha incorretos!";
        header('location:login.php');
    }
}


?>