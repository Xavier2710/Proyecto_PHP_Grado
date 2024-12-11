<?php

$sql_universidades = "SELECT * FROM universidad";
$query_universidades = $pdo->prepare($sql_universidades);
$query_universidades->execute();
$universidades = $query_universidades->fetchAll(PDO::FETCH_ASSOC);


?>