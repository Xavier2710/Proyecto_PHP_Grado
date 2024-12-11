<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_pais = $_POST['txt_pais'];



if(($txt_codigo == "") || ($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/universidades/create_universidad.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO universidad (idUniversidad, nombre, pais) 
    VALUES (:txt_codigo, :txt_nombre, :txt_pais)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_pais', $txt_pais);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Universidad registrada con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/universidades/create_universidad.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar la asignatura, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/universidades/create_universidad.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/universidades/create_universidad.php");
    }
}
?>