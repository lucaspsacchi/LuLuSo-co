<?php 
  session_start();
  include('../connection/conn.php');
	include('../model/scriptAdmPerguntas.php');
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

				<h3>Pergunta: <?= $_GET['nome'] ?></h3>
				<hr>

				<div class="d-flex justify-content-start flex-wrap">
				<?php
				if ($result) {
					while ($row = $result->fetch_assoc()) { ?>
            <div class="card" id="card-perguntas">
              <div class="card-header">
                <h5 class="card-title" id="card-title-perguntas" style="margin-bottom: 0px;"><?= $row['pergunta'] ?></h5>
              </div>
              <div class="card-body d-flex justify-content-between">
                <h5> 
									Modelo: <?php 
									if ($row['modelo'] == 'sequencia') {
										echo 'Sequência';
									}
									else if ($row['modelo'] == 'alternativa') {
										echo 'Alternativa';
									}
									else {
										echo 'Toque nos Pares';
									}
                  ?>
                </h5>
								<div class="row row-home d-flex justify-content-around">
									<a href="editPergunta.php?id=<?=$row['id']?>" class="btn btn-dark" id="card-row-perg"><i class="material-icons icon">edit</i></a>
									<button onclick="alertar('<?= $row['id'] ?>')" class="btn btn-danger btn-danger-custom" id="card-row-perg"><i class="material-icons icon">delete</i></button>		
								</div>             
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
function alertar(del) {
	url = '../model/scriptAdmDeletar.php?del=1&id=' + del
	Swal.fire({
		title: 'Deseja excluir essa pergunta?',
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
</script>


<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

