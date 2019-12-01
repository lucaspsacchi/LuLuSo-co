<?php
  $sql = "SELECT id, nome, img 
          FROM categoria
          ORDER BY nome ASC";

  $resultCat = mysqli_query($conn, $sql);
?>