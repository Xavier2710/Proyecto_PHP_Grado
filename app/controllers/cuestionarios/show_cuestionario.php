<?php

$sql_cuestionarios = "SELECT * FROM encuesta";
$query_cuestionarios = $pdo->prepare($sql_cuestionarios);
$query_cuestionarios->execute();
$cuestionarios = $query_cuestionarios->fetchAll(PDO::FETCH_ASSOC);

?>