<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_universidad = $_POST['txt_universidad'];



if(($txt_codigo == "") || ($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/programas/create_programa.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO programa (idPrograma, nombre, Universidad_idUniversidad) 
    VALUES (:txt_codigo, :txt_nombre, :txt_universidad)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_universidad', $txt_universidad);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Programa registrada con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/programas/show_programas.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar la asignatura, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/programas/create_programa.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/programas/create_programa.php");
    }
}
?>