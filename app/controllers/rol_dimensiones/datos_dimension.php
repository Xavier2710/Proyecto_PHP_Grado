<?php

$sql_dimensiones = "SELECT * FROM dimensiones WHERE iddimensiones = '$codigo'";
$query_dimensiones = $pdo->prepare($sql_dimensiones);
$query_dimensiones->execute();
$datos_dimensiones = $query_dimensiones->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_dimensiones as $datos_dimension){
    $codigo_dimension = $datos_dimension['iddimensiones'];
    $nombre_dimension = $datos_dimension['nombre'];
    $descripcion_dimension = $datos_dimension['descripcion'];
}

?>