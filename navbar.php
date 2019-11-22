<?php
    $script = "SELECT id, nome
                FROM categoria
                ORDER BY nome ASC";
    $navbar = mysqli_query($conn, $script);
?>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <a class="navbar-brand" href="home.php">
        <div class="logo">
            <img class="img-responsive" src="img/vovoTecLogo.png">
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link na hv" href="home.php">INÍCIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link hv" href="#">COMO USAR ESTE APP<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    APRENDA SOBRE
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <?php
                    $i = 0;
                    while ($row = $navbar->fetch_assoc()) {
                        if ($i) {
                            echo '<div class="dropdown-divider"></div>';
                        }?>
                        <a class="dropdown-item" href="categoria.php?cat=<?=$row['id']?>"><?=$row['nome']?></a>
                        <?php
                        $i = $i + 1;
                    }
                ?>
                </div>
            </li>
        </ul>


        <!-- <form class="form-inline input-group my-2 my-lg-0 mb-3">
          <input class="form-control mr-sm-3" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-light" type="submit">Buscar</button>
          </div>
        </form>
        -->
        <ul class="navbar-nav mr-auto" style="margin-right: 0px !important;">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PERFIL
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="conta.php">Minha Conta</a>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" onclick="confSair()">Sair</button>
            </div>
            </li>
        </ul>



    </div>
</nav>

<script>
function confSair() {
    Swal.fire({
        title: 'Deseja realmente sair?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sair',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            window.location.href = 'sair.php'
        }
    })
}
</script>