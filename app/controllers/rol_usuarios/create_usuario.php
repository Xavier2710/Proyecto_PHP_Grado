<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = ucwords($txt_nombre);
$txt_correo = $_POST['txt_correo'];
$txt_clave = $_POST['txt_clave'];
$txt_rol = $_POST['txt_rol'];

// Para validar los campos como vacios

if(($txt_codigo == "") || ($txt_nombre == "") || ($txt_correo == "") || ($txt_clave == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/usuarios/create_usuario.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO usuarios (idusuario, nombreCompleto, correo, clave, rol) 
    VALUES (:txt_codigo, :txt_nombre, :txt_correo, :txt_clave, :txt_rol)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_correo', $txt_correo);
    $sentencia->bindParam('txt_clave', $txt_clave);
    $sentencia->bindParam('txt_rol', $txt_rol);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Usuario registrado con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/usuarios/show_usuarios.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar el usuario";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/usuarios/show_usuarios.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/usuarios/show_usuarios.php");
    }
}
?>