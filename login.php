<?php 
  session_start();
  include('connection/conn.php');
  if(isset($_POST['inputemail'])) {
    // Envia as credenciais para validar
    $email = addslashes($_POST['inputemail']);
    $senhaMD5 = MD5(addslashes($_POST['inputsenha']));
    $script = "SELECT * 
              FROM pessoa 
              WHERE email = '".$email."' AND senha = '".$senhaMD5."';";
    $result = $conn->query($script);
    if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      $_SESSION['id_usuario'] = $row->id;
      if ($row->flag == 1) {
        header('Location: adm/home.php');
      }
      else {
        header('Location: home.php');
      }
    }
    else {
      header('Location: login.php?validacao=1');
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
		<link rel="shortcut icon" type="image/png" href="img/vovoTecAba.png">		
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css"> 
	</head>
	<body>
		<div class="col-12 col-md-12 col-sm-12">
			<div id="login" class="login">
        <div id="card" class="card shadow row row-custom">
          <div id="card-body"  class="card-body">
            <nav class="navbar nav-login" style="width:100%; height: 0px;">
              <div id="nav-item" class="d-flex justify-content-start nav-dir">
                <div id="hide" class="">
                  <h4 class="nav-text">Entrar na Conta</h4>
                </div>
              </div>

              <div id="hide" class="d-flex justify-content-end nav-esq">
                <div class="logo">
                  <img class="img-responsive" src="img/vovoTecLogo.png">
                </div>								
              </div>														
            </nav>
                        
            <form action="#" method="post">
              <!-- Faceboox e Google -->
              <div class="form-group">
                <center>
                  <span class="span-login">Entre com</span>
                </center>
              </div>
              <div class="form-group">
                <span class="span-login">Email</span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="inputemail" required>
              </div>
              <div class="form-group">
                <span class="span-login">Senha</span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="inputsenha" required>
              </div>
              <div class="form-group" style="margin-top: 30px;">
                <button type="submit" class="btn btn-success btn-login">Entrar</button>
              </div>
              <hr style="margin: 20px 30px;">
              <div class="form-group">
                <center>
                  <span class="span-login" style="">Não possui conta? </span>&nbsp&nbsp
                  <a class="btn btn-outline-success" href="cadastrar.php">Cadastre-se</a>
                </center>
              </div>
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
if (isset($_GET['cadastro']) && $_GET['cadastro'] == 1) {?>
  <script>
    Swal.fire({
      title: 'Conta cadastrada com sucesso!',
      icon: 'success',
      confirmButtonColor: '#3e9b8a'
    })
  </script>
<?php
} 
if (isset($_GET['validacao']) && $_GET['validacao'] == 1) {?>
  <script>
    Swal.fire({
      title: 'Usuário ou senha incorretos!',
      icon: 'error',
      confirmButtonColor: '#3e9b8a'
    })
  </script>
<?php
} 	
?>



<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
