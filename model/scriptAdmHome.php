<?php
  $sql = "SELECT id, nome, img 
          FROM categoria";

  // $stmt = $conn->prepare($sql);
  // $stmt->execute();
  // $resultCat = $stmt->get_result();
  $resultCat = mysqli_query($conn, $sql);
?>