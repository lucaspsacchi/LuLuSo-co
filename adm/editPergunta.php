<?php 
  session_start();
  include('../connection/conn.php');
  include('../model/scriptEditPergunta.php');
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/gerenciamento.css">
		<link rel="stylesheet" href="../css/navfooter.css">
		<link rel="stylesheet" href="../css/adm.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <center><h3>Editar pergunta</h3></center>
        </div>
        <div class="form-group" style="margin-top: 20px;">
          <labeL style="color:red; font-size: 14px;">* Campos obrigatórios</label>
          <hr style="margin-top: 5px;">
        </div>	      
        <div class="form-group">
          <label for="FormModelo">Modelo da pergunta<span style="color:red;">*</span></label>
          <select class="form-control" id="FormMod" name="mod" required>
            <option value="0" <?=($mod == 0) ? 'selected="selected"' : '' ?>>Alternativa</option>
            <option value="1" <?=($mod == 1) ? 'selected="selected"' : '' ?>>Sequência</option>
            <option value="2" <?=($mod == 2) ? 'selected="selected"' : '' ?>>Toque nos Pares</option>
          </select>
        </div>
        <div class="form-group">
          <label for="FormPergunta">Pergunta<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="pergunta" name="pergunta" value="<?=$row['pergunta']?>" required>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="FormAlternativas">Alternativas da pergunta<span style="color:red;">*</span></label>
            <div class="d-flex justify-content-start flex-wrap" id="alternativas"></div>
          </div>    
        </div>

        <div id="correta" class="form-group">
        </div>

        <div class="form-group d-flex justify-content-between">
          <a class="btn btn-secondary" href="perguntas.php?id=<?=$row['id_video']?>&nome=<?=$row['pergunta']?>">Voltar</a>
          <input class="btn btn-success" type="submit" name="editar_dados" value="Salvar">
        </div>
      </form>
		</div>
	</body>
</html>


<script src="../js/scriptEditPerguntas.js"></script>

<!-- Import das bibliotecas js do Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
  dados = <?= json_encode($dados) ?>;
  console.log(dados);
	// Carrega as alternativas do primeiro modelo
  createAlt(<?=$mod?>, dados)
  
  // Tratamento das imagens
// jQuery.noConflict();
// jQuery(document).ready(function (e) {
$(document).ready(function (e) {
  // Function to preview image after validation
  $(function () {
      $("#file0").change(function () {
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
      $('#photo0').attr('width', '180px');
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
      $('#photo1').attr('width', '180px');
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
      $('#photo2').attr('width', '180px');
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
      $('#photo3').attr('width', '180px');
      $('#photo3').attr('height', '180px');
  }
});
</script>