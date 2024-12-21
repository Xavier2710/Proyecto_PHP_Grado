<?php

$sql_preguntas = "SELECT COUNT(pregunta) AS cantidad_preguntas FROM preguntas WHERE encuesta_idCuestionario = :idEncuesta";
$query_preguntas = $pdo->prepare($sql_preguntas);
$query_preguntas->bindParam(':idEncuesta', $codigo_encu, PDO::PARAM_INT);
$query_preguntas->execute();
$contador = $query_preguntas->fetch(PDO::FETCH_ASSOC);

$cantidad_preguntas = $contador['cantidad_preguntas'];

?>
