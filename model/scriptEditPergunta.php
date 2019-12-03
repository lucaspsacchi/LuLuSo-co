<?php
$script = "SELECT id, id_video, modelo, pergunta FROM pergunta WHERE id=".$_GET['id'];
$result = mysqli_query($conn, $script);
$row = $result->fetch_assoc();
// Pega o modelo da questão
if ($row['modelo'] == 'alternativa') {
  $mod = 0;

  // Busca pelos dados da pergunta
  $script = "SELECT img1, resposta1, img2, resposta2, img3, resposta3, img4, resposta4 FROM modelo_alternativa WHERE id_pergunta =".$_GET['id'];
  $res = mysqli_query($conn, $script);
  $rowM = $res->fetch_assoc();

  // Formata os dados
  $dados = array('img1' => $rowM['img1'], 'img2' => $rowM['img2'], 'img3' => $rowM['img3'], 'img4' => $rowM['img4'], 'res1' => $rowM['resposta1'], 'res2' => $rowM['resposta2'], 'res3' => $rowM['resposta3'], 'res4' => $rowM['resposta4']);
}
else if ($row['modelo'] == 'sequencia') {
  $mod = 1;

  // Busca pelos dados da pergunta
  $script = "SELECT texto, posicao FROM modelo_sequencia WHERE id_pergunta ='".$_GET['id']."' ORDER BY posicao ASC";
  $res = mysqli_query($conn, $script);

  // Formata os dados
  $dados = [];
  $count = 0;
  while ($rowM = $res->fetch_assoc()) {
    $dados['seq'.$count] = $rowM['texto'];
    $dados['id'.$count] = $rowM['posicao'];
    $count = $count + 1;
  }
}
else {
  $mod = 2;

  // Busca pelos dados da pergunta
  $script = "SELECT texto, resposta FROM modelo_pares WHERE id_pergunta =".$_GET['id'];
  $res = mysqli_query($conn, $script);

  // Formata os dados
  $dados = [];
  $count = 0;
  while ($rowM = $res->fetch_assoc()) {
    $dados['seq'.$count] = $rowM['texto'];
    $count = $count + 1;
    $dados['seq'.$count] = $rowM['resposta'];
    $count = $count + 1;
  } 
}

// Atualiza os campos
if (isset($_POST['editar_dados'])) {
  // Atualiza a pergunta
  $pergunta = $_POST['pergunta'];
  if ($_POST['mod'] == 0) {
    $mod = 'alternativa';
  }
  else if ($_POST['mod'] == 1) {
    $mod = 'sequencia';
  }
  else {
    $mod = 'pares';
  }

  // Remove o antigo modelo
  if ($row['modelo'] == 'alternativa') {
    // Pega as novas imagens
    $img1 = $rowM['img1'];
    $img2 = $rowM['img2'];
    $img3 = $rowM['img3'];
    $img4 = $rowM['img4'];


    if (isset($_FILES['file0']["type"])) {
      // Remove do bd
      $file = '../img/' . $img1;
      if (file_exists($file)) {
        // unlink($file);
      }

      if (isset($_FILES["file0"]["type"])) {
        $validextensions0 = array("jpeg", "jpg", "png");
        $temporary0 = explode(".", $_FILES["file0"]["name"]);
        $file_extension0 = end($temporary0);
  
        if (in_array($file_extension0, $validextensions0)) {//Verifica se está de acordo com a extensão
          $img1 = uniqid(time()) . '.' . $file_extension0;
          $destino0 = '../img/' . $img1;
          $sourcePath0 = $_FILES['file0']['tmp_name']; // Storing source path of the file in a variable
          $flag_img0 = move_uploaded_file($sourcePath0, $destino0); // Moving Uploaded file
        }
      }
    }

    if (isset($_FILES['file1']["type"])) {
      // Remove do bd
      $file = realpath($img2);
      if (file_exists($file)) {
        // unlink($file);
      }

      // Insere o novo
      if (isset($_FILES["file1"]["type"])) {
        $validextensions1 = array("jpeg", "jpg", "png");
        $temporary1 = explode(".", $_FILES["file1"]["name"]);
        $file_extension1 = end($temporary1);
  
        if (in_array($file_extension1, $validextensions1)) {//Verifica se está de acordo com a extensão
          $img2 = uniqid(time()) . '.' . $file_extension1;
          $destino1 = realpath($img2);
          $sourcePath1 = $_FILES['file1']['tmp_name']; // Storing source path of the file in a variable
          $flag_img1 = move_uploaded_file($sourcePath1, $destino1); // Moving Uploaded file
        }
      }
    }

    if (isset($_FILES['file2']["type"])) {
      // Remove do bd
      $file = '../img/' . $img3;
      if (file_exists($file)) {
        // unlink($file);
      }    
    
      // Insere o novo
      if (isset($_FILES["file2"]["type"])) {
        $validextensions2 = array("jpeg", "jpg", "png");
        $temporary2 = explode(".", $_FILES["file2"]["name"]);
        $file_extension2 = end($temporary2);
  
        if (in_array($file_extension2, $validextensions2)) {//Verifica se está de acordo com a extensão
          $novoNome3 = uniqid(time()) . '.' . $file_extension2;
          $destino2 = '../img/' . $novoNome3;
          $sourcePath2 = $_FILES['file2']['tmp_name']; // Storing source path of the file in a variable
          $flag_img2 = move_uploaded_file($sourcePath2, $destino2); // Moving Uploaded file
        }
      }
    }

    if (isset($_FILES['file3']["type"])) {
      // Remove do bd
      $file = '../img/' . $img4;
      if (file_exists($file)) {
        // unlink($file);
      }      

      // Insere o novo
      if (isset($_FILES["file3"]["type"])) {
        $validextensions3 = array("jpeg", "jpg", "png");
        $temporary3 = explode(".", $_FILES["file3"]["name"]);
        $file_extension3 = end($temporary3);
  
        if (in_array($file_extension3, $validextensions3)) {//Verifica se está de acordo com a extensão
          $img4 = uniqid(time()) . '.' . $file_extension3;
          $destino3 = '../img/' . $img4;
          $sourcePath3 = $_FILES['file3']['tmp_name']; // Storing source path of the file in a variable
          $flag_img3 = move_uploaded_file($sourcePath3, $destino3); // Moving Uploaded file
        }
      }
    }

    // Remove modelo antigo
    $script = "DELETE FROM modelo_alternativa WHERE id_pergunta =".$_GET['id'];
    mysqli_query($conn, $script);
  }
  else if ($row['modelo'] == 'sequencia') {
    // Remove modelo antigo
    $script = "DELETE FROM modelo_sequencia WHERE id_pergunta =".$_GET['id'];
    mysqli_query($conn, $script);
  }
  else {
    // Remove modelo antigo
    $script = "DELETE FROM modelo_pares WHERE id_pergunta =".$_GET['id'];
    mysqli_query($conn, $script);
  }

  // Atualiza os campos de pergunta
  $script = "UPDATE pergunta SET pergunta = '".$pergunta."', modelo = '".$mod."' WHERE id =".$_GET['id'];
  mysqli_query($conn, $script);

  // Insere o novo modelo
  if ($_POST['mod'] == 0) {
    $mod = 'alternativa';

    $res1 = 0;
    $res2 = 0;
    $res3 = 0;
    $res4 = 0;

    // Resposta
    if ($_POST['cor'] == 0) {
      $res1 = 1;
    }
    else if ($_POST['cor'] == 1) {
      $res2 = 1;
    }
    else if ($_POST['cor'] == 2) {
      $res3 = 1;
    }
    else {
      $res4 = 1;
    }

    // Insere no bd
    $script = "INSERT INTO `modelo_alternativa` (`id_pergunta`, `img1`, `resposta1`, `img2`, `resposta2`, `img3`, `resposta3`, `img4`, `resposta4`) VALUES ('".$_GET['id']."', '".$img1."', '".$res1."', '".$img2."', '".$res2."', '".$img3."', '".$res3."', '".$img4."', '".$res4."');";
    mysqli_query($conn, $script);

  }
  else if ($_POST['mod'] == 1) {
    if (isset($_POST['alternativa0'])) {
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$_GET['id']."', '".$_POST['alternativa0']."', '1');";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa1'])) {
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$_GET['id']."', '".$_POST['alternativa1']."', '2');";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa2']) && $_POST['alternativa2'] != '') {
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$_GET['id']."', '".$_POST['alternativa2']."', '3');";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa3']) && $_POST['alternativa3'] != '') {
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$_GET['id']."', '".$_POST['alternativa3']."', '4');";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa4']) && $_POST['alternativa4'] != '') {
      $script = "INSERT INTO `modelo_sequencia` (`id_pergunta`, `texto`, `posicao`) VALUES ('".$_GET['id']."', '".$_POST['alternativa4']."', '5');";
      mysqli_query($conn, $script);
    }
  }
  else {
    if (isset($_POST['alternativa0'])) {
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$_GET['id']."', '".$_POST['alternativa0']."', '".$_POST['alternativa1']."')";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa2'])) {
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$_GET['id']."', '".$_POST['alternativa2']."', '".$_POST['alternativa3']."')";
      mysqli_query($conn, $script);
    }
    if (isset($_POST['alternativa4']) && $_POST['alternativa4'] != '') {
      $script = "INSERT INTO `modelo_pares` (`id_pergunta`, `texto`, `resposta`) VALUES ('".$_GET['id']."', '".$_POST['alternativa4']."', '".$_POST['alternativa5']."')";
      mysqli_query($conn, $script);
    }
  }
}
?>