<?php 
  session_start();
  include('connection/conn.php');
  if(isset($_POST['inputusuario'])) {
    // Envia as credenciais para validar
    $usuario = addslashes($_POST['inputusuario']);
    $senhaMD5 = MD5(addslashes($_POST['inputsenha']));
    $script = "SELECT * 
              FROM pessoa 
              WHERE usuario = '".$usuario."' AND senha = '".$senhaMD5."';";
    $result = $conn->query($script);
    if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      if ($row->flag == 1) {
        header('Location: adm/gerenciador.php');
      }
      else {
        $_SESSION['id_usuario'] = $row->id;
        header('Location: home.php');
      }
    }
    else {
      echo "Usuário ou senha incorreto"; // Melhorar
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
		<link rel="shortcut icon" type="image/png" href="img/vovotecAba.png">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/login.css">
    <!-- Import pelo Google -->
    <!-- <meta name="google-signin-scope" content="lucaspsacchi12345@gmail.com"> -->
    <meta name="google-signin-client_id" content="486981728748-8rr6973meeigpi0eebphodlg0l5539hf.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	</head>
	<body>
  <!-- SDK do Facebook -->
  <script src="js/sdk-face.js"></script>

		<div class="col-12 col-md-12 col-sm-12">
			<div id="login" class="row row-custom d-flex justify-content-center align-content-center">
        <div class="card shadow">
          <div class="card-body">
            <form action="#" method="post">
              <div class="form-group">
                <span>Usuário <span style="color: red;">*</span></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="inputusuario" required>
              </div>
              <div class="form-group">
                <span>Senha <span style="color: red;">*</span></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="inputsenha" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-login">Entrar</button>
              </div>
              <hr>
              <div class="form-group form-custom">
                <!-- <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div> -->
                <fb:login-button 
                  scope="public_profile,email"
                  onlogin="checkLoginState();">
                </fb:login-button>                        
              </div>
              <div class="form-group form-custom">
                <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
              </div>
            </form>
          </div>
        </div>
			</div>
		</div>		
	</body>
</html>

<!-- SDK Google -->
<script>
  function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());
    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);
    window.location = "home.php"
  }
</script>


<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
