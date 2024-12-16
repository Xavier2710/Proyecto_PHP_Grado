<?php

include('../../../app/config.php');
$fechaHora = date('Ymd_His');

$txt_codigo = $_POST['txt_codigo']; 
$txt_nombre = mb_strtoupper($_POST['txt_nombre']);
$txt_archivo = $_FILES['txt_archivo'];
$txt_autor = $_POST['txt_autor'];


if (empty($txt_nombre) || empty($txt_autor)) {
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos.";
    $_SESSION['icono'] = "info";
    header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/edit_literaria.php?id=$txt_codigo");
    exit();
}

$directorioDestino = "../../../database/creaciones_literarias/";
$nombreArchivo1 = null;


$consultaArchivo = $pdo->prepare("SELECT archivo FROM creaciones_literarias WHERE idliteraria = :txt_codigo");
$consultaArchivo->bindParam(':txt_codigo', $txt_codigo);
$consultaArchivo->execute();
$archivoAnterior = $consultaArchivo->fetchColumn();


if (!empty($txt_archivo['name'])) {
    $nombreArchivo = basename($txt_archivo['name']);
    $nombreArchivo1 = $fechaHora . '_' . $nombreArchivo;
    $rutaArchivo = $directorioDestino . $nombreArchivo1;

    // Elimina el archivo anterior si existe
    if ($archivoAnterior && file_exists($directorioDestino . $archivoAnterior)) {
        unlink($directorioDestino . $archivoAnterior);
    }

    // Guarda el nuevo archivo en la ruta destino
    if (!move_uploaded_file($txt_archivo['tmp_name'], $rutaArchivo)) {
        session_start();
        $_SESSION['mensaje'] = "Error al mover el archivo.";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/edit_literaria.php?id=$txt_codigo");
        exit();
    }
}


if ($nombreArchivo1) {
    
    $sentencia = $pdo->prepare("UPDATE creaciones_literarias 
                                SET nombre = :txt_nombre, 
                                    archivo = :txt_archivo, 
                                    autor = :txt_autor, 
                                    fechaCargue = NOW()
                                WHERE idliteraria = :txt_codigo");
    $sentencia->bindParam(':txt_archivo', $nombreArchivo1);
} else {
    
    $sentencia = $pdo->prepare("UPDATE creaciones_literarias 
                                SET nombre = :txt_nombre, 
                                    autor = :txt_autor, 
                                    fechaCargue = NOW()
                                WHERE idliteraria = :txt_codigo");
}

$sentencia->bindParam(':txt_codigo', $txt_codigo);
$sentencia->bindParam(':txt_nombre', $txt_nombre);
$sentencia->bindParam(':txt_autor', $txt_autor);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Creación literaria actualizada con éxito.";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/show_literarias.php");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar la creación literaria.";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/edit_literaria.php?id=$txt_codigo");
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/layout/docente/creaciones_literarias/edit_literaria.php?id=$txt_codigo");
}
?>
