<?php 
  include('../connection/conn.php');
  include('../model/scriptAdmPreview.php');
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
		<!-- <link rel="stylesheet" href="../css/gerenciamento.css"> -->
		<link rel="stylesheet" href="../css/navfooter.css">
		<link rel="stylesheet" href="../css/adm.css">
		<link rel="stylesheet" href="../css/preview.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<div class="col-12 col-md-12 col-sm-12">
				<form action="#" method="GET" enctype="multipart/form-data">
					<div class="form-group">
						<center><h3>Cadastro de Pergunta: Preview</h3></center>
					</div>	
          <div class="form-group">
            <div class="d-flex justify-content-center">
              <div id="quiz" class="card shadow">
                <?php
                if ($mod == 0) { // Alternativa ?>


              <?php }
                else if ($mod == 1) { // Sequência ?>
                  <div class="enum">
                    <h4><?= $pergunta ?></h4>
                  </div>
                  <div class="espaco"> <!-- Campo que vai subir as alternativas -->
                    <?php
                    for ($i = 0; $i < $count; $i++) {
                      ?>
                      <button id="esp<?= $i ?>" type="button" class="alternativa btn btn-custom btn-custom-question btn-outline-secondary btn-esp"></button>
                      <?php
                    }
                    ?>
                  </div>
                  <hr>
                  <div class="alternativas"> <!-- Campo das alternativas -->
                    <?php
                    $arr = [$alternativa0, $alternativa1, $alternativa2, $alternativa3, $alternativa4];
                    for ($i = 0; $i < $count; $i++) {
                      ?>
                      <div class="row row-alternativas">
                        <button id="alt<?= $i ?>" name="alt<?= $i ?>" type="button" class="alternativa btn btn-outline-primary btn-custom btn-custom-question btn-alternativa"><?= $arr[$i] ?></button>
                      </div>
                      <?php
                    }
                    ?>                    
                  </div>
                  <button class="confirma btn btn-custom btn-outline-secondary" disabled>Confirmar</button>
                <?php }
                else { // Toque nos pares ?>


                <?php }
                ?>
              </div>
            </div>
          </div>
					
					<div class="form-group d-flex justify-content-between">
            <a class="btn btn-secondary" href="cadPergunta2.php">Voltar</a>
            <button type="submit" class="btn btn-success" name="salvar_dados">Continuar</buttonn>
					</div>
				</form>
			</div>
		</div>
		<br>
	</body>
</html>

<script>

</script>

<!-- Import das bibliotecas js do Bootstrap -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

