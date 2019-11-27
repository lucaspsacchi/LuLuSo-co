<?php 
  if (isset($_SESSION['alertPrimeiroLogin']) && $_SESSION['alertPrimeiroLogin'] == 3) { ?>
      Swal.fire({
        position: 'bottom-end',
        imageUrl: 'img/vovoEsq.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help3',
        confirmButtonText: 'Ok',
        text: 'Após ver o vídeo, responda às questões e acumule pontos!'
      })
  <?php
    //Ativa a segunda flag
    $_SESSION['alertPrimeiroLogin'] = 4;    
  }
?>
