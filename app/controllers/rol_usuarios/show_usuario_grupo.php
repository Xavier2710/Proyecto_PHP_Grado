<?php

$sql_grupo_usuario = "SELECT 
    grupos.nombregrupo 
FROM 
    grupos
INNER JOIN 
    estudiante 
ON 
    grupos.idgrupos = estudiante.grupos_idgrupos
WHERE 
    estudiante.usuarios_idusuario = :codigo";

$query_grupo_usuario = $pdo->prepare($sql_grupo_usuario);
$query_grupo_usuario->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$query_grupo_usuario->execute();
$grupo_usuario = $query_grupo_usuario->fetch(PDO::FETCH_ASSOC);


$nom_grupo = $grupo_usuario['nombregrupo'];
?>
