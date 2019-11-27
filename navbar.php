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
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: none; outline: none;">
        <span style="color: white;">MENU</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: 5px;">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link na hv" href="home.php">INÍCIO</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link hv" href="home.php?help=1">COMO USAR ESTE APP</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="conta.php">MINHA CONTA</a>
            </li>
            <div class="dropdown-divider"></div>
        </ul>
        <ul class="navbar-nav mr-auto" style="margin-right: 0px !important;">
            <li class="nav-item">
                <button class="nav-link" onclick="confSair()">SAIR</button>
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