<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombree = mb_strtoupper($txt_nombre);

// Validación de campos vacíos
if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/asignaturas/edit_asignatura.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE asignaturas 
        SET nombre=:txt_nombre
        WHERE idasignaturas=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombree);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó la asignatura con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/asignaturas/show_asignaturas.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar la asignatura";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/asignaturas/show_asignaturas.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/asignaturas/show_asignaturas.php?id=".$txt_codigo);
    }
}
?>
