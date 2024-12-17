<?php

$sql_cuestionarios = "SELECT * FROM encuesta WHERE idCuestionario = '$codigo_encu'";
$query_cuestionarios = $pdo->prepare($sql_cuestionarios);
$query_cuestionarios->execute();
$datos_cuestionarios = $query_cuestionarios->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_cuestionarios as $datos_cuestionario){
    $codigo_cuestionario = $datos_cuestionario['idCuestionario'];
    $nombre_cuestionario = $datos_cuestionario['nombre'];
    $fechainicio_cuestionario = $datos_cuestionario['fechaInicio'];
    $fechafin_cuestionario = $datos_cuestionario['fechaFin'];
}

?>