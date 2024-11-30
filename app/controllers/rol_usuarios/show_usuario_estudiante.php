<?php

$sql_usuarios_estudiante = "SELECT 
    usuarios.idusuario,
    usuarios.nombreCompleto,
    usuarios.correo,
    usuarios.rol,
    estudiante.codigo,
    estudiante.fechaN,
    estudiante.procedenciaEscolar,
    estudiante.genero,
    estudiante.promedioPonderado,
    estudiante.repeticionAsignatura
FROM 
    usuarios
INNER JOIN 
    estudiante
ON 
    usuarios.idusuario = estudiante.usuarios_idusuario;";

$query_usuarios_estudiante = $pdo->prepare($sql_usuarios_estudiante);
$query_usuarios_estudiante->execute();
$usuarios_estudiante = $query_usuarios_estudiante->fetchAll(PDO::FETCH_ASSOC);

?>