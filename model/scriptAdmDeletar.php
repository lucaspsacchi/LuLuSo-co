<?php
include('../connection/conn.php');
session_start();

// Se foi setado para remover
if (isset($_GET['del'])) {
  if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];

    $script = "SELECT id_video FROM video_aula WHERE id_cat=".$cat;
    $resI = mysqli_query($conn, $script);

    while ($resI && $rowC = $resI->fetch_assoc()) {
      $id_video = $rowC['id_video'];

      $script = "SELECT id FROM pergunta WHERE id_video='".$id_video."'";
      $resE = mysqli_query($conn, $script);
      while ($resE && $rowV = $resE->fetch_assoc()) {
        $id = $rowV['id'];
        // Deleta dos modelos
        $script = "SELECT img1, img2, img3, img4 FROM modelo_alternativa WHERE id_pergunta='".$id."'";
        $res =  mysqli_query($conn, $script);
        if ($r = $res->fetch_assoc()) {
          unlink('../img/'.$r['img1']);
          unlink('../img/'.$r['img2']);
          unlink('../img/'.$r['img3']);
          unlink('../img/'.$r['img4']);
        }

        $script1 = "DELETE FROM modelo_alternativa WHERE id_pergunta='".$id."'";
        mysqli_query($conn, $script1);
        $script2 = "DELETE FROM modelo_sequencia WHERE id_pergunta='".$id."'";
        mysqli_query($conn, $script2);
        $script3 = "DELETE FROM modelo_pares WHERE id_pergunta='".$id."'";
        mysqli_query($conn, $script3);
      
        // Deleta a pergunta
        $script = "DELETE FROM pergunta WHERE id=".$id;
        mysqli_query($conn, $script);
      }
      // Deleta a video aula
      $script = "DELETE FROM video_aula WHERE id_video='".$id_video."'";
      mysqli_query($conn, $script);
    }
    // Deleta a categoria
    $script = "SELECT img FROM categoria WHERE id=".$cat;
    $res = mysqli_query($conn, $script);
    $r = $res->fetch_assoc();
    unlink('../img/'.$r['img']);

    $script = "DELETE FROM categoria WHERE id=".$cat;
    mysqli_query($conn, $script);

    $_SESSION['categoria_removida'] = 1;
    header('Location: ../adm/home.php'); 
  }
  else if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];

    $script = "SELECT id FROM pergunta WHERE id_video='".$id_video."'";
    $res = mysqli_query($conn, $script);
    
    while ($res && $rowV = $res->fetch_assoc()) {
      $id = $rowV['id'];
      // Deleta dos modelos
      $script = "SELECT img1, img2, img3, img4 FROM modelo_alternativa WHERE id_pergunta='".$id."'";
      $res =  mysqli_query($conn, $script);
      if ($r = $res->fetch_assoc()) {
        unlink('../img/'.$r['img1']);
        unlink('../img/'.$r['img2']);
        unlink('../img/'.$r['img3']);
        unlink('../img/'.$r['img4']);
      }

      $script1 = "DELETE FROM modelo_alternativa WHERE id_pergunta='".$id."'";
      mysqli_query($conn, $script1);
      $script2 = "DELETE FROM modelo_sequencia WHERE id_pergunta='".$id."'";
      mysqli_query($conn, $script2);
      $script3 = "DELETE FROM modelo_pares WHERE id_pergunta='".$id."'";
      mysqli_query($conn, $script3);
    
      // Deleta a pergunta
      $script = "DELETE FROM pergunta WHERE id=".$id;
      mysqli_query($conn, $script);
    }

    // Deleta a video aula
    $script = "DELETE FROM video_aula WHERE id_video='".$id_video."'";
    mysqli_query($conn, $script);

    $_SESSION['video_removida'] = 1;
    header('Location: ../adm/home.php');  
  }
  else if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta dos modelos
    $script = "SELECT img1, img2, img3, img4 FROM modelo_alternativa WHERE id_pergunta='".$id."'";
    $res =  mysqli_query($conn, $script);
    if ($r = $res->fetch_assoc()) {
      unlink('../img/'.$r['img1']);
      unlink('../img/'.$r['img2']);
      unlink('../img/'.$r['img3']);
      unlink('../img/'.$r['img4']);
    }

    $script1 = "DELETE FROM modelo_alternativa WHERE id_pergunta='".$id."'";
    mysqli_query($conn, $script1);
    $script2 = "DELETE FROM modelo_sequencia WHERE id_pergunta='".$id."'";
    mysqli_query($conn, $script2);
    $script3 = "DELETE FROM modelo_pares WHERE id_pergunta='".$id."'";
    mysqli_query($conn, $script3);

    // Deleta a pergunta
    $script = "DELETE FROM pergunta WHERE id=".$id;
    mysqli_query($conn, $script);

    $_SESSION['pergunta_removida'] = 1;
    header('Location: ../adm/home.php');
  }
}
?>