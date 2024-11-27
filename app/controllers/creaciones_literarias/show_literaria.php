<?php

$sql_literarias = "SELECT * FROM creaciones_literarias";
$query_literarias = $pdo->prepare($sql_literarias);
$query_literarias->execute();
$literarias = $query_literarias->fetchAll(PDO::FETCH_ASSOC);

?>