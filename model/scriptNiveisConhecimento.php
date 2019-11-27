<?php 
  // Variáveis
  $novoNivel = 0;
  $alertSubiuNivel = -1;
  $alertDesceuNivel = -1;
  $alertPrimeiroLogin = -1;

  // Busca pela porcentagem
  // $scriptNivel = "SELECT ((t1.certas / t1.total) * 100) AS porc
  //           FROM 
  //             (SELECT COUNT(p.id) AS total, SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa = '".$_SESSION['id_usuario']."' THEN 1 ELSE 0 END) AS certas
  //             FROM `pergunta` AS p LEFT JOIN `pergunta_pessoa` AS pp ON (p.id = pp.id_pergunta)) AS t1;";
  $scriptNivel = "SELECT (SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa = '".$_SESSION['id_usuario']."' THEN 1 ELSE 0 END) / COUNT(p.id)) * 100 AS porc 
                  FROM `pergunta` AS p LEFT JOIN `pergunta_pessoa` AS pp ON (p.id = pp.id_pergunta)";

  $resultNivel = mysqli_query($conn, $scriptNivel);

  // Atribui a flag o níve atual
  $rowNivel = $resultNivel->fetch_assoc();
  if ($rowNivel['porc'] >= 5 && $rowNivel['porc'] < 25) { // Bulhufas
    $novoNivel = 1;
  }
  else if ($rowNivel['porc'] >= 25 && $rowNivel['porc'] < 50) { // Xexelento
    $novoNivel = 2;
  }
  else if ($rowNivel['porc'] >= 50 && $rowNivel['porc'] < 75) { // Saliente
    $novoNivel = 3;
  }
  else if ($rowNivel['porc'] >= 75 && $rowNivel['porc'] < 100) { // Serelepe
    $novoNivel = 4;
  }
  else if ($rowNivel['porc'] == 100) { // Supimpa
    $novoNivel = 5;
  }
  else { // Sem nível
    $novoNivel = 0;
  }

  // Busca pelo nivel de conhecimento da pessoa
  $scriptPessoa = "SELECT nivel_conhecimento AS nivel, flag_perguntas, flag_login
            FROM pessoa
            WHERE id = " . $_SESSION['id_usuario'];
  $resultPessoa = mysqli_query($conn, $scriptPessoa);

  // Compara o nivel atual com o calculado para ver se teve algum aumento ou redução de nível
  $rowPessoa = $resultPessoa->fetch_assoc();
  if ($novoNivel > $rowPessoa['nivel']) {
    // Subiu de nível
    $alertSubiuNivel = $novoNivel;
  }
  else if ($novoNivel < $rowPessoa['nivel']) {
    // Caiu o nível
    $alertDesceuNivel = $novoNivel;
  }

  // Flag para perguntas novas no bd
  if ($rowPessoa['flag_perguntas']) {
    $alertNovasPerguntas = 1;
  }
  // Flag para primeiro login
  if ($rowPessoa['flag_login']) {
    $_SESSION['alertPrimeiroLogin'] = 1;
  }
?>