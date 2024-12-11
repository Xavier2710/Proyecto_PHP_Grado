<?php

$sql_grupos = "SELECT * FROM grupos WHERE idgrupos = '$codigo'";
$query_grupos = $pdo->prepare($sql_grupos);
$query_grupos->execute();
$datos_grupos = $query_grupos->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_grupos as $datos_grupo){
    $codigo_grupo = $datos_grupo['idgrupos'];
    $nombre_grupo = $datos_grupo['nombregrupo'];
    $periodo_grupo = $datos_grupo['periodo'];
    $ano_grupo = $datos_grupo['año'];
    $asignatura_grupo = $datos_grupo['asignaturas_idasignaturas'];
}

?>