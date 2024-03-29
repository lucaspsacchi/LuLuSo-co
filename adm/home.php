<?php 
  session_start();
  include('../connection/conn.php');
	include('../model/scriptAdmHome.php');
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
				<center>
					<div class="btn-group dropright">
						<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cadastrar
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item dropdown-custom" href="cadCategoria.php">Categoria</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item dropdown-custom" href="cadVideoAula.php">Vídeo Aula</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item dropdown-custom" href="cadPergunta.php">Pergunta</a>
						</div>
					</div>
				</center>

				<h3>Categorias</h3>
				<hr>

				<div class="d-flex justify-content-start flex-wrap">
				<?php
				if ($resultCat) {
					while ($row = $resultCat->fetch_assoc()) { ?>
						<div class="card" id="card-home">
							<img src="../img/<?= $row['img'] ?>" class="card-img-top" alt="...">
							<div class="card-body">
								<center><h5 class="card-title"><?= $row['nome'] ?></h5></center>

							</div>
							<div class="card-footer">
								<div class="row row-home d-flex justify-content-around">
									<a href="cadCategoria.php?id=<?= $row['id'] ?>" class="btn btn-dark btn-dark-custom" id="card-row-home"><i class="material-icons icon">edit</i></a>
									<button onclick="alertar(<?= $row['id'] ?>, <?= $row['soma'] ?>)" class="btn btn-danger btn-danger-custom" id="card-row-home"><i class="material-icons icon">delete</i></button>		
								</div>							
								<a href="aulas.php?id=<?= $row['id'] ?>&nome=<?= $row['nome'] ?>" class="btn btn-custom" id="card-a-home" style="margin-bottom: 10px;">Ver aulas</a>
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
	url = '../model/scriptAdmDeletar.php?del=1&cat=' + del
	if (soma == 0) {
		Swal.fire({
			title: 'Deseja excluir essa categoria?',
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
		title: 'Deseja excluir essa categoria?',
		text: "Ao deletar essa categoria, as vídeo-aulas dela serão apagadas!",
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

<?php
	if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Categoria cadastrada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['categoria']);
	}

	if (isset($_SESSION['categoria_editado']) && $_SESSION['categoria_editado'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Categoria alterada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['categoria_editado']);
	}
	

	if (isset($_SESSION['videoaula']) && $_SESSION['videoaula'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Vídeo-aula cadastrada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['videoaula']);
	}

	if (isset($_SESSION['videoaula_editado']) && $_SESSION['videoaula_editado'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Vídeo-aula alterada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['videoaula_editado']);
	}
	
	if (isset($_SESSION['pergunta']) && $_SESSION['pergunta'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Pergunta cadastrada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['pergunta']);
	}	

	if (isset($_SESSION['pergunta_editado']) && $_SESSION['pergunta_editado'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Pergunta alterada com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['pergunta_editado']);
	}	

	if (isset($_SESSION['pergunta_removida']) && $_SESSION['pergunta_removida'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Pergunta removida com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['pergunta_removida']);
	}		

	if (isset($_SESSION['video_removida']) && $_SESSION['video_removida'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Vídeo-aula removida com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['video_removida']);
	}	

	if (isset($_SESSION['categoria_removida']) && $_SESSION['categoria_removida'] == 1) {?>
		<script>
			Swal.fire({
				title: 'Categoria removida com sucesso!',
				icon: 'success',
				confirmButtonColor: '#3e9b8a'
			})
		</script>
	<?php
		unset($_SESSION['categoria_removida']);
	}	

?>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

