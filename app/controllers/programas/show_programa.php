<?php

$sql_programas = "SELECT * FROM programa";
$query_programas = $pdo->prepare($sql_programas);
$query_programas->execute();
$programas = $query_programas->fetchAll(PDO::FETCH_ASSOC);

?>