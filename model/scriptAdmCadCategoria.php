<?php
// Cadastrar
if (isset($_POST['salvar_dados'])) {

  // Pega o nome
  $nome = $_POST['nome'];

  // Pega o alias
  $alias = isset($_POST['alias']) ? $_POST['alias'] : '';

  // Pega a imagem, formata para um novo nome único e move para a pasta img
  if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if (in_array($file_extension, $validextensions)) {//Verifica se está de acordo com a extensão
      if ($_FILES["file"]["error"] > 0) {

      } else {
          $novoNome = uniqid(time()) . '.' . $file_extension;
          $destino = '../img/' . $novoNome;
          $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable

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

  // Insere os valores na inserção
  $script = "INSERT INTO `categoria` (`nome`, `alias`, `img`) VALUES ('".$nome."', '".$alias."', '".$novoNome."');";

  // Realiza a inserção da nova tupla
  mysqli_query($conn, $script);

  $_SESSION['categoria'] = 1;

  header('Location: home.php');
}

// Editar
if (isset($_POST['editar_dados'])) {

  $nome = $_POST['nome'];

  // Pega o alias
  $alias = isset($_POST['alias']) ? $_POST['alias'] : '';

  $script = "UPDATE categoria SET nome ='".$nome."', alias ='".$alias."' WHERE id =".$_GET['id'];
  mysqli_query($conn, $script);

  $_SESSION['categoria_editado'] = 1;

  header('Location: home.php');
}

if (isset($_GET['id'])) {
  $script = "SELECT * FROM categoria WHERE id =".$_GET['id'];
  $result = mysqli_query($conn, $script);
  $row = $result->fetch_assoc();
}

?>