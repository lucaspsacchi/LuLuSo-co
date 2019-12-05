<?php
include('connection/conn.php');

if (isset($_POST['salvar_dados'])) {
	$email = $_POST['email'];
	$senha1 = MD5(addslashes($_POST['senha1']));
	$senha2 = MD5(addslashes($_POST['senha2']));

	if ($senha1 != $senha2) {
		header('Location: cadastrar.php?senha=1');
	}

	// Verificar se já existe aquele usuário no bd
	$script = "SELECT * FROM pessoa WHERE email = '".$email."'";
	$result = mysqli_query($conn, $script);

	if ($result->num_rows == 0) { // Insere o novo usuário
		$_SESSION['alert'] = 1;
		$script = "INSERT INTO pessoa (email, senha, flag, flag_perguntas, flag_login, nivel_conhecimento)
		VALUES ('".$email."', '".$senha1."', '0', '0', '1', '0')";
		mysqli_query($conn, $script);
		header('Location: login.php?cadastro=1');
	}
	else { // Já existe o usuário
		header('Location: cadastrar.php?usuario=1');
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
	<link rel="shortcut icon" type="image/png" href="./img/vovoTecAba.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">			
	<link rel="stylesheet" href="css/login.css">
</head>


<body>
		<div class="col-12 col-md-12 col-sm-12">	
			<div id="login" class="login">
        <div id="card" class="card shadow row row-custom">
          <div id="card-body" class="card-body">
						<nav class="navbar nav-login" style="width:100%;">
							<div id="nav-item" class="d-flex justify-content-start nav-dir">
								<a href="login.php"	style="color: white;">
									<i class="material-icons">arrow_back</i>
								</a>
								<div id="hide" class="">
									<h4 class="nav-text">Cadastrar</h4>
								</div>
							</div>

							<div id="hide" class="d-flex justify-content-end nav-esq">
								<div class="logo">
									<img class="img-responsive" src="img/vovoTecLogo.png">
								</div>								
							</div>														
						</nav>

						<form action="#" method="POST" enctype="multipart/form-data" oninput='senha2.setCustomValidity(senha2.value != senha1.value ? "Senhas estão diferentes" : "")'>
							<div class="form-group">
								<span class="span-login">Email</span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="email" id="email" required>
							</div>		
							<div class="form-group">
								<span class="span-login">Senha</span>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" minlength="5" name="senha1" id="senha1" required>
							</div>		
							<div class="form-group">
								<span class="span-login">Repita a Senha</span>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" minlength="5" name="senha2" id="senha2" required>
							</div>			
							<div class="form-group" style="margin-top: 30px;">
								<button class="btn btn-success btn-login" name="salvar_dados">Salvar</button>
							</div>
							<!-- <hr>
							<div class="form-group d-flex justify-content-center">
								<span>Voltar para </span><a href="login.php">Entrar</a>
							</div> -->
						</form>               
				</div> 
			</div>
		</div>
	</div>
</body>
</html>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<?php
if (isset($_GET['usuario']) && $_GET['usuario'] == 1) {?>
	<script>
		document.addEventListener("DOMContentLoaded", function(event) {
			Swal.fire({
				title: 'Email já cadastrado!',
				icon: 'error',
				confirmButtonColor: '#3e9b8a'
			})
		});
	</script>
<?php
} 
if (isset($_GET['senha']) && $_GET['senha'] == 1) {?>
	<script>
		Swal.fire({
			title: 'Senhas diferentes!',
			text: 'Insira novamente os dados',
			icon: 'error',
			confirmButtonColor: '#3e9b8a'
		})
	</script>
<?php
} 	
?>


<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>