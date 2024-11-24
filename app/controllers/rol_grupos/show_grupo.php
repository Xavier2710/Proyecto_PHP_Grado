<?php

$sql_grupos = "SELECT * FROM grupos";
$query_grupos = $pdo->prepare($sql_grupos);
$query_grupos->execute();
$grupos = $query_grupos->fetchAll(PDO::FETCH_ASSOC);

?>