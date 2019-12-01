<?php
    session_start();
    include('connection/conn.php');
    include('verSession.php');
    include('model/scriptQuestoes.php');
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
        <link rel="stylesheet" type="text/css" href="css/modelos.css">
        <link rel="stylesheet" type="text/css" href="css/navfooter.css">
    </head>
    <body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

      <div class="col-12 col-sm-12">
          <div id="player" class="video d-flex justify-content-center"></div>
      </div>
      <div class="col-12 col-sm-12">
          <div id='quiz' class="question shadow h-100 justify-content-center align-items-center p-4 d-none">
              <div id='conteudo' class="block justify-content-center">
                  <?php 
                    if ($dados[0]) {?>
                        <h4>Vamos praticar o que você aprendeu?</h4>
                        <div class="d-flex justify-content-center">
                            <img class="vovoQuiz" src="img/vovoResponda.png" alt="vovoResponda">
                        </div>
                        <div class="d-flex justify-content-end">
                        <button id="botao" class="btn btn-site mt-4 font-weight-bold" onclick="mountQuiz()">Vamos</button>
                    <?php
                    }
                    else { ?>
                        <h4>Parabéns, você já acertou todas as questões desse vídeo!</h4>
                        <div class="d-flex justify-content-center">
                            <img class="vovoQuiz" src="img/vovoRespondida.png" alt="vovoRespondida">
                        </div>         
                    <?php
                    }
                  ?>
                  </div>
              </div>
          </div>
      </div>
	</body>
</html>
<!-- Converte os dados recebidos do bd para json em js -->
<script>
    dados = <?= json_encode($dados) ?> 
    url_redirecionamento = 'categoria.php?cat=' + <?= $_SESSION['ultima_cat'] ?> + '&id_video='
    
    function submitPergunta() {
        return false;
    }
</script>

<!-- Import dos scripts js para as alternativas -->
<script type="text/javascript" src="js/scriptAlternativa.js"></script>
<script type="text/javascript" src="js/scriptSequencia.js"></script>
<script type="text/javascript" src="js/scriptToquePares.js"></script>
<script type="text/javascript" src="js/scriptQuestoes.js"></script>
<script type="text/javascript" src="js/scriptVideo.js"></script>

<!-- Help Animado -->
<script>
    function alertVideo() {
        <?php include('helpAnimado/helpVideo.php'); ?>
    }
</script>

<!-- Import do sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>