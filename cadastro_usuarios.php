<?php
  session_start();
    if(isset($_SESSION['erros'])){
    echo $_SESSION['erros'];
    }
?>
<html>
    <head meta chasrset='utf-8'>
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
    <input type = "password" name="senha">
    <br>
    
    <br>
    <button type='submit'>Cadastrar</button>

  </form>
</body>
</html>