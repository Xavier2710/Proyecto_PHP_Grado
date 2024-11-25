<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = ucwords($txt_nombre);
$txt_correo = $_POST['txt_correo'];
$txt_clave = $_POST['txt_clave'];
$txt_rol = $_POST['txt_rol'];

// Validación de campos vacíos
if(($txt_nombre == "") || ($txt_correo == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/usuarios/edit_usuario.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE usuarios 
        SET nombreCompleto=:txt_nombre, 
            correo=:txt_correo, 
            clave=:txt_clave, 
            rol=:txt_rol
        WHERE idusuario=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombre);
    $sentencia->bindParam(':txt_correo', $txt_correo);
    $sentencia->bindParam(':txt_clave', $txt_clave);
    $sentencia->bindParam(':txt_rol', $txt_rol);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el usuario con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/usuarios/edit_usuario.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el usuario";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/usuarios/edit_usuario.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/usuarios/edit_usuario.php?id=".$txt_codigo);
    }
}
?>
