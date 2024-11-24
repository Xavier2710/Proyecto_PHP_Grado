<?php

$sql_asignaturas = "SELECT * FROM asignaturas WHERE idasignaturas = '$codigo'";
$query_asignaturas = $pdo->prepare($sql_asignaturas);
$query_asignaturas->execute();
$datos_asignaturas = $query_asignaturas->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_asignaturas as $datos_asignatura){
    $codigo_asignatura = $datos_asignatura['idasignaturas'];
    $nombre_asignatura = $datos_asignatura['nombre'];
}

?>