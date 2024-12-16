<?php

include('../../../app/config.php');
$fechaHora = date('Ymd_His');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = mb_strtoupper($_POST['txt_nombre']);
$txt_archivo = $_FILES['txt_archivo'];
$txt_autor = $_POST['txt_autor'];
$txt_asignatura = $_POST['txt_asignatura'];


if (empty($txt_nombre) || empty($txt_autor)) {
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos.";
    $_SESSION['icono'] = "info";
    header('Location:' . APP_URL . "/admin/creaciones_literarias/create_literaria.php");
    exit();
}



$directorioDestino = "../../../database/creaciones_literarias/";
$nombreArchivo = basename($txt_archivo['name']);
$nombreArchivo1 = $fechaHora.'_'.$nombreArchivo;
$rutaArchivo = $directorioDestino . $nombreArchivo1;
chmod($rutaArchivo, 0777);


if (move_uploaded_file($txt_archivo['tmp_name'], $rutaArchivo)) {
    
    $sentencia = $pdo->prepare("INSERT INTO creaciones_literarias (idliteraria, nombre, archivo, autor, fechaCargue, usuarios_idusuario) 
        VALUES (:txt_codigo,:txt_nombre, :txt_archivo, :txt_autor, NOW(), :txt_autor)");
        
    $sentencia->bindParam(':txt_codigo', $txt_codigo);
    $sentencia->bindParam(':txt_nombre', $txt_nombre);
    $sentencia->bindParam(':txt_archivo', $nombreArchivo1);
    $sentencia->bindParam(':txt_autor', $txt_autor);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Creación literaria registrada con éxito.";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/show_literarias.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error al registrar la creación literaria.";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/create_literaria.php");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensaje'] = "Error: " . $e->getMessage();
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/create_literaria.php");
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al mover el archivo.";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/create_literaria.php");
}
?>