<?php
	session_start();
	$_SESSION['ultima_cat'] = $_GET['cat'];
	include('connection/conn.php');
	include('niveisConhecimento.php');
	include('model/scriptNiveisConhecimento.php');

	// Cadastrar as respostas
	if(isset($_GET['id_video'])) {
		$flag = 1;
		$i = 0;
		while ($flag) {
			$id_pergunta = $_GET['id' . $i];

			$flag = $_GET['flag' . $i];

			// Apaga a resposta anterior
			$script = "DELETE FROM `pergunta_pessoa`
			WHERE `id_pergunta` = '".$id_pergunta."' AND `id_pessoa` = '".$_SESSION['id_usuario']."' AND `id_video` = '".$_GET['id_video']."' AND `id_cat` = '".$_GET['cat']."'";
			mysqli_query($conn, $script);

			// Insere nova resposta
			$script = "INSERT INTO `pergunta_pessoa` (`id_pergunta`, `id_pessoa`, `id_video`, `id_cat`, `flag`)
			VALUES ('".$id_pergunta."','".$_SESSION['id_usuario']."','".$_GET['id_video']."','".$_GET['cat']."','".$flag."')";
			mysqli_query($conn, $script);

			$i = $i + 1;
			$str = 'id' . $i;
			if (isset($_GET[$str])) {
				$flag = 1;
			}
			else {
				$flag = 0;
			}
		}
	}

	include('model/scriptCategoria.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>VovoTec</title>
		<meta name="author" content="">
		<meta name="description" content="">
		<link rel="shortcut icon" type="image/png" href="img/vovotecAba.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/navfooter.css">
	</head>
	<body>
	<!-- Navbar -->
	<?php include('navbar.php'); ?>

	<div class="col-12 col-md-12 col-sm-12">
  	<div id="videos" class="row row-custom">
		<?php
      if ($result) {
        while ($video = $result->fetch_assoc()) {
					// Preparar a imagem
					$img = 'http://img.youtube.com/vi/' . $video['id_video'] . '/maxresdefault.jpg'
          ?>
					<div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex justify-content-center div-cat">
						<div class="card card-custom card-cat shadow-sm">
							<a href="modeloPergunta.php?id=<?= $video['id_video'] ?>">
								<div class="imagem-categoria d-flex align-content-end flex-wrap" style="background-image: linear-gradient(transparent, transparent, rgb(0, 0, 0)), url(<?= $img ?>); background-size: cover;">
									<div class="titulo">
										<?= $video['nome'] ?>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php 
				}
			}
		?>
		</div>
	</div>
	</body>
</html>

<script type="text/javascript" src="js/scriptCateg.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<!-- Alerts -->
<?php
if (isset($alertSubiuNivel) && $alertSubiuNivel > 0) {
	// Exibe o alerta
  ?>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      Swal.fire({
        title: 'Parabéns!',
        text: 'Você atingiu o Nivel <?=$niveis[$alertSubiuNivel]?>!',
        imageUrl: 'img/<?=$alertSubiuNivel?>.png',
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: '<?=$niveis[$alertSubiuNivel]?>',
      })
     }); 
  </script>
	<?php
	$script = "UPDATE pessoa
						SET nivel_conhecimento = '".$alertSubiuNivel."'
						WHERE id =  '".$_SESSION['id_usuario']."';";
	mysqli_query($conn, $script);
}
?>