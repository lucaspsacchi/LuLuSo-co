<?php
  // $sql = "SELECT id_video, nome, id_cat 
  //         FROM video_aula
  //         WHERE id_cat = ?";
  $sql = "SELECT id_video, nome, id_cat 
  FROM video_aula
  WHERE id_cat = '".$_GET['id']."'";

  // $stmt = $conn->prepare($sql);
  // $stmt->bind_param('i', $_GET['id']);
  // $stmt->execute();
  // $resultAulas = $stmt->get_result();
  $resultAulas = mysqli_query($conn, $sql);
?>