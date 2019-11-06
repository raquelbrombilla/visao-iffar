
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

	<form method="POST" action="atualizar_foto.php" enctype="multipart/form-data">
	
	


		<label>Foto</label>
		<input type="file" name="foto" value="<?php echo $user['foto']; ?>">

	
		<button><a href='perfil.php'>Salvar</button>
		


	</form>
 </body>
 </html>