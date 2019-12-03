<?php
  $script = "SELECT id_cat, id_video, modelo, pergunta FROM pergunta WHERE id = ".$_GET['id'];
  $resultPergunta = mysqli_query($conn, $script);
  $rowP = $resultPergunta->fetch_assoc();

  // Pega os valores passados por url
  $pergunta = $rowP['pergunta'];
  
  if ($rowP['modelo'] == 'alternativa') { // Alternativa
    // Busca pelos dados do modelo
    $script = "SELECT img1, img2, img3, img4 FROM modelo_alternativa WHERE id_pergunta = ".$_GET['id'];
    $resultModelo = mysqli_query($conn, $script);
    $rowM = $resultModelo->fetch_assoc();

    $file0 = $rowM['img1'];
    $file1 = $rowM['img2'];
    $file2 = $rowM['img3'];
    $file3 = $rowM['img4'];
    $mod = 0;
  }
  else if ($rowP['modelo'] == 'sequencia') { // Sequência
    // Busca pelos dados do modelo
    $script = "SELECT texto FROM modelo_sequencia WHERE id_pergunta = ".$_GET['id'];
    $resultModelo = mysqli_query($conn, $script);

    $count = 0;
    $alternativa0 = '';
    $alternativa1 = '';
    $alternativa2 = '';
    $alternativa3 = '';
    $alternativa4 = '';

    while ($rowM = $resultModelo->fetch_assoc()) {
      if ($count == 0) {$alternativa0 = $rowM['texto'];}
      if ($count == 1) {$alternativa1 = $rowM['texto'];}
      if ($count == 2) {$alternativa2 = $rowM['texto'];}
      if ($count == 3) {$alternativa3 = $rowM['texto'];}
      if ($count == 4) {$alternativa4 = $rowM['texto'];}
      $count = $count + 1;
    }
    $mod = 1;
  }
  else if ($rowP['modelo'] == 'pares') { // Toque nos Pares
    // Busca pelos dados do modelo
    $script = "SELECT texto, resposta FROM modelo_pares WHERE id_pergunta = ".$_GET['id'];
    $resultModelo = mysqli_query($conn, $script);

    $count = 0;
    $alternativa0 = '';
    $alternativa1 = '';
    $alternativa2 = '';
    $alternativa3 = '';
    $alternativa4 = '';
    $alternativa5 = '';

    while ($rowM = $resultModelo->fetch_assoc()) {
      if ($count == 0) {$alternativa0 = $rowM['texto'];$alternativa1 = $rowM['resposta'];}
      if ($count == 1) {$alternativa2 = $rowM['texto'];$alternativa3 = $rowM['resposta'];}
      if ($count == 2) {$alternativa4 = $rowM['texto'];$alternativa5 = $rowM['resposta'];}
      $count = $count + 1;
    }
    $mod = 2;
  }
?>