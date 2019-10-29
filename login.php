<?php 
  session_start(); 
?>
<html>
  <head meta chasrset='utf-8'>
    <link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<center>
    Informe seus dados para fazer login
<?php
  if(isset($_SESSION['erros'])){
    echo$_SESSION['erros'];
    }
?>
  <form method='POST' action="logar.php">
  
    E-mail:
      <input type = "text" name="email" pattern=".{11,11}" placeholder="Obrigatoriamente 11 dígitos">
    <br>

    Senha:
      <input type = "password" name="senha" pattern=".{4,200}" placeholder="Mínimo 4 caracteres">
    <br>

    <button type='submit'>Fazer login</button>
  </form>
</center>  
</body>
</html>
