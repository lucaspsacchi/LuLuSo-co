<?php
  $sql = "SELECT id_video, id_cat, modelo, pergunta 
          FROM pergunta
          WHERE id_video = '".$_GET['id']."'
          ORDER BY pergunta ASC";

  $result = mysqli_query($conn, $sql);
?>