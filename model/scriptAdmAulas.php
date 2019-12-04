<?php
  $sql = "SELECT va.id_video, va.nome, va.id_cat, COUNT(p.id) AS soma 
  FROM video_aula AS va LEFT JOIN pergunta AS p ON (va.id_video = p.id_video)
  WHERE va.id_cat = '".$_GET['id']."'
  GROUP BY va.id_video
  ORDER BY nome ASC";

  $resultAulas = mysqli_query($conn, $sql);
?>