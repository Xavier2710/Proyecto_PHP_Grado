<?php

$sql_estudiantes = "SELECT * FROM estudiante WHERE codigo = '$codigo'";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$datos_estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_estudiantes as $datos_estudiante){
    $codigo_estudiante = $datos_estudiante['codigo'];
    $grupo_estudiante = $datos_estudiante['grupos_idgrupos'];
}
?>