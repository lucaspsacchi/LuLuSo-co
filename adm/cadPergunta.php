<?php 
  include('../connection/conn.php');
  include('../model/scriptAdmHome.php');
  include('../model/scriptAdmVideos.php');


	// echo $_POST['selectAulas'];

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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">
				<form action="cadPergunta2.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
						<label for="FormCat" class="col-form-label">Selecione a categoria:</label>
						<div class="col-12 col-md-12 col-lg-10">
							<select class="form-control" id="FormCat" name="cat" required>
								<?php 
								if ($resultCat) {
									$flag = FALSE;
									while($row = $resultCat->fetch_assoc()) {
									?>
										<option value="<?= $row['id'] ?>" <?= !$flag ? "selected='selected'" : '' ?>><?= $row['nome'] ?></option>
									<?php 
										// salva o primeiro elemento exibido
										if (!$flag) {
											$flag = $row['id'];
										}									
									}
									echo '</select>';
								}
								else {
									echo 'Não tem categorias cadastradas no sistema!'; // Alterar
								}
								?>
							</select>
						</div>
					</div>

					<hr>
					
					<div class="form-group">
						<label for="FormAulas">Seleciona a vídeo aula</label>
						<div id="aulas" class="d-flex justify-content-start flex-wrap"></div>
					</div>

					<div class="d-flex justify-content-end">
						<input class="btn btn-primary" type="submit" value="Continuar">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<script src="../js/scriptAdmPerguntas1.js"></script>
<script>
	// Vídeo aulas retornados do bd
	var dadosAulas = <?= json_encode($dadosAulas); ?>

	// Carrega os vídeos da primeira categoria
	createAulas(<?= $flag ?>);
</script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

