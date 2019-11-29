<?php
  $sql = "SELECT id, nome, img 
          FROM categoria";

  $resultCat = mysqli_query($conn, $sql);
?>