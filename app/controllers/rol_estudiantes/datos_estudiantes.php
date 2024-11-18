<?php

$sql_estudiantes = "SELECT * FROM estudiante WHERE codigo = '$codigo'";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$datos_estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_estudiantes as $datos_estudiante){
    $codigo_estudiante = $datos_estudiante['codigo'];
    $nombre_estudiante = $datos_estudiante['nombreCompleto'];
    $fecha_estudiante = $datos_estudiante['fechaN'];
    $correo_estudiante = $datos_estudiante['correo'];
    $programa_estudiante = $datos_estudiante['Programa_idPrograma'];
    $escolar_estudiante = $datos_estudiante['procedenciaEscolar'];
    $genero_estudiante = $datos_estudiante['genero'];

}

?>