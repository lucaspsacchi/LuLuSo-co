<?php
  $sql = "SELECT id_video, nome, id_cat 
  FROM video_aula
  WHERE id_cat = '".$_GET['id']."'
  ORDER BY nome ASC";

  $resultAulas = mysqli_query($conn, $sql);
?>