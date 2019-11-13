<?php
  // class DB {
  //   function getCon() {
  //     $servername = "localhost";
  //     $username = "root";
  //     $password = "mysql";
  //     $database = "vovotec";
  
  //     // Cria a conexão
  //     $conn = new mysqli($servername, $username, $password, $database);
  //     mysqli_set_charset($conn, "utf8");
  
  //     // Testa a conexão
  //     if ($conn->connect_error) {
  //         die("Connection failed: " . $conn->connect_error);
  //     } 

  //     return $conn;
  //   }
  // }
  $servername = "localhost";
  $username = "root";
  $password = "mysql";
  $database = "vovotec";

  // Cria a conexão
  $conn = new mysqli($servername, $username, $password, $database);
  mysqli_set_charset($conn, "utf8");

  // Testa a conexão
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  return $conn;
?>