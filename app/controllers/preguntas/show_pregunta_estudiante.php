<?php

$sql_preguntas = "SELECT pregunta FROM preguntas WHERE encuesta_idCuestionario = :idEncuesta";
$query_preguntas = $pdo->prepare($sql_preguntas);
$query_preguntas->bindParam(':idEncuesta', $codigo_encu, PDO::PARAM_INT);
$query_preguntas->execute();
$preguntas = $query_preguntas->fetchAll(PDO::FETCH_ASSOC);


$opciones = [
    "Totalmente en desacuerdo",
    "En desacuerdo",
    "Parcialmente en desacuerdo",
    "Parcialmente de acuerdo",
    "De acuerdo",
    "Totalmente de acuerdo"
];
?>