<?php 
if (isset($_POST['salvar_dados'])) {
  // Cadastro da pergunta
  $id_cat = $_POST['cat'];
  $id_video = $_POST['selectAulas'];

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
    // Imagem 1
    if (isset($_FILES["file0"]["type"])) {
      $validextensions0 = array("jpeg", "jpg", "png");
      $temporary0 = explode(".", $_FILES["file0"]["name"]);
      $file_extension0 = end($temporary0);

      if (in_array($file_extension0, $validextensions0)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file0"]["error"] > 0) {
        } else {
          $novoNome0 = uniqid(time()) . '.' . $file_extension0;
          $destino0 = '../img/' . $novoNome0;
          $sourcePath0 = $_FILES['file0']['tmp_name']; // Storing source path of the file in a variable
          $flag_img0 = move_uploaded_file($sourcePath0, $destino0); // Moving Uploaded file
          if ($flag_img0 != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }

    // Imagem 2
    if (isset($_FILES["file1"]["type"])) {
      $validextensions1 = array("jpeg", "jpg", "png");
      $temporary1 = explode(".", $_FILES["file1"]["name"]);
      $file_extension1 = end($temporary1);

      if (in_array($file_extension1, $validextensions1)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file1"]["error"] > 0) {
        } else {
          $novoNome1 = uniqid(time()) . '.' . $file_extension1;
          $destino1 = '../img/' . $novoNome1;
          $sourcePath1 = $_FILES['file1']['tmp_name']; // Storing source path of the file in a variable
          $flag_img1 = move_uploaded_file($sourcePath1, $destino1); // Moving Uploaded file
          if ($flag_img1 != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }

    // Imagem 3
    if (isset($_FILES["file2"]["type"])) {
      $validextensions2 = array("jpeg", "jpg", "png");
      $temporary2 = explode(".", $_FILES["file2"]["name"]);
      $file_extension2 = end($temporary2);

      if (in_array($file_extension2, $validextensions2)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file2"]["error"] > 0) {
        } else {
          $novoNome2 = uniqid(time()) . '.' . $file_extension2;
          $destino2 = '../img/' . $novoNome2;
          $sourcePath2 = $_FILES['file2']['tmp_name']; // Storing source path of the file in a variable
          $flag_img2 = move_uploaded_file($sourcePath2, $destino2); // Moving Uploaded file
          if ($flag_img2 != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }

    // Imagem 4
    if (isset($_FILES["file3"]["type"])) {
      $validextensions3 = array("jpeg", "jpg", "png");
      $temporary3 = explode(".", $_FILES["file3"]["name"]);
      $file_extension3 = end($temporary3);

      if (in_array($file_extension3, $validextensions3)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file3"]["error"] > 0) {
        } else {
          $novoNome3 = uniqid(time()) . '.' . $file_extension3;
          $destino3 = '../img/' . $novoNome3;
          $sourcePath3 = $_FILES['file3']['tmp_name']; // Storing source path of the file in a variable
          $flag_img3 = move_uploaded_file($sourcePath3, $destino3); // Moving Uploaded file
          if ($flag_img3 != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }

    // Pega o campo correto
    $cor = $_POST['cor'];
    $resposta0 = ($cor == 0) ? 1 : 0;
    $resposta1 = ($cor == 1) ? 1 : 0;
    $resposta2 = ($cor == 2) ? 1 : 0;
    $resposta3 = ($cor == 3) ? 1 : 0;

    // Insere os valores na inserção
    $script = "INSERT INTO `modelo_alternativa` (`id_pergunta`, `img1`, `resposta1`, `img2`, `resposta2`, `img3`, `resposta3`, `img4`, `resposta4`) VALUES ('".$id_pergunta."', '".$novoNome0."', '".$resposta0."', '".$novoNome1."', '".$resposta1."', '".$novoNome2."', '".$resposta2."', '".$novoNome3."', '".$resposta3."')";


    // Realiza a inserção da nova tupla
    $result = mysqli_query($conn, $script);
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
  }

  header('Location: cadPergunta3.php?id='.$id_pergunta);
}



?>