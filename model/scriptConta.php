<?php
  $id = $_SESSION['id_usuario'];

  $sql = "SELECT t1.id_cat, t1.total, t1.correto, t1.respondidas, (t1.respondidas - t1.correto) AS incorreto, (t1.correto / t1.total) AS porc
          FROM(
            SELECT p.id_cat, COUNT(p.id) AS total, COUNT(pp.id) AS respondidas, SUM(CASE WHEN pp.flag = 1  AND pp.id_pessoa = ? THEN 1 ELSE 0 END) AS correto
            FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
          ) AS t1";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();

  $sqlConta = "SELECT nivel_conhecimento AS nc
              FROM pessoa
              WHERE id = ?";

  $stmtConta = $conn->prepare($sqlConta);
  $stmtConta->bind_param('i', $id);
  $stmtConta->execute();
  $resultConta = $stmtConta->get_result();  
?>