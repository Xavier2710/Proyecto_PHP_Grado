<?php

$sql_universidades = "SELECT * FROM universidad WHERE idUniversidad = '$codigo'";
$query_universidades = $pdo->prepare($sql_universidades);
$query_universidades->execute();
$datos_universidades = $query_universidades->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_universidades as $datos_universidad){
    $codigo_universidad = $datos_universidad['idUniversidad'];
    $nombre_universidad = $datos_universidad['nombre'];
    $pais_universidad = $datos_universidad['pais'];
}

?>