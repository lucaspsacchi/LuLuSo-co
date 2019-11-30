<?php 
  include('../connection/conn.php');
  include('../model/scriptAdmCadPerguntas.php');
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/gerenciamento.css">
		<link rel="stylesheet" href="../css/navfooter.css">
		<link rel="stylesheet" href="../css/adm.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
      <form action="cadPergunta2.php" method="POST" enctype="multipart/form-data">
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
              <input type="text" class="form-control" id="pergunta" name="pergunta">
            </div>
          </div>
        </div>
        
        <hr>

        <div class="col-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="FormAlternativas">Preencha as alternativas</label>
            <div class="d-flex justify-content-start flex-wrap" id="alternativas"></div>
          </div>    
        </div>

        <!-- Inputs da tela anterior -->
        <input type="hidden" id="id_cat" name="id_cat" value="<?= $_POST['cat'] ?>">
        <input type="hidden" id="id_video" name="id_video" value="<?= $_POST['selectAulas'] ?>">

        <!-- FALTA PREVIEW -->


        
        <div class="d-flex justify-content-end">
          <button class="btn btn-secondary" name="salvar_dados">Salvar</button>
        </div>
      </form>
		</div>
	</body>
</html>

<script src="../js/scriptAdmPerguntas2.js"></script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	// Carrega as alternativas do primeiro modelo
  createAlt(0)
  
  // Tratamento das imagens
jQuery.noConflict();
jQuery(document).ready(function (e) {
  // Function to preview image after validation
  $(function () {
      $("#file0").change(function () {
        console.log('um')
          var file = this.files[0];
          var imagefile = file.type;
          var match = ["image/jpeg", "image/png", "image/jpg"];
          if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
          {
              $('#photo0').attr('src', 'noimage.png');
              $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
              return false;
          }
          else
          {
              var reader = new FileReader();
              reader.onload = imageIsLoaded;
              reader.readAsDataURL(this.files[0]);
          }
      });
  });
  function imageIsLoaded(e) {
      $('#photo0').attr('src', e.target.result);
      $('#photo0').attr('width', '320px');
      $('#photo0').attr('height', '180px');
  }
});

$(document).ready(function (e) {
  // Function to preview image after validation
  $(function () {
      $("#file1").change(function () {
          var file = this.files[0];
          var imagefile = file.type;
          var match = ["image/jpeg", "image/png", "image/jpg"];
          if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
          {
              $('#photo1').attr('src', 'noimage.png');
              $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
              return false;
          }
          else
          {
              var reader = new FileReader();
              reader.onload = imageIsLoaded;
              reader.readAsDataURL(this.files[0]);
          }
      });
  });
  function imageIsLoaded(e) {
      $('#photo1').attr('src', e.target.result);
      $('#photo1').attr('width', '320px');
      $('#photo1').attr('height', '180px');
  }
});

$(document).ready(function (e) {
  // Function to preview image after validation
  $(function () {
      $("#file2").change(function () {
          var file = this.files[0];
          var imagefile = file.type;
          var match = ["image/jpeg", "image/png", "image/jpg"];
          if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
          {
              $('#photo2').attr('src', 'noimage.png');
              $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
              return false;
          }
          else
          {
              var reader = new FileReader();
              reader.onload = imageIsLoaded;
              reader.readAsDataURL(this.files[0]);
          }
      });
  });
  function imageIsLoaded(e) {
      $('#photo2').attr('src', e.target.result);
      $('#photo2').attr('width', '320px');
      $('#photo2').attr('height', '180px');
  }
});

$(document).ready(function (e) {
  // Function to preview image after validation
  $(function () {
      $("#file3").change(function () {
          var file = this.files[0];
          var imagefile = file.type;
          var match = ["image/jpeg", "image/png", "image/jpg"];
          if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
          {
              $('#photo3').attr('src', 'noimage.png');
              $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
              return false;
          }
          else
          {
              var reader = new FileReader();
              reader.onload = imageIsLoaded;
              reader.readAsDataURL(this.files[0]);
          }
      });
  });
  function imageIsLoaded(e) {
      $('#photo3').attr('src', e.target.result);
      $('#photo3').attr('width', '320px');
      $('#photo3').attr('height', '180px');
  }
});
</script>