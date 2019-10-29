<?php
    include "conexaobanco.php";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id_usuario = $_POST['id_usuario'];
        $adimin = $_POST['adimin']
        $sql = "insert into usuario(nome,email,senha,id_usuario,adimin) values('$nome','$email','$senha','$id_usuario','1')";
  
    $query = mysqli_query($cadastro,$sql);
    
    if($query){
        echo "Cadastro realizado com sucesso!";
        header("location:login.php");
    }else{
        echo "Não foi possivel cadastrar-se no banco, tente novamente ". PHP_EOL;
        echo "Debugging erro:". mysqli_connect_error().PHP_EOL;
        exit;
    }
    
    mysqli_close($cadastro);
?>

<?php
session_start();
if($_SESSION['adimin'] == 1){
    header('location:login.php');
}
?>