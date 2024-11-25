<?php

$sql_usuarios = "SELECT * FROM usuarios";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>