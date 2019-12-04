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
		<link rel="shortcut icon" type="image/png" href="../img/vovoTecAba.png">		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/gerenciamento.css">
		<link rel="stylesheet" href="../css/navfooter.css">
		<link rel="stylesheet" href="../css/adm.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
    <?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">

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
								<div class="row row-home d-flex justify-content-around">
									<a href="cadVideoAula.php?id=<?=$row['id_video']?>" class="btn btn-dark btn-dark-custom" id="card-row-home"><i class="material-icons icon">edit</i></a>
									<button onclick="alertar('<?= $row['id_video'] ?>', <?= $row['soma'] ?>)" class="btn btn-danger btn-danger-custom" id="card-row-home"><i class="material-icons icon">delete</i></button>		
								</div>									
                <a href="perguntas.php?id=<?= $row['id_video'] ?>&nome=<?= $row['nome'] ?>" class="btn btn-custom" id="card-a-home" style="margin-bottom: 10px;">Ver perguntas</a>
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

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
function alertar(del, soma) {
	url = '../model/scriptAdmDeletar.php?del=1&id_video=' + del
	if (soma == 0) {
		Swal.fire({
			title: 'Deseja excluir essa vídeo-aula?',
			imageUrl: '../img/warning.png',
			imageWidth: 125,
			imageHeight: 125,
			imageAlt: 'Perigo',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			focusConfirm: false,
			confirmButtonText: 'Deletar',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				window.location = url
			}
		})
	}
	else {
		Swal.fire({
			title: 'Deseja excluir essa vídeo-aula?',
			text: "Ao deletar essa vídeo-aula, as perguntas dela serão apagadas!",
			imageUrl: '../img/warning.png',
			imageWidth: 125,
			imageHeight: 125,
			imageAlt: 'Perigo',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			focusConfirm: false,
			confirmButtonText: 'Deletar',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				window.location = url
			}
		})
	}
}
</script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

