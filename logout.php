<?php
  session_start();
  unset($_SESSION['id_usuario']);
  unset($_SESSION['admin']);
  header('location: /Visao-IFFar/index.php');
?>