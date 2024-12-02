<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_archivo = $_POST['txt_archivo'];
$txt_autor = $_POST['txt_autor'];
$txt_asignatura = $_POST['txt_asignatura'];

if (empty($txt_nombre) || empty($txt_autor) || empty($txt_archivo['tmp_name']) || empty($asignatura_id)) {
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos.";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/creaciones_literarias/create_literaria.php");
    exit();
}

// Leer el contenido del archivo en binario
$contenidoArchivo = file_get_contents($archivo['tmp_name']);
$nombreArchivo = $archivo['name'];

// Insertar datos en la base de datos
$sentencia = $pdo->prepare("
    INSERT INTO creaciones_literarias (nombre, archivo, autor, asignaturas_idasignaturas) 
    VALUES (:nombre, :archivo, :autor, :asignatura_id)
");

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':archivo', $contenidoArchivo, PDO::PARAM_LOB);
$sentencia->bindParam(':autor', $autor);
$sentencia->bindParam(':asignatura_id', $asignatura_id);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Archivo subido con éxito.";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles/creaciones_literarias/create_literaria.php");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al subir el archivo.";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/creaciones_literarias/create_literaria.php");
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/creaciones_literarias/create_literaria.php");
}

?>