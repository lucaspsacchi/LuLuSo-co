<?php
  $sql = "SELECT id_video, id_cat, modelo, pergunta 
          FROM pergunta
          WHERE id_video = '".$_GET['id']."'";

  // $stmt = $conn->prepare($sql);
  // $stmt->bind_param('s', $_GET['id']);
  // $stmt->execute();
  // $result = $stmt->get_result();
  $result = mysqli_query($conn, $sql);
?>