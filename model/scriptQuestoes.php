<?php
  $id = $_GET['id'];

  $sql = "SELECT t1.id, t1.id_video, t1.id_cat, t1.modelo, t1.pergunta, ma.img1, ma.resposta1, ma.img2, ma.resposta2, ma.img3, ma.resposta3, ma.img4, ma.resposta4, ms.texto AS seq_texto, ms.posicao AS seq_posicao, mp.texto AS pares_texto, mp.resposta AS pares_resposta
    FROM
      (SELECT p.id, p.id_video, p.id_cat, p.modelo, p.pergunta
      FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
      WHERE p.id_video = ? AND (pp.flag = 0 OR pp.flag IS NULL)) AS t1
      LEFT JOIN modelo_alternativa AS ma
          ON (ma.id_pergunta = t1.id)
      LEFT JOIN modelo_sequencia AS ms
          ON (ms.id_pergunta = t1.id)
      LEFT JOIN modelo_pares AS mp
          ON (mp.id_pergunta = t1.id)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();

  // $dados['questoes'] = [['2']];
  // array_push($dados['questoes'], ['3']);
  // print_r($dados);

  $dados['id_video'] = 0;

  while ($row = $result->fetch_assoc()) {
    // Cabeçalho
    if (!$dados['id_video']) {
      $dados['id_video'] = $row['id_video'];
      $dados['questoes'] = [];
    }

    // Corpo de cada questão
    if ($row['modelo'] == 'sequencia') {
      if (count($dados['questoes']['id_pergunta'] == $row['id'])) {
        $search = array_search($row['id'], $dados['questoes']['id_pergunta']); // Procura a posição da key na lista
      }
      else {
        $search = NULL;
      }
      // Se não existe aquela key (id_pergunta) na lista
      if (is_null($search)) {
        $aux['modelo'] = 'sequencia';
        $aux['pergunta'] = $row['pergunta'];
        $aux['id_pergunta'] = $row['id'];
        $aux['alternativas'] = [];
        // Adiciona a alternativa
        $aux_alternativa = array(
          'texto' => $row['seq_texto'],
          'posicao' => $row['seq_posicao']
        );
        $aux['alternativas'] = [$aux_alternativa];// Adiciona nova alternativa
        $dados['questoes'] += [$aux]; // Adiciona o cabeçalho com uma alternativa
      }
      else { // Caso exista, só adicionar o novo value na array
        echo 'entrou aqui';
        $aux_alternativa = array(
          'texto' => $row['seq_texto'],
          'posicao' => $row['seq_posicao']
        );
        echo 'posição encontrada: ' . $search;
        $dados['questoes'][$search] += [$aux_alternativa];
      }      
    }
    else if ($row['modelo'] == 'alternativa') {
      $aux['modelo'] = 'alternativa';
      $aux['pergunta'] = $row['pergunta'];
      $aux['id_pergunta'] = $row['id'];
      $aux['alternativas'] = [];
      // Alternativas

    }
    else {
      $aux['modelo'] = 'pares';
      $aux['pergunta'] = $row['pergunta'];
      $aux['id_pergunta'] = $row['id'];
      $aux['alternativas'] = [];
      // Alternativas
      
    }
  }
  print_r($dados);
  // Não posso esquecer
  // $aux = array(
  //   'id_video' => $row['id_video'],
    
  // );
?>