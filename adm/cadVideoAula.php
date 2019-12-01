<?php 
	session_start();
  include('../connection/conn.php');

	// Busca para listar todas as categorias
	$script = "SELECT id, nome FROM categoria ORDER BY nome ASC;";
	$result = mysqli_query($conn, $script);

	$array = [];

	while($obj = $result->fetch_object()){ 
		$arrayaux['id'] = $obj->id;
		$arrayaux['nome'] = $obj->nome;
		array_push($array, $arrayaux); // Convertido todos os valores de php para uma array
	}

	// Inserção dos dados
	if (isset($_POST['salvar_dados'])) {

		$nome = $_POST['nome']; // Pega o nome da video aula
		$url = $_POST['id_video']; // Pega a url
		$cat = $_POST['cat']; // Pega o value do campo selecionado

		// Formatando a url para pegar o id
		$id_video = (strlen($url) == 11) ? $url : substr($url, -11);

		// Insere os valores na inserção
		$script = "INSERT INTO `video_aula` (`id_video`, `id_cat`, `nome`) VALUES ('".$id_video."', '".$cat."', '".$nome."');";

		// Realiza a inserção da nova tupla
		$result = mysqli_query($conn, $script);

		if ($result) {
			$_SESSION['videoaula'] = 1;

			header('Location: home.php');
		}
		else {
			$_SESSION['erro'] = 1;
		}
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
						<center><h3>Cadastrar vídeo-aula</h3></center>
					</div>
					<div class="form-group" style="margin-top: 20px;">
						<labeL style="color:red; font-size: 14px;">* Campos obrigatórios</label>
						<hr style="margin-top: 5px;">
					</div>
					<div class="form-group">
						<label for="FormNome">Nome do vídeo<span style="color:red;">*</span></label>
						<input type="text" class="form-control" name="nome" id="nome" required>
					</div>
					<div class="form-group">
						<label for="FormUrl">Link do vídeo<span style="color:red;">*</span></label>
						<input type="text" class="form-control" name="id_video" id="id_video" placeholder="Ex: https://youtu.be/0bDIQhCUnYk" required>
					</div>
					<div class="form-group">
						<label for="FormCat">Categoria do vídeo<span style="color:red;">*</span></label>
						<select class="form-control" id="FormCat" name="cat">
						</select>
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


<!-- Script para inserir os dados do bd por js -->
<script>
	var obj = JSON.parse('<?php echo json_encode($array) ?>') // Converte a array de php para json
	console.log(obj)

	var cat = document.getElementById('FormCat') // Pega o select

	for (i = 0; i < obj.length; i++) {
		let option = document.createElement('option') // Cria a nova opção
		let text = document.createTextNode(obj[i].nome) // Cria o novo texto que é o nome da categoria
		option.appendChild(text) // Insere na opção
		option.value = obj[i].id // Adiciona o id como valor da opção
		cat.appendChild(option) // Adiciona ele ao select
	}
</script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

