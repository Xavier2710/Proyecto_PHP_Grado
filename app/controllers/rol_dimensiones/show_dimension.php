<?php

$sql_dimensiones = "SELECT * FROM dimensiones";
$query_dimensiones = $pdo->prepare($sql_dimensiones);
$query_dimensiones->execute();
$dimensiones = $query_dimensiones->fetchAll(PDO::FETCH_ASSOC);

?>