<?php 
	session_start();
  include('../connection/conn.php');

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
						<center><h3>Cadastrar categoria</h3></center>
					</div>
					<div class="form-group" style="margin-top: 20px;">
						<labeL style="color:red; font-size: 14px;">* Campos obrigatórios</label>
						<hr style="margin-top: 5px;">
					</div>
					<div class="form-group">
						<label for="FormNome">Nome da categoria<span style="color:red;">*</span></label>
						<input type="text" class="form-control" name="nome" id="nome" required>
					</div>
					<div class="form-group">
						<label for="FormAlias">Palavras-chaves da categoria</label>
						<textarea class="form-control" name="alias" id="alias" placeholder="Escreva as palavras-chaves separadas por vírgulas" row="4"></textarea >
					</div>
					<div class="form-group">
						<label for="comment" style="margin-bottom: 0px;">Imagem da categoria<span style="color:red;">*</span> </label><br>
						<img id="photo" src="../img/semImg.png" class="img-rounded" width="200" height="200" style="margin: 10px 0px;">
						<br>
						<input type="file" name="file" id="file" required/>					
					</div>
					<br>
					<div class="form-group d-flex justify-content-between">
						<a class="btn btn-secondary" href="home.php">Cancelar</a>
						<button class="btn btn-success" name="salvar_dados">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Script da imagem -->
<script>
	$(document).ready(function (e) {
		// Function to preview image after validation
		$(function () {
				$("#file").change(function () {
						var file = this.files[0];
						var imagefile = file.type;
						var match = ["image/jpeg", "image/png", "image/jpg"];
						if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
						{
								$('#photo').attr('src', 'noimage.png');
								$("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
								return false;
						}
						else
						{
								var reader = new FileReader();
								reader.onload = imageIsLoaded;
								reader.readAsDataURL(this.files[0]);
						}
				});
		});
		function imageIsLoaded(e) {
				$('#photo').attr('src', e.target.result);
				$('#photo').attr('width', '200px');
				$('#photo').attr('height', '200px');
		}
	});
    </script>