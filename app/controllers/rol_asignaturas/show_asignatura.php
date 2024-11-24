<?php

$sql_asignaturas = "SELECT * FROM asignaturas";
$query_asignaturas = $pdo->prepare($sql_asignaturas);
$query_asignaturas->execute();
$asignaturas = $query_asignaturas->fetchAll(PDO::FETCH_ASSOC);

?>