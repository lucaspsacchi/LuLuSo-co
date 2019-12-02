<?php
if (isset($_POST['salvar_dados'])) {
  
  $cat = $_POST['cat'];
  $selectAulas = $_POST['selectAulas'];
  $mod = $_POST['mod'];
  $pergunta = $_POST['pergunta'];

  if ($mod == 0) {
    // Cadastrar as imagens no bd
    if (isset($_FILES["file0"]["type"])) {
      $validextensions = array("jpeg", "jpg", "png");
      $temporary = explode(".", $_FILES["file0"]["name"]);
      $file_extension = end($temporary);
  
      if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file0"]["error"] > 0) {
        } else {
          $novoNome0 = uniqid(time()) . '.' . $file_extension;
          $destino0 = '../img/' . $novoNome0;
          $sourcePath = $_FILES['file0']['tmp_name']; // Storing source path of the file in a variable
          $flag_img = move_uploaded_file($sourcePath, $destino); // Moving Uploaded file
          if ($flag_img != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }
    if (isset($_FILES["file1"]["type"])) {
      $validextensions = array("jpeg", "jpg", "png");
      $temporary = explode(".", $_FILES["file1"]["name"]);
      $file_extension = end($temporary);
  
      if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file1"]["error"] > 0) {
        } else {
          $novoNome1 = uniqid(time()) . '.' . $file_extension;
          $destino1 = '../img/' . $novoNome1;
          $sourcePath = $_FILES['file1']['tmp_name']; // Storing source path of the file in a variable
          $flag_img = move_uploaded_file($sourcePath, $destino); // Moving Uploaded file
          if ($flag_img != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }
    if (isset($_FILES["file2"]["type"])) {
      $validextensions = array("jpeg", "jpg", "png");
      $temporary = explode(".", $_FILES["file2"]["name"]);
      $file_extension = end($temporary);
  
      if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file2"]["error"] > 0) {
        } else {
          $novoNome2 = uniqid(time()) . '.' . $file_extension;
          $destino2 = '../img/' . $novoNome2;
          $sourcePath = $_FILES['file2']['tmp_name']; // Storing source path of the file in a variable
          $flag_img = move_uploaded_file($sourcePath, $destino); // Moving Uploaded file
          if ($flag_img != TRUE) {
            ?>
            <script>
              alert("Ocorreu um erro inesperado com a imagem");
            </script>
            <?php
          }
        }
      }
    }
    if (isset($_FILES["file3"]["type"])) {
      $validextensions = array("jpeg", "jpg", "png");
      $temporary = explode(".", $_FILES["file3"]["name"]);
      $file_extension = end($temporary);
  
      if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
        if ($_FILES["file3"]["error"] > 0) {
        } else {
          $novoNome3 = uniqid(time()) . '.' . $file_extension;
          $destino3 = '../img/' . $novoNome3;
          $sourcePath = $_FILES['file3']['tmp_name']; // Storing source path of the file in a variable
          $flag_img = move_uploaded_file($sourcePath, $destino); // Moving Uploaded file
          if ($flag_img != TRUE) {
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
 }
  else if ($mod == 1) {
    // Pegar as sequências
    
  }
  else {
    // Pegar os toques nos pares
  }

  header('Location: '.$str);
}






?>