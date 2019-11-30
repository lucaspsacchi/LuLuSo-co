<?php
  $id = $_SESSION['id_usuario'];

  $sql = "  SELECT c.id, c.nome, c.img, t2.id_cat, t2.total, t2.correto, (t2.correto / t2.total) AS porc
            FROM
              categoria AS c
                JOIN
              (SELECT p.id_cat, COUNT(p.id) AS total, SUM(CASE WHEN t1.flag = 1 THEN 1 ELSE 0 END) AS correto
              FROM
                pergunta AS p
                  LEFT JOIN 
                (SELECT * FROM pergunta_pessoa WHERE id_pessoa = '".$id."') AS t1
                ON (p.id = t1.id_pergunta)
              GROUP BY p.id_cat) AS t2
              ON (c.id = t2.id_cat)
            ORDER BY porc ASC, c.nome";

  $result = mysqli_query($conn, $sql);
?>