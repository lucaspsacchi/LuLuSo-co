<?php
  if (isset($_SESSION['alertPrimeiroLogin']) && $_SESSION['alertPrimeiroLogin'] == 1) { ?>
    <script>
      Swal.fire({
        position: 'middle',
        imageUrl: 'img/vovoEsq.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help1',
        confirmButtonText: 'Avançar',
        confirmButtonColor: '#3e9b8a',
        allowOutsideClick: false,
        text: 'Para ver a lista de vídeos, clique em "MENU" e depois em "INÍCIO"!'
      }).then((result => {
        Swal.fire({
        position: 'bottom-start',
        imageUrl: 'img/vovoDir.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help2',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3e9b8a',
        allowOutsideClick: false,
        text: 'Veja a lista de temas e clique no tema desejado!'
      })
      }))
    </script>
  <?php
    //Ativa a segunda flag
    $_SESSION['alertPrimeiroLogin'] = 2;

    // Atualiza o bd
    $script = "UPDATE pessoa
    SET flag_login = 0
    WHERE id =  '".$_SESSION['id_usuario']."';";
    mysqli_query($conn, $script);  
  }
?>