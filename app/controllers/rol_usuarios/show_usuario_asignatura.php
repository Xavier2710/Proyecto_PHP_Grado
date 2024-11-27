<?php

$sql_usuarios_asignatura = "SELECT 
    grupos.idgrupos,
    grupos.nombregrupo,
    grupos.periodo,
    grupos.año,
    asignaturas.nombre AS nombre_asignatura
FROM 
    grupos
INNER JOIN 
    asignaturas
ON 
    grupos.asignaturas_idasignaturas = asignaturas.idasignaturas;";
$query_usuarios_asignatura = $pdo->prepare($sql_usuarios_asignatura);
$query_usuarios_asignatura->execute();
$usuarios_asignatura = $query_usuarios_asignatura->fetchAll(PDO::FETCH_ASSOC);

?>