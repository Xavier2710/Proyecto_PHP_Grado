<?php

$sql_preguntas = "SELECT * FROM preguntas WHERE idPreguntas = '$codigo_pregunta'";
$query_preguntas = $pdo->prepare($sql_preguntas);
$query_preguntas->execute();
$datos_preguntas = $query_preguntas->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_preguntas as $datos_pregunta){
    $codigo_pregunta = $datos_pregunta['idPreguntas'];
    $codigo_encu = $datos_pregunta['encuesta_idCuestionario'];
    $dimension_pregunta = $datos_pregunta['dimensiones_iddimensiones'];
    $nombre_pregunta = $datos_pregunta['pregunta'];
}

?>