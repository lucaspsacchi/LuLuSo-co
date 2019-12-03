<?php
if (isset($_GET['cat'])) { // Categoria
  $flag = 3;

  // Busca por categoria nos videos
  $script = "SELECT * FROM video_aula WHERE id_cat =".$_GET['cat'];
  $res = mysqli_query($conn, $script);
  
  if ($res->num_rows > 0) {
    // alerta
  }
}

if (isset($_GET['id_video'])) { // Vídeo aula
  $flag = 2;

    // Busca por perguntas daquela video aula
    $script = "SELECT * FROM pergunta WHERE id_cat =".$_GET['cat'];
    $res = mysqli_query($conn, $script);
    
    if ($res->num_rows > 0) {
      // alerta
    }
}

if (isset($_GET['id'])) { // Pergunta
  $flag = 1;
}

// Arrumar

if ($flag > 0) {
  // Deleta dos modelos
  $script1 = "DELETE FROM modelo_alternativa WHERE id_pergunta=".$_GET['id'];
  $script2 = "DELETE FROM modelo_sequencia WHERE id_pergunta=".$_GET['id'];
  $script3 = "DELETE FROM modelo_pares WHERE id_pergunta=".$_GET['id'];
  mysqli_query($conn, $script1);
  mysqli_query($conn, $script2);
  mysqli_query($conn, $script3);

  // Deleta a pergunta
  $script = "DELETE FROM pergunta WHERE id=".$_GET['id'];
  mysqli_query($conn, $script);
}

if ($flag > 1) {
  // Deleta a video aula
  $script = "DELETE FROM video_aula WHERE id_video=".$_GET['id_video'];
  mysqli_query($conn, $script);
}

if ($flag > 2) {
  // Deleta a categoria
  $script = "DELETE FROM categoria WHERE id=".$_GET['cat'];
  mysqli_query($conn, $script);
}
?>