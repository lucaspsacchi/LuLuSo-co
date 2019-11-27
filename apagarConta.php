<?php
  session_start();
  include('connection/conn.php');
  // Remove id usuário da sessão
  $id_usuario = $_SESSION['id_usuario'];
  unset($_SESSION['id_usuario']);

  // Apaga as perguntas pessoa daquele id
  $del = "DELETE FROM pergunta_pessoa WHERE id_pessoa = '".$id_usuario."';";
  mysqli_query($conn, $del);

  // Apaga o usuário
  $usu = "DELETE FROM pessoa WHERE id = '".$id_usuario."';";
  mysqli_query($conn, $usu);

  header('Location: login.php');
?>