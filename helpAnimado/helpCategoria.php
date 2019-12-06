<?php
  if (isset($_SESSION['alertPrimeiroLogin']) && $_SESSION['alertPrimeiroLogin'] == 2) { ?>
    <script>
      Swal.fire({
        position: 'bottom-start',
        imageUrl: 'img/vovoDir.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help2',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3e9b8a',
        allowOutsideClick: false,
        text: 'Depois de escolher o tema, clique no vídeo que deseja assistir!'
      })
    </script>
  <?php
    //Ativa a segunda flag
    $_SESSION['alertPrimeiroLogin'] = 3;
  }
?>

<?php
  if (isset($_SESSION['alertPrimeiroLogin']) && $_SESSION['alertPrimeiroLogin'] == 4) { ?>
    <script>
      Swal.fire({
        position: 'middle',
        imageUrl: 'img/vovoEsq.png',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Help4',
        confirmButtonText: 'Avançar',
        confirmButtonColor: '#3e9b8a',
        allowOutsideClick: false,
        text: 'Para ver o seu progresso, clique em "MENU" e depois em "MINHA CONTA"!'
      }).then((result => {
          Swal.fire({
          position: 'middle',
          imageUrl: 'img/vovoEsq.png',
          imageWidth: 150,
          imageHeight: 150,
          imageAlt: 'Help5',
          confirmButtonText: 'OK',
          confirmButtonColor: '#3e9b8a',
          allowOutsideClick: false,
          text: 'Para rever essas mensagens, clique em "MENU" e depois em "COMO USAR ESTE APP"!'
        })
      }))
    </script>
  <?php
    //Ativa a segunda flag
    unset($_SESSION['alertPrimeiroLogin']);
  }
?>

<!-- Alerts -->
<?php
if (isset($alertSubiuNivel) && $alertSubiuNivel != 0 && $alertSubiuNivel != -1) { ?>
  <script>
    Swal.fire({
      title: 'Parabéns!',
      text: 'Você atingiu o Nível <?=$niveis[$alertSubiuNivel]?>!',
      imageUrl: 'img/<?=$alertSubiuNivel?>.png',
      imageWidth: 175,
      imageHeight: 175,
      imageAlt: '<?=$niveis[$alertSubiuNivel]?>',
      allowOutsideClick: false
    })
  </script>
	<?php
	$script = "UPDATE pessoa
						SET nivel_conhecimento = '".$alertSubiuNivel."'
						WHERE id =  '".$_SESSION['id_usuario']."';";
	mysqli_query($conn, $script);
}
?>