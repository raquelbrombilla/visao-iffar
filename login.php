<?php 
  session_start(); 
  echo"oi":
?>

<html>

<head meta chasrset='utf-8'>
</head>

    <center>Informe seus dados para fazer login:<br>

<?php
    if(isset($_SESSION['erros'])){
    echo$_SESSION['erros'];
    }
?>
    <form method='POST' action="logar.php">
    <br>
    
    E-mail:
    <input type = "text" name="email">
    <br><br>

    Senha:
    <input type = "password" name="senha">
    <br>
    <br>

    <button type='submit'>Fazer login</button>

  </form>
  </center>
</body>
</html>
