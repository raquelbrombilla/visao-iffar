<?php

	include "../conexao.php";
	session_start();

	$email = $_POST['email'];
    $nome = $_POST['nome'];
    $id = $_POST['id'];

    $sql = "update usuarios set email = '$email', nome = '$nome' where id_usuario = $id";
    $result = mysqli_query($conexao,$sql);

    if ($result == true) {
        $_SESSION['msg'] ="<div class='alert alert-success'><strong>Usuário atualizado com sucesso!</strong></div>";
        header("location: usuarios.php");
        exit();
    } else
        echo 'Erro ao atualizar o arquivo. <br />';

?>