<?php
  $sql = "SELECT id, nome, img 
          FROM categoria";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
?>