<?php
  session_start();
  include('connection/conn.php');
  include('verSession.php');
  include('model/scriptHome.php');
  include('niveisConhecimento.php');
  include('model/scriptNiveisConhecimento.php');
  // Flag do help animado
  if (isset($_GET['help']) && $_GET['help'] == 1) {
    $_SESSION['alertPrimeiroLogin'] = 1;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navfooter.css">
</head>

<body>
<!-- Navbar -->
<?php include('navbar.php'); ?>

<!-- Categorias -->
<div class="col-12 col-md-12 col-sm-12">
  <div id="categoria" class="row row-custom">
      <?php
      if ($result) {
        while ($categoria = $result->fetch_assoc()) {
          ?>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12" id="0">
            <a href=<?= 'categoria.php?cat='.$categoria['id_cat'] ?>>
              <div class="card card-custom shadow-sm">
                <div class="card-body card-body-custom">
                  <div class="row row-custom">
                    <div class="col-8 col-custom d-flex align-content-between flex-wrap">
                      <div class="row row-custom"><h2><?= $categoria['nome']?></h2></div>
                      <div class="row row-custom"><?= $categoria['correto'] ?> / <?= $categoria['total'] ?> Completado</div>
                    </div>
                  <div class="imagem col-4 col-custom d-flex justify-content-end align-items-center">
                    <img src=<?= 'img/'.$categoria['img'] ?>></div>
                  </div>
                  </div>
                  <div class="col-12 barra-progressao">
                    <div class="barra-progressao-feita" style="width: <?= ($categoria['porc'] * 100) . '%;' ?>"><p>a</p></div>
                  </div>
              </div>
            </a>
          </div>
        <?php
        }
      }
      ?>
  </div>
</div>
</body>
</html>
<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Help Animado -->
<?php include('helpAnimado/helpHome.php'); ?>


<!-- Alerts -->
<?php include('alertasHome.php'); ?>

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