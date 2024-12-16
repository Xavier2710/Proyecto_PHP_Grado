<?php

$sql_literarias = "SELECT * FROM creaciones_literarias WHERE autor = :codigo_au";
$query_literarias = $pdo->prepare($sql_literarias);
$query_literarias->bindParam(':codigo_au', $codigo_au, PDO::PARAM_STR);
$query_literarias->execute();
$literarias = $query_literarias->fetchAll(PDO::FETCH_ASSOC);

?>