<?php 
	session_start();
  include('../connection/conn.php');
  include('../model/scriptAdmCadVideo.php');

	// Busca para listar todas as categorias
	$script = "SELECT id, nome FROM categoria ORDER BY nome ASC;";
	$result = mysqli_query($conn, $script);

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
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">
				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<center><h3><?= isset($_GET['id']) ? 'Editar vídeo-aula' : 'Cadastrar vídeo-aula' ?></h3></center>
					</div>
					<div class="form-group" style="margin-top: 20px;">
						<labeL style="color:red; font-size: 14px;">* Campos obrigatórios</label>
						<hr style="margin-top: 5px;">
					</div>
					<div class="form-group">
						<label for="FormNome">Nome do vídeo<span style="color:red;">*</span></label>
						<input type="text" class="form-control" value="<?= isset($_GET['id']) ? $row['nome'] : '' ?>" name="nome" id="nome" required>
					</div>
					<div class="form-group">
						<label for="FormUrl">Link do vídeo<span style="color:red;">*</span></label>
						<input type="text" class="form-control" value="https://www.youtube.com/watch?v=<?= isset($_GET['id']) ? $row['id_video'] : '' ?>" name="id_video" id="id_video" placeholder="Ex: https://youtu.be/0bDIQhCUnYk" <?= isset($_GET['id']) ? 'disabled' : 'required'?>>
					</div>
					<div class="form-group">
						<label for="FormCat">Categoria do vídeo<span style="color:red;">*</span></label>
						<select class="form-control" id="FormCat" name="cat">
							<?php
							while($obj = $result->fetch_assoc()){ ?>
								<option value="<?= $obj['id'] ?>" <?=($obj['id'] == $row['id_cat']) ? 'selected="selected"' : '' ?>><?= $obj['nome'] ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<br>
					<div class="form-group d-flex justify-content-between">
						<a class="btn btn-secondary" href="home.php">Cancelar</a>
						<button class="btn btn-success" name="<?= isset($_GET['id']) ? 'editar_dados' : 'salvar_dados' ?>">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php
	if (isset($_SESSION['erro']) && $_SESSION['erro'] == 1) {?>
		<script>
				Swal.fire({
					title: 'Erro!',
					text: 'Vídeo-aula já cadastrada',
					icon: 'error',
	        confirmButtonColor: '#3e9b8a'
				})
		</script>
	<?php
		unset($_SESSION['erro']);
	}
?>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

