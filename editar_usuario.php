 <?php 
	include "conexaobanco.php";
	$id = $_GET['id'];
	$sql = "select * from usuarios where id_usuario = '$id'";
	$result = mysqli_query($conexao, $sql);
	$user = mysqli_fetch_array($result);
	
	mysqli_close($conexao);
 ?>

 <!DOCTYPE html>
 <html>

 <head>
 	<title>Edição</title>
 </head>

 <body>

 	Formulário de Edição Cadastro

	<form method="POST" action="atualizar_usuario.php" enctype="multipart/form-data">
	
		<label>Nome</label>
		<input type="text" name="nome" value="<?php echo $user['nome']; ?>">

		<label>Email</label>
		<input type="email" name="email" value="<?php echo $user['email']; ?>">

		<label>Foto</label>
		<input type="file" name="foto" value="<?php echo $user['foto']; ?>">

		<button type='submit'>Salvar</button>


	</form>
 </body>
 </html>