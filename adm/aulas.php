<?php 
  session_start();
  include('../connection/conn.php');
  include('../model/scriptAdmAulas.php');
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
		<link rel="stylesheet" href="../css/gerenciamento.css">
		<link rel="stylesheet" href="../css/navfooter.css">
		<link rel="stylesheet" href="../css/adm.css">
	</head>
	<body>
    <?php include('navbar.php'); ?>

		<div class="container-custom">
			<div class="col-12 col-md-12 col-sm-12">
				<center>
					<div class="btn-group dropright">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cadastrar
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="cadCategoria.php">Categoria</a>
							<a class="dropdown-item" href="cadVideoAula.php">Vídeo Aula</a>
							<a class="dropdown-item" href="cadPergunta.php">Pergunta</a>
						</div>
					</div>
				</center>

				<h3>Vídeo Aulas: <?= $_GET['nome'] ?></h3>
				<hr>

				<div class="d-flex justify-content-start flex-wrap">
				<?php
				if ($resultAulas) {
					while ($row = $resultAulas->fetch_assoc()) { 
            // Formatando a imagem
            $img = 'http://img.youtube.com/vi/' . $row['id_video'] . '/maxresdefault.jpg';
            ?>
						<div class="card" id="card-aulas">
							<img src="<?= $img ?>" class="card-img-top" alt="...">
							<div class="card-body">
								<center><h5 class="card-title"><?= $row['nome'] ?></h5></center>
							</div>
              <div class="card-footer">
                <a href="perguntas.php?id=<?= $row['id_video'] ?>&nome=<?= $row['nome'] ?>" class="btn btn-custom" id="card-a-home" style="margin-bottom: 10px;">Ver perguntas</a>
                <a href="#" class="btn btn-dark btn-dark-custom" id="card-a-home">Editar</a> <!-- Criar tela para editar -->
              </div>
						</div>
					<?php
					}
				} ?>
				</div>
			</div>
		</div>
	</body>
</html>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

