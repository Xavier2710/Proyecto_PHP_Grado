<?php

$sql_literarias = "SELECT * FROM creaciones_literarias WHERE idliteraria = '$codigo_li'";
$query_literarias = $pdo->prepare($sql_literarias);
$query_literarias->execute();
$datos_literarias = $query_literarias->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_literarias as $datos_literaria){
    $codigo_literaria = $datos_literaria['idliteraria'];
    $nombre_literaria = $datos_literaria['nombre'];
    $autor_literaria = $datos_literaria['autor'];
    $archivo_literaria = $datos_literaria['archivo'];
    $fecha_literaria = $datos_literaria['fechaCargue'];
}

?>