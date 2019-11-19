<?php
  $id = $_GET['id'];


  $sql = "SELECT p.id, p.id_video, p.id_cat, p.modelo, p.pergunta
  FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
  WHERE p.id_video = ? AND (pp.flag = 0 OR pp.flag IS NULL)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  $dados = [];

  while ($row = $result->fetch_assoc()) {
    // Cria um novo id_video caso não existir
    if (!$dado['id_video']) {
      $dado['id_video'] = $row['id_video'];
      $dado['questoes'] = [];
    }

    if ($row['modelo'] == 'sequencia') {
      // Corpo de cada questão
      $aux['modelo'] = 'sequencia';
      $aux['pergunta'] = $row['pergunta'];
      $aux['id_pergunta'] = $row['id'];
      
      // Procura as alternativas da questão
      $sql = "SELECT texto, posicao
      FROM modelo_sequencia
      WHERE id_pergunta = ?";

      $stmt_seq = $conn->prepare($sql);
      $stmt_seq->bind_param('i', $row['id']);
      $stmt_seq->execute();
      $result_seq = $stmt_seq->get_result();

      $aux['alternativas'] = [];
      while ($row_seq = $result_seq->fetch_assoc()) {
        $aux_seq['texto'] = $row_seq['texto'];
        $aux_seq['posicao'] = $row_seq['posicao'];
        array_push($aux['alternativas'], $aux_seq);
      }
      array_push($dado['questoes'], $aux);
    }
    else if ($row['modelo'] == 'alternativa') {
      // Corpo de cada questão
      $aux['modelo'] = 'alternativa';
      $aux['pergunta'] = $row['pergunta'];
      $aux['id_pergunta'] = $row['id'];

      // Procura as alternativas da questão
      $sql = "SELECT img1, resposta1, img2, resposta2, img3, resposta3, img4, resposta4
      FROM modelo_alternativa
      WHERE id_pergunta = ?";

      $stmt_alt = $conn->prepare($sql);
      $stmt_alt->bind_param('i', $row['id']);
      $stmt_alt->execute();
      $result_alt = $stmt_alt->get_result();

      $aux['alternativas'] = [];
      $row_alt = $result_alt->fetch_assoc();

      $aux_alt['imagem'] = $row_alt['img1'];
      $aux_alt['resposta'] = $row_alt['resposta1'];
      array_push($aux['alternativas'], $aux_alt);
      
      $aux_alt['imagem'] = $row_alt['img2'];
      $aux_alt['resposta'] = $row_alt['resposta2'];
      array_push($aux['alternativas'], $aux_alt);

      $aux_alt['imagem'] = $row_alt['img3'];
      $aux_alt['resposta'] = $row_alt['resposta3'];
      array_push($aux['alternativas'], $aux_alt);

      $aux_alt['imagem'] = $row_alt['img4'];
      $aux_alt['resposta'] = $row_alt['resposta4'];
      array_push($aux['alternativas'], $aux_alt);

      array_push($dado['questoes'], $aux);
    }
    else {
     // Corpo de cada questão
     $aux['modelo'] = 'pares';
     $aux['pergunta'] = $row['pergunta'];
     $aux['id_pergunta'] = $row['id'];

      // Procura as alternativas da questão
      $sql = "SELECT texto, resposta
      FROM modelo_pares
      WHERE id_pergunta = ?";

      $stmt_pares = $conn->prepare($sql);
      $stmt_pares->bind_param('i', $row['id']);
      $stmt_pares->execute();
      $result_pares = $stmt_pares->get_result();

      $aux['alternativas'] = [];
      while ($row_pares = $result_pares->fetch_assoc()) {
        $aux_pares['texto'] = $row_pares['texto'];
        $aux_pares['resposta'] = $row_pares['resposta'];
        array_push($aux['alternativas'], $aux_pares);
      }
      array_push($dado['questoes'], $aux);
    }
  }
  array_push($dados, $dado);
?>