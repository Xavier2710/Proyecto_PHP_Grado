<?php

$sql_usuarios = "SELECT * FROM usuarios WHERE idusuario = '$codigo'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_usuarios as $datos_usuario){
    $codigo_usuario = $datos_usuario['idusuario'];
    $nombre_usuario = $datos_usuario['nombreCompleto'];
    $correo_usuario = $datos_usuario['correo'];
    $clave_usuario = $datos_usuario['clave'];
    $rol_usuario = $datos_usuario['rol'];
}
?>