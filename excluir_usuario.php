<?php 
	include "conexaobanco.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM usuarios WHERE id_usuario= $id";
	$result = mysqli_query($conexao, $sql);

	if($result){
    echo "Registro EXCLUIDO com sucesso.";
    header("location:usuarios_cadastrados.php");
};

    if (count($error) != 0) {
    foreach ($error as $erro) {
    echo $erro . "<br />";
    };
    };

 ?>
