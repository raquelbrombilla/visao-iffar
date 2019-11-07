<?php
session_start();
include "conexaobanco.php";
	$consultausuario = "SELECT * FROM usuarios where id_usuario = ".$_SESSION['id_usuario'];
	$result = mysqli_query($conexao, $consultausuario);
	$array = mysqli_fetch_array($result);

?>

<html>
	<head>
	</head>
	<body>
		<center>

		<?php 
			echo "Olá ".$array["nome"];	echo"<br>";
			echo $array["email"];	echo"<br>";
	
			echo "<img src=fotos/".$array['foto']."  width='285' height='300'>";	
			
		?>
		<br></br>
		<button><a href="editar_usuario.php?id=<?php echo $array['id_usuario'] ?>">Editar</button>
		</center>
	
	</body>
</html>

