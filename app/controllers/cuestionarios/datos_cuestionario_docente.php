<?php

$sql_cuestionarios = "SELECT COUNT(*) as total FROM encuesta WHERE idusuario = :codigo_au";
$query_cuestionarios = $pdo->prepare($sql_cuestionarios);
$query_cuestionarios->bindParam(':codigo_au', $codigo_au, PDO::PARAM_STR);
$query_cuestionarios->execute();
$resultado = $query_cuestionarios->fetch(PDO::FETCH_ASSOC);
$contador_cuestionarios = $resultado['total'];


?>