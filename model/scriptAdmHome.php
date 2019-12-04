<?php
  $sql = "SELECT c.id, c.nome, c.img, COUNT(va.id_video) as soma
          FROM categoria AS c LEFT JOIN video_aula AS va ON (c.id = va.id_cat)
          GROUP BY c.nome
          ORDER BY c.nome ASC";

  $resultCat = mysqli_query($conn, $sql);
?>