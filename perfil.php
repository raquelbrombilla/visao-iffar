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
		<?php 
			echo "Olá ".$array["nome"];	echo"<br>";
			echo $array["email"];	echo"<br>";
	
			echo "<img src=fotos/".$array['foto']."  width='250' height='300'>";	
			echo $array['foto'];
		?>
		<button><a href='editar_usuario.php'>Editar</button>
	
	</body>
</html>

