<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];
$codigo_autor = $_POST['codigo_autor'];


$consultaArchivo = $pdo->prepare("SELECT archivo FROM creaciones_literarias WHERE idliteraria = :codigo_eliminar AND usuarios_idusuario = :codigo_autor");
$consultaArchivo->bindParam('codigo_eliminar', $codigo_eliminar);
$consultaArchivo->bindParam('codigo_autor', $codigo_autor);
$consultaArchivo->execute();


$nombre_archivo = $consultaArchivo->fetchColumn();
$ruta_archivo = "../../../database/creaciones_literarias/" . $nombre_archivo;


$sentencia = $pdo->prepare("DELETE FROM creaciones_literarias WHERE idliteraria=:codigo_eliminar AND usuarios_idusuario=:codigo_autor");

$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);
$sentencia->bindParam('codigo_autor', $codigo_autor);

if ($sentencia->execute()) {
    
    if ($nombre_archivo && file_exists($ruta_archivo)) {
        unlink($ruta_archivo);
    }

    session_start();
    $_SESSION['mensaje'] = "Se eliminó la creación literaria y su archivo correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/creaciones_literarias/show_literarias.php");
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar la creación literaria";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/creaciones_literarias/show_literarias.php");
}

?>
