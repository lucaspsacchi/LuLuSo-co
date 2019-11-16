<?php 
  include('../connection/conn.php');
  include('../model/scriptAdmHome.php');
  include('../model/scriptAdmCadPerguntas.php');


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
				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
						<label for="FormCat" class="col-form-label">Selecione a categoria:</label>
						<div class="col-12 col-md-12 col-lg-10">
							<select class="form-control" id="FormCat" name="cat" required>
								<?php 
								if ($resultCat) {
									$flag = FALSE;
									while($row = $resultCat->fetch_assoc()) {
										if (!$flag) {
											$flag = $row['id'];
										}
									?>
										<option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
									<?php 
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

					<hr>

					<div class="form-group">
						<div class="col-12 col-md-12 col-lg-12 row">
							<div class="col-12 col-md-12 col-lg-6">
								<label for="FormModelo">Selecione o modelo da pergunta</label>
								<select class="form-control" id="FormMod" name="mod" required>
									<option value="0">Alternativa</option>
									<option value="1">Sequência</option>
									<option value="2">Toque nos Pares</option>
								</select>
							</div>
							<div class="col-12 col-md-12 col-lg-6">
								<label for="FormPergunta">Pergunta</label>
								<input type="text" class="form-control" id="pergunta">
							</div>
						</div>
						<!-- Pergunta -->
						<!-- Alternativas -->
					</div>


					<input class="btn btn-primary" type="submit"></input>
				</form>
			</div>
		</div>
	</body>
</html>

<script>
	// Vídeo aulas retornados do bd
	var dadosAulas = <?= json_encode($dadosAulas); ?>

	// Função para criar as video aulas
	function createAulas(id) {
		for (i = 0; i < dadosAulas.length; i++) {
			if (dadosAulas[i]['id_cat'] == id) {
				// Div do card
				let divCard = document.createElement('div')
				divCard.className = 'card'
				divCard.id = 'card-aulas'

				// img
				let img = document.createElement('img')
				img.className = 'card-img-top'

				// Pega a thumbnail
				let imgaux = 'http://img.youtube.com/vi/'.concat(dadosAulas[i].id_video).concat('/maxresdefault.jpg')
				img.src = imgaux
				divCard.appendChild(img)

				// Div card body
				let divBody = document.createElement('div')
				divBody.className = 'card-body'
				divCard.appendChild(divBody)

				// Center e h5
				let center = document.createElement('center')
				let h5 = document.createElement('h5')
				h5.className = "card-title"
				let h5Text = document.createTextNode(dadosAulas[i]['nome'])
				h5.appendChild(h5Text)
				center.appendChild(h5)
				divBody.appendChild(center)

				// Div card footer
				let divFooter = document.createElement('div')
				divFooter.className = 'card-footer btn-group'
				divFooter.dataToggle = 'buttons'
				divCard.appendChild(divFooter)

				// Label
				let label = document.createElement('label')
				label.id = 'labelText'
				label.className = 'btn btn-primary'
				divFooter.appendChild(label)

				// Input
				let input = document.createElement('input')
				input.type = 'radio'
				input.className = 'selectAulas'
				input.name = 'selectAulas'
				input.value = dadosAulas[i]['id_video']
				input.required = true
				label.appendChild(input)

				// Div texto
				let divText = document.createElement('div')
				divText.id = 'divText'
				label.appendChild(divText)
				let inputText = document.createTextNode('Selecionar')
				divText.appendChild(inputText)

				// Div mãe
				let div = document.getElementById('aulas')
				div.appendChild(divCard)
			}
		}
	}
	
	// Carrega os vídeos da primeira categoria
	createAulas(<?= $flag ?>);

	$('#FormCat').on('change', function() {
		// Remove todos os child
		var elemento = document.getElementById('aulas');
		while (elemento.firstChild) {
			elemento.removeChild(elemento.firstChild);
		}
		// Insere novas vídeo aulas com a categoria selecionada
		createAulas(this.value)
	});


	var backup = false; // Backup do element que foi alterado
	$('.selectAulas').on('click', function(element) {
		let aux = element.target // Pega o input que foi selecionado
		let auxTexto = element.target.nextSibling // Pega o texto dentro do input que foi selecionado

		if (backup) { // Caso tiver algum input, volta os valores para o padrão
			backup.innerHTML = 'Selecionar'
			backup.parentElement.className = 'btn btn-primary'
		}
		backup = aux.nextSibling // Armazena o novo input selecionado

		// Altera os valores do inputs selecionado
		aux.nextSibling.innerHTML =  'Selecionado'
		aux.parentElement.className =  'btn btn-dark'
	})
</script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

