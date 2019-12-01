<?php 
  include('../connection/conn.php');
  include('../model/scriptAdmHome.php');
  include('../model/scriptAdmVideos.php');

	// Pega os valores passados por url
	$cat = (isset($_GET['cat'])) ? $_GET['cat'] : NULL;
	$selectAulas = (isset($_GET['selectAulas'])) ? $_GET['selectAulas'] : NULL;
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">
				<form action="cadPergunta2.php" method="GET" enctype="multipart/form-data">
					<div class="form-group">
						<center><h3>Cadastrar pergunta</h3></center>
					</div>
					<div class="form-group" style="margin-top: 20px;">
						<labeL style="color:red; font-size: 14px;">* Campos obrigatórios</label>
						<hr style="margin-top: 5px;">
					</div>		
					<div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
						<label for="FormCat" class="col-form-label">Categoria da vídeo-aula<span style="color:red;">*</span></label>
						<select class="form-control" id="FormCat" name="cat" required>
							<?php 
							if ($resultCat) {
								$flag = FALSE;
								while($row = $resultCat->fetch_assoc()) {
									$cond = ((!$flag && $cat == NULL) || ($cat != NULL && $cat == $row['id']))
								?>
									<option value="<?= $row['id'] ?>" <?= $cond ? "selected='selected'" : '' ?>><?= $row['nome'] ?></option>
								<?php 
									// salva o primeiro elemento exibido
									if ($cond) {
										$flag = $row['id'];
									}									
								}
								echo '</select>';
							}
							else {
								echo 'Não há categorias cadastradas no sistema!'; // Alterar
							}
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="FormAulas">Vídeo-aula da pergunta<span style="color:red;">*</span></label>
						<div id="aulas" class="d-flex justify-content-start flex-wrap"></div>
					</div>

					<div class="form-group d-flex justify-content-between">
						<a class="btn btn-secondary" href="home.php">Cancelar</a>
						<input class="btn btn-success" type="submit" value="Continuar">
					</div>
				</form>
			</div>
		</div>
		<br>
	</body>
</html>

<script src="../js/scriptAdmPerguntas1.js"></script>

<script>
	// Vídeo aulas retornados do bd
	var dadosAulas = <?= json_encode($dadosAulas); ?>

	// Carrega os vídeos da primeira categoria
	createAulas(<?= $flag ?>, "<?= $selectAulas ?>");
	
</script>

<!-- Import das bibliotecas js do Bootstrap -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

