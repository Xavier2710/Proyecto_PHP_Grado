<?php

$sql_programas = "SELECT * FROM programa WHERE idPrograma = '$codigo'";
$query_programas = $pdo->prepare($sql_programas);
$query_programas->execute();
$datos_programas = $query_programas->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_programas as $datos_programa){
    $codigo_programa = $datos_programa['idPrograma'];
    $nombre_programa = $datos_programa['nombre'];
    $universidad_programa = $datos_programa['Universidad_idUniversidad'];
}

?>