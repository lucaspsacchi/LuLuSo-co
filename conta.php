<?php
  session_start();
  include('connection/conn.php');
  include('verSession.php');
  include('niveisConhecimento.php');
  include('model/scriptConta.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navfooter.css">
    <link rel="stylesheet" href="css/conta.css">
</head>

<body>
  <!-- Navbar -->
  <?php 
    include('navbar.php'); 
    $row = $result->fetch_assoc();
    $dados['total'] = $row['total'];
    $dados['respondidas'] = $row['respondidas'];
    $dados['correto'] = (int) $row['correto'];
    $dados['incorreto'] = (int) $row['incorreto'];

    $rowConta = $resultConta->fetch_assoc();
  ?>
  <script>
    dados = <?= json_encode($dados) ?>
  </script>

  <!-- Categorias -->
  <div class="col-12 col-md-12 col-sm-12 row d-flex justify-content-center divExterna">
    <div class="col-12 col-md-12 col-lg-12">
      <h4 class="h4Title">Nível de Conhecimento</h4>
	  	<hr class="hrTitle">
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <center>
        <h4 id="h4Text"><?= $niveis[$rowConta['nc']] ?></h4>
        <img class="imgNivel" src="img/<?= $rowConta['nc'] ?>.png" alt="<?= $niveis[$rowConta['nc']] ?>">
        <h5 id="h4Text">Parabéns, você está no nível <?= $rowConta['nc'] ?> de <?= (count($niveis) - 1) ?>!</h5>
      </center>
    </div>


    <!-- Porcetagens -->
    <div class="col-12 col-md-12 col-lg-12 divMargem">
      <div class="apagarConta">
        <h4 class="h4Title">Progresso Geral</h4>
	  	  <hr class="hrTitle">
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <center>
        <h4 style="h4Title">Total de Questões Respondidas</h4>
        <div id="porc1" class="porc divInterna"></div>
      </center>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <center>
        <h4 style="h4Title">Total de Questões Corretas</h4>
        <div id="porc2" class="porc divInterna"></div>
      </center>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <center>
        <h4 style="h4Title">Total de Questões Incorretas</h4>
        <div id="porc3" class="porc divInterna"></div>
      </center>
    </div>

    <!-- <div class="col-12 col-md-12 col-lg-12 divMargem">
      <div class="apagarConta">
        <h4 class="h4Title">Configuração da Conta</h4>
	  	  <hr class="hrTitle">
        <div class="divButton">
          <button type="button" class="btn btn-danger btn-apagar" onclick="confApagar()">Apagar Conta</button>
        </div>
      </div>
    </div> -->
  </div>
<br>
</body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- ProgressBar.js -->
<script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.9.0/dist/progressbar.js"></script>
<script src="js/conta.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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