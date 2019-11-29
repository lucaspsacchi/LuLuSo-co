<?php
  $sql = "SELECT *
          FROM video_aula";

  $resultAulas = mysqli_query($conn, $sql);

  $dadosAulas = [];
  while ($row = $resultAulas->fetch_assoc()) {
    $aux['id_video'] = $row['id_video'];
    $aux['id_cat'] = $row['id_cat'];
    $aux['nome'] = $row['nome'];
    array_push($dadosAulas, $aux);
  }
?>