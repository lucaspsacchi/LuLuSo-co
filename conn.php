<?php
  $servername = "localhost";
  $username = "vovotec";
  $password = "12344321";
  $database = "vovotecBD";

  // Cria a conexão
  $conn = new mysqli($servername, $username, $password, $database);
  mysqli_set_charset($conn, "utf8");

  // Testa a conexão
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  return $conn;
?>