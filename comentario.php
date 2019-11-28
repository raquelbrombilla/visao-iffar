<?php 


include"conexao.php";
session_start();

$id_comentarios = $_POST['id_comentario'];
$id_usuario = $_POST['id_usuario'];
$id_publicacao = $_POST['id_publicacao'];


 $sql = "insert into comentarios (id_comentario, id_usuario, id_publicacao) values('$id_comentario','$id_usuario','$id_publicacao')";
$result = mysqli_query($conexao, $sql);

	if($result){
	echo $id_comentario;
		
	}else{
			echo"Erro: ".$sql4."<br>".$conexao->error;
	}
$conexao->close();

?>

<?php
		session_start();
		include "conexao.php";
		//Sem login não entra
    	/*if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } */

	    
	    $data = date("Y-m-d H-i-s");
	    
	    $id_comentarios = $_GET['id_comentario'];
	    $id_usuarios = $_SESSION['id_usuario'];
	    
	    

	  	//Testa se já curtiu.
	  	$select1 = "SELECT * FROM comentarios WHERE  id_comentario = $id_comentario and id_usuario = $id_usuario and id_publicacao = $id_postagem";
	  	$puxar1 = mysqli_query($conexao, $select1);
	  	$rows1 = mysqli_num_rows($puxar1);

	  	//Ninguém curtiu
	  	if($rows == 0){

	    	$adicionaComentario = "INSERT INTO comentarios (id_comentario, id_usuario, id_publicacao) VALUES ($id_comentario, $id_usuario, $id_postagem)";
		    $result = mysqli_query($conexao, $adicionaComentario);
		    header('location: index.php');
	?>
