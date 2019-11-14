<?php
  $cat = $_GET['cat'];

  $sql = "SELECT va.id_video, va.id_cat, va.nome, (t1.correto / t1.total) AS porc
  FROM video_aula AS va JOIN
      (SELECT p.id_video, COUNT(p.id) AS total, SUM(CASE WHEN pp.flag = 1 AND pp.id_pessoa =  1 THEN 1 ELSE 0 END) AS correto
    FROM pergunta AS p LEFT JOIN pergunta_pessoa AS pp ON (p.id = pp.id_pergunta)
    WHERE p.id_cat = ?
    GROUP BY p.id_video) AS t1
  ON (va.id_video = t1.id_video)
  ORDER BY porc DESC
  ";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $cat);
  $stmt->execute();
  $result = $stmt->get_result();
?>