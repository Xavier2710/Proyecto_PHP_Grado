<?php

$sql_literarias = "SELECT COUNT(*) as total FROM creaciones_literarias WHERE autor = :codigo_au";
$query_literarias = $pdo->prepare($sql_literarias);
$query_literarias->bindParam(':codigo_au', $codigo_au, PDO::PARAM_STR);
$query_literarias->execute();
$resultado = $query_literarias->fetch(PDO::FETCH_ASSOC);
$contador_creaciones_literarias = $resultado['total'];


?>