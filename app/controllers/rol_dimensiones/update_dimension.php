<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_descripcion = $_POST['txt_descripcion'];

// Validación de campos vacíos
if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/dimensiones/edit_dimension.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE dimensiones 
        SET nombre=:txt_nombre,
            descripcion=:txt_descripcion
        WHERE iddimensiones=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombre);
    $sentencia->bindParam(':txt_descripcion', $txt_descripcion);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó la dimension con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/dimensiones/show_dimensiones.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar la dimension";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/dimensiones/show_dimensiones.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/dimensiones/show_dimensiones.php?id=".$txt_codigo);
    }
}
?>
