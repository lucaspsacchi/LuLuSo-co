<?php 
  if (isset($_SESSION['alertPrimeiroLogin']) && $_SESSION['alertPrimeiroLogin'] == 3) { ?>
      Swal.fire({
        position: 'bottom-start',
        imageUrl: 'img/vovoDir.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help3',
        confirmButtonText: 'Ok',
        confirmButtonColor: '#3e9b8a',
        allowOutsideClick: false,
        text: 'Após ver o vídeo, responda às questões e suba de nível!'
      })
  <?php
    //Ativa a segunda flag
    $_SESSION['alertPrimeiroLogin'] = 4;    
  }
?>
