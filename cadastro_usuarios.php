<?php
  session_start();
    if(isset($_SESSION['erros'])){
    echo "<label class='dados' >".$_SESSION['erros']."</label>";
    }
?>
<html>
    <head meta chasrset='utf-8'>
      <link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<body>

    Informe seus dados para realizar o cadastro:

  <form method='POST' action="testa_cadastro.php">

    Nome:      
    <input type = "text" name="nome">
    <br>

    E-mail:
    <input type = "email" name="email">
    <br>
    
    Senha:
    <input type = "password" name="senha" pattern=".{4,200}" placeholder="Mínimo 4 caracteres">
    <br>
    
    <button type='submit'>Cadastrar</button>

  </form>
</body>
</html>