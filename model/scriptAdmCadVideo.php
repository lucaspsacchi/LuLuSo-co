<?php
// Inserção dos dados
if (isset($_POST['salvar_dados'])) {

  $nome = $_POST['nome']; // Pega o nome da video aula
  $url = $_POST['id_video']; // Pega a url
  $cat = $_POST['cat']; // Pega o value do campo selecionado

  // Formatando a url para pegar o id
  $id_video = (strlen($url) == 11) ? $url : substr($url, -11);

  // Insere os valores na inserção
  $script = "INSERT INTO `video_aula` (`id_video`, `id_cat`, `nome`) VALUES ('".$id_video."', '".$cat."', '".$nome."');";

  // Realiza a inserção da nova tupla
  $result = mysqli_query($conn, $script);

  if ($result) {
    $_SESSION['videoaula'] = 1;

    header('Location: home.php');
  }
  else {
    $_SESSION['erro'] = 1;
  }
}

// Atualiza os dados no bd
// Inserção dos dados
if (isset($_POST['editar_dados'])) {

  $nome = $_POST['nome']; // Pega o nome da video aula
  $cat = $_POST['cat']; // Pega o value do campo selecionado


  // Atualiza os valores na inserção
  $script = "UPDATE video_aula SET id_cat = '".$cat."', nome = '".$nome."' WHERE id_video = '".$_GET['id']."'";

  $result = mysqli_query($conn, $script);

  $_SESSION['videoaula_editado'] = 1;

  header('Location: home.php');
}


// Procura pelo id do vídeo
if (isset($_GET['id'])) {
  $script = "SELECT * FROM video_aula WHERE id_video ='".$_GET['id']."'";
  $result = mysqli_query($conn, $script);
  $row = $result->fetch_assoc();
}
?>