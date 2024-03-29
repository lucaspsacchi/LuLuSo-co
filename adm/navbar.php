<nav class="navbar navbar-expand-lg navbar-light navbar-custom justify-content-between">
  <a class="navbar-brand" href="home.php">
    <div class="logo">
      <img class="img-responsive" src="../img/vovoTecLogo.png">
    </div>
  </a>
  <div class="">
    <button class="nav-link d-flex justify-content-start" onclick="confSair()">SAIR</button>
  </div>
</nav>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
function confSair() {
    Swal.fire({
        title: 'Deseja realmente sair?',
        imageUrl: '../img/warning.png',
        imageWidth: 125,
        imageHeight: 125,
        imageAlt: 'Perigo',
        showCancelButton: true,
        confirmButtonText: 'Sair',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3e9b8a',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            window.location.href = '../sair.php'
        }
    })
}
</script>