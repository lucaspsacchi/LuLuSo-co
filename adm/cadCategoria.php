<?php 
  include('../connection/conn.php');

  // Verificação de login
  /*
	if (!isset($_SESSION['logado']))) {
			header("Location: ../login.php?erro_login=1");
	}
  */

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
	}
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
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">
				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleFormNome">Nome da categoria</label>
						<input type="text" class="form-control" name="nome" id="nome" required>
					</div>
					<div class="form-group">
						<label for="exampleFormAlias">Possíveis alias</label>
						<input type="text" class="form-control" name="alias" id="alias">
					</div>
					<div class="form-group">
						<img id="photo" src="" class="img-rounded" width="330" height="210">
						<br>
						<label for="comment">Imagem da categoria<span class="ast">*</span> </label>
						<input type="file" name="file" id="file" required/>					
					</div>
					<br>
					<div class="form-group d-flex justify-content-end">
						<button class="btn btn-secondary" name="salvar_dados">Salvar</button>
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
                $('#photo').attr('width', '330px');
                $('#photo').attr('height', '210px');
            }
        });
    </script>