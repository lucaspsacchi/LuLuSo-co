<?php
  $id = $_SESSION['id_usuario'];

  $sql = "SELECT c.id, c.nome, c.img, t1.id_cat, t1.total, t1.correto, (t1.correto / t1.total) AS porc
  FROM categoria AS c JOIN
      (SELECT p.id_cat, COUNT(p.id) AS total, SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa = '".$id."' THEN 1 ELSE 0 END) AS correto
      FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
      GROUP BY p.id_cat) AS t1
  ON (c.id = t1.id_cat)
  ORDER BY porc ASC, c.nome";

  $result = mysqli_query($conn, $sql);
?>