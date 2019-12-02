<?php
// Pega os valores passados por url
  $mod = (isset($_GET['mod'])) ? $_GET['mod'] : NULL;
  $pergunta = (isset($_GET['pergunta'])) ? $_GET['pergunta'] : NULL;
  $cat = (isset($_GET['cat'])) ? $_GET['cat'] : NULL;
  $selectAulas = (isset($_GET['selectAulas'])) ? $_GET['selectAulas'] : NULL;
  
  if ($mod == 0) { // Alternativa
    $file0 = $_GET['file0'];
    $file1 = $_GET['file1'];
    $file2 = $_GET['file2'];
    $file3 = $_GET['file3'];
    $cor = $_GET['cor'];
  }
  else if ($mod == 1) { // Sequência
    $count = 2;
    $alternativa0 = $_GET['alternativa0'];
    $alternativa1 = $_GET['alternativa1'];
    $alternativa2 = ($_GET['alternativa2'] != '') ? $_GET['alternativa2'] : NULL;
    $alternativa3 = ($_GET['alternativa3'] != '') ? $_GET['alternativa3'] : NULL;
    $alternativa4 = ($_GET['alternativa4'] != '') ? $_GET['alternativa4'] : NULL;
    $count = ($alternativa2 != NULL) ? $count + 1 : $count;
    $count = ($alternativa3 != NULL) ? $count + 1 : $count;
    $count = ($alternativa4 != NULL) ? $count + 1 : $count;
  }
  else { // Toque nos Pares
    $count = 3;
    $alternativa0 = $_GET['alternativa0'];
    $alternativa1 = $_GET['alternativa1'];
    $alternativa2 = $_GET['alternativa2'];
    $alternativa3 = $_GET['alternativa3'];
    $alternativa4 = ($_GET['alternativa4'] != '') ? $_GET['alternativa4'] : NULL;
    $alternativa5 = ($_GET['alternativa5'] != '') ? $_GET['alternativa5'] : NULL;
    $count = ($alternativa3 != NULL) ? $count + 1 : $count;
    $count = ($alternativa4 != NULL) ? $count + 1 : $count;
  }
?>