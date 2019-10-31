<?php
    include "conexaobanco.php";

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        
    $query= "insert into usuarios(email,nome,senha,foto, admin) values('$email','$nome','$senha','null','0')";
    $return = mysqli_query($cadastro,$query);
    
    if($return){
        echo "Cadastro realizado com sucesso!";
        header("location:login.php");
    }else{
        echo "Não foi possivel cadastrar-se no banco, tente novamente ". PHP_EOL;
        echo "Debugging erro:". mysqli_connect_error().PHP_EOL;
        exit;
    }
    
    mysqli_close($cadastro);
?>

