<?php
  session_start();
  include('connection/conn.php');
  include('verSession.php');
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
    <style>
    #porc {
      width: 200px;
      height: 200px;
    }
    </style>
</head>

<body>
  <!-- Navbar -->
  <?php include('navbar.php'); ?>

  <!-- Categorias -->
  <div class="col-12 col-md-12 col-sm-12 row d-flex justify-content-center divExterna" style="width: 100%; padding: 0px; margin: 0px;">
    <div class="col-12 col-md-6 col-lg-4">
      <center>
        <div id="porc" class="porc divInterna"></div>
      </center>
    </div>
  </div>

    
    
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.9.0/dist/progressbar.js"></script>
    <script>
    var bar = new ProgressBar.Circle('#porc', {
      color: '#aaa',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 4,
      trailWidth: 4,
      easing: 'easeInOut',
      duration: 1400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#3e9b8a', width: 4 },
      to: { color: '#3e9b8a', width: 4 },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = Math.round(circle.value() * 100);
        if (value === 0) {
          circle.setText('0%');
        } else {
          circle.setText(value + '%');
        }

      }
    });
    bar.text.style.fontSize = '4rem';
    bar.animate(0.25);
    </script>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- ProgressBar.js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-progressbar/0.9.0/bootstrap-progressbar.min.js"></script> -->

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