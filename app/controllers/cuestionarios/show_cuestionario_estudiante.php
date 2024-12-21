<?php

$sql_cuestionarios = "SELECT e.idCuestionario, e.nombre, e.fechaInicio, e.fechaFin, e.promedioPonderado, e.idusuario
FROM encuesta e
INNER JOIN encuesta_grupos eg ON e.idCuestionario = eg.idCuestionario
INNER JOIN estudiante es ON es.grupos_idgrupos = eg.idgrupos
WHERE es.grupos_idgrupos = $codigo_grupo";
$query_cuestionarios = $pdo->prepare($sql_cuestionarios);
$query_cuestionarios->execute();
$cuestionarios = $query_cuestionarios->fetchAll(PDO::FETCH_ASSOC);

?>