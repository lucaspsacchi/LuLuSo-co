<?php
  $id = $_SESSION['id_usuario'];

  $sql = "SELECT t1.total, t1.correto, t1.respondidas, (t1.respondidas - t1.correto) AS incorreto
  FROM(
    SELECT COUNT(p.id) AS total, SUM(CASE WHEN pp.id_pessoa = '".$id."' THEN 1 ELSE 0 END) AS respondidas, SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa = '".$id."' THEN 1 ELSE 0 END) AS correto
    FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
  ) AS t1";

  $result = mysqli_query($conn, $sql);

  $sqlConta = "SELECT nivel_conhecimento AS nc
    FROM pessoa
    WHERE id = '".$id."'";
 
  $resultConta = mysqli_query($conn, $sqlConta);
?>