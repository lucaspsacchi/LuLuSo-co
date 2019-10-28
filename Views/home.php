<?php
include('connection/conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>VovoTec</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="./img/vovoTecAba.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./Views/css/home.css">
    <link rel="stylesheet" href="./Views/css/navfooter.css">
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <a class="navbar-brand" href="home.html">
        <div class="logo">
            <img class="img-responsive" src="./Views/img/vovoTecLogo.png">
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link na" href="home.html">INÍCIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">COMO USAR ESTE APP?<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    APRENDA SOBRE...
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="categoria.html?cat=Facebook">Facebook</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="categoria.html?cat=WhatsApp">WhatsApp</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="categoria.html?cat=Instagram">Instagram</a>
                </div>
            </li>
        </ul>
    </div>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 nav-btn" type="submit">Buscar</button>
    </form>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            PERFIL
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Minha Conta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Sair</a>
          </div>
        </li>
    </ul>-->
</nav>
<div class="col-12 col-md-12 col-sm-12">
    <div id="categoria" class="row row-custom">
        <?php
        if ($categorias):
            foreach ($categorias as $categoria):
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12" id="0"><a href=<?= "categoria/$categoria->nome"?>>
                        <div class="card card-custom shadow-sm">
                            <div class="card-body card-body-custom">
                                <div class="row row-custom">
                                    <div class="col-8 col-custom d-flex align-content-between flex-wrap">
                                        <div class="row row-custom"><h2><?= $categoria->nome?></h2></div>
                                        <div class="row row-custom">10 / 10 Completado</div>
                                    </div>
                                    <div class="imagem col-4 col-custom d-flex justify-content-end align-items-center">
                                        <img src=<?= "./Views/img/$categoria->img" ?>></div>
                                </div>
                            </div>
                            <div class="col-12 barra-progressao">
                                <div class="barra-progressao-feita" style="width: 100%;"><p>a</p></div>
                            </div>
                        </div>
                    </a></div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</div>
</body>
</html>
<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="./Views/js/dadosHome.js"></script>
<script type="text/javascript" src="./Views/js/scriptHome.js"></script>
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
