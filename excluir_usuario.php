<?php 
	include "conexaobanco.php";
	$id = $_GET['id'];
	$sql = mysql_query(" DELETE FROM usuarios WHERE id_usuario='$id_usuario' ")

	if ($sql){
    echo "Registro EXCLUIDO com sucesso.";
    echo "<a href='cadastro_usuarios.php'> Voltar ao cadastro.</a>";}


    if ($sql){
    echo "Registro EXCLUIDO com sucesso.";
    echo "<a href='cadastro_usuarios.php'> Voltar ao cadastro.</a>";}

    if (count($error) != 0) {
    foreach ($error as $erro) {
    echo $erro . "<br />";
    }
    }




 	//mysqli_query($conexao, $sql);
	//mysqli_close($conexao);
	//header('location:usuarios_cadastrados.php');

 ?>
