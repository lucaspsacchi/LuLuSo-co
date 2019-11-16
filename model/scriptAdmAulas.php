<?php
  $sql = "SELECT id_video, nome, id_cat 
          FROM video_aula
          WHERE id_cat = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $_GET['id']);
  $stmt->execute();
  $resultAulas = $stmt->get_result();
?>