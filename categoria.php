<?php
  include('connection/conn.php');
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

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
