<!-- Alerts -->
<?php
if (isset($alertNovasPerguntas) && $alertNovasPerguntas == 1 && $alertPrimeiroLogin == -1 && isset($alertDesceuNivel) && $alertDesceuNivel == -1) {
  // Exibe o alerta
  ?>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      Swal.fire({
        imageUrl: 'img/vovoNovas.png',
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: 'Perigo',
        confirmButtonColor: '#3e9b8a',
        text: 'Existem novas questões para serem respondidas!',
        allowOutsideClick: false
      })
     }); 
  </script>
	<?php
	$script = "UPDATE pessoa
						SET flag_perguntas = 0
						WHERE id =  '".$_SESSION['id_usuario']."';";
	mysqli_query($conn, $script);
}
else if (isset($alertNovasPerguntas) && $alertNovasPerguntas == 1 && $alertPrimeiroLogin == -1 && isset($alertDesceuNivel) && $alertDesceuNivel > 0) {
  ?>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      Swal.fire({
        imageUrl: 'img/vovoNovas.png',
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: 'Perigo',
        confirmButtonColor: '#3e9b8a',
        text: 'Existem novas questões para serem respondidas!',
        allowOutsideClick: false
      }).then((result) => {
        if (result.value) {
          Swal.fire({
          title: 'Que pena!',
          text: 'Você voltou para o Nivel <?=$niveis[$alertDesceuNivel]?>! Para subir de nível, responda às novas perguntas!',
          confirmButtonColor: '#3e9b8a',
          imageUrl: 'img/<?=$alertDesceuNivel?>_b.png',
          imageWidth: 175,
          imageHeight: 175,
          imageAlt: '<?=$niveis[$alertDesceuNivel]?>',
          allowOutsideClick: false          
        })
        }
      })
     }); 
  </script>
	<?php
	$script = "UPDATE pessoa
						SET flag_perguntas = 0
						WHERE id =  '".$_SESSION['id_usuario']."';";
  mysqli_query($conn, $script);

  $script = "UPDATE pessoa
  SET nivel_conhecimento = '".$alertDesceuNivel."'
  WHERE id =  '".$_SESSION['id_usuario']."';";
  mysqli_query($conn, $script);
}
?>