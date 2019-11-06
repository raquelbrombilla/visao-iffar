<?php
include "conexaobanco.php";
$sql="select * from usuarios";
echo $sql;
$result = mysqli_query($conexao,$sql);
?>

<html>
<head>
		<title>Lista de todos os usuários</title>

</head>
<body>
	<tbody>
	<table>
	<thaed>
		<th>Nome</th>
		<th>Email</th>
		<th>Foto</th>
		<th>Editar</th>
		<th>Excluir</th>
	</thaed>
	<tbody>

<?php
		

	if(mysqli_num_rows($result)>0){

		foreach($result as $row){
			echo"<tr>";
			echo"<td>".$row['nome']."</td>";
			echo"<td>".$row['email']."</td>";
			echo"<td>".$row['foto']."</td>";
			
			echo "<td><a href='editar_usuario.php?id=".$row['id_usuario']."' >Editar<i class='fas fa-edit'></i></a></td>";
			echo "<td><a href='excluir_usuario.php?id=".$row['id_usuario']."' >Excluir<i class='fas fa-trash'></i></a></td></tr>";
			

			};
		};

		mysqli_close($conexao);
	
?>

</tbody>
</table>
</body>
</html>
