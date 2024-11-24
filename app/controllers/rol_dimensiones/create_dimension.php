<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_descripcion = $_POST['txt_descripcion'];

// Para validar los campos como vacios

if(($txt_codigo=="") || ($txt_nombre=="") || ($txt_descripcion=="")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/dimensiones/create_dimension.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO dimensiones (iddimensiones, nombre, descripcion) 
    VALUES (:txt_codigo, :txt_nombre, :txt_descripcion)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_descripcion', $txt_descripcion);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Dimension registrada con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/dimensiones/create_dimension.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar la dimension, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/dimensiones/create_dimension.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/dimensiones/create_dimension.php");
    }
}
?>