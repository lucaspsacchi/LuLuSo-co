<?php 
if (isset($_POST['salvar_dados'])) {
  // Cadastro da pergunta
  $id_cat = $_POST['id_cat'];
  $id_video = $_POST['id_video'];

  $modeloAux = $_POST['mod'];
  $modelo = ($_POST['mod'] == 0) ? 'alternativa' : ($_POST['mod'] == 1) ? 'sequencia' : 'pares';
  $pergunta = $_POST['pergunta'];

  // Insere os valores na inserção
  $script = "INSERT INTO `pergunta` (`id_video`, `id_cat`, `modelo`, `pergunta`) VALUES ('".$id_video."', '".$id_cat."', '".$modelo."', '".$pergunta."');";
  
  // Realiza a inserção da nova tupla
  mysqli_query($conn, $script);
  $id_pergunta = $conn->insert_id;

  // Cadastro do modelo
  if ($modeloAux == 0) { // Alternativas

  }
  else if ($modeloAux == 1) { // Sequencia
    if ($_POST['alternativa0'] != '') {
      $alternativa = $_POST['alternativa0'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$id_pergunta."', '".$alternativa."', '1');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa1'] != '') {
      $alternativa = $_POST['alternativa1'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$id_pergunta."', '".$alternativa."', '2');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa2'] != '') {
      $alternativa = $_POST['alternativa2'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$id_pergunta."', '".$alternativa."', '3');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa3'] != '') {
      $alternativa = $_POST['alternativa3'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$id_pergunta."', '".$alternativa."', '4');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa4'] != '') {
      $alternativa = $_POST['alternativa4'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$id_pergunta."', '".$alternativa."', '5');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
  }
  else { // Toque nos pares
    if ($_POST['alternativa0'] != '') {
      $alternativa1 = $_POST['alternativa0'];
      $alternativa2 = $_POST['alternativa1'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$id_pergunta."', '".$alternativa1."', '".$alternativa2."');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa2'] != '') {
      $alternativa1 = $_POST['alternativa2'];
      $alternativa2 = $_POST['alternativa3'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$id_pergunta."', '".$alternativa1."', '".$alternativa2."');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa4'] != '') {
      $alternativa1 = $_POST['alternativa4'];
      $alternativa2 = $_POST['alternativa5'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$id_pergunta."', '".$alternativa1."', '".$alternativa2."');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
    if ($_POST['alternativa6'] != '') {
      $alternativa1 = $_POST['alternativa6'];
      $alternativa2 = $_POST['alternativa7'];
      // Insere os valores na inserção
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$id_pergunta."', '".$alternativa1."', '".$alternativa2."');";
      // Realiza a inserção da nova tupla
      $result = mysqli_query($conn, $script);
    }
  }
}



?>