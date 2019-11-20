<?php 
  // Variáveis
  $novoNivel = 0;
  $alertSubiuNivel = 0;
  $alertDesceuNivel = 0;

  // Busca pela porcentagem
  $scriptNivel = "SELECT ((t1.certas / t1.total) * 100) AS porc
            FROM 
              (SELECT COUNT(p.id) AS total, SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa = '".$_SESSION['id_usuario']."' THEN 1 ELSE 0 END) AS certas
              FROM `pergunta` AS p LEFT JOIN `pergunta_pessoa` AS pp ON (p.id = pp.id_pergunta)) AS t1;";

  $resultNivel = mysqli_query($conn, $scriptNivel);

  // Atribui a flag o níve atual
  $rowNivel = $resultNivel->fetch_assoc();
  if ($rowNivel['porc']) { // Pegar os níveis
    $novoNivel = 0;
  }
  // ...

  // Busca pelo nivel de conhecimento da pessoa
  $scriptPessoa = "SELECT nivel_conhecimento AS nivel
            FROM pessoa
            WHERE id = " . $_SESSION['id_usuario'];
  $resultPessoa = mysqli_query($conn, $scriptPessoa);

  // Compara o nivel atual com o calculado para ver se teve algum aumento ou redução de nível
  $rowPessoa = $resultPessoa->fetch_assoc();
  if ($novoNivel > $rowPessoa['nivel']) {
    // Subiu de nível
    $alertSubiuNivel = 1;
  }
  else if ($novoNivel < $rowPessoa['nivel']) {
    // Caiu o nível
    $alertDesceuNivel = 1;
  }
?>