<?php

$sql_preguntas = "SELECT * FROM preguntas";
$query_preguntas = $pdo->prepare($sql_preguntas);
$query_preguntas->execute();
$preguntas = $query_preguntas->fetchAll(PDO::FETCH_ASSOC);

?>