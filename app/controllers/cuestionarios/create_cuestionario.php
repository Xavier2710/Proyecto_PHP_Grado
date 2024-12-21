<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$codigo_sesion = $_POST['codigo_sesion'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_fechainicio = $_POST['txt_fechainicio'];
$txt_fechafin = $_POST['txt_fechafin'];

if(($txt_codigo == "") || ($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/cuestionario/create_cuestionario.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO encuesta (idCuestionario, nombre, fechaInicio, fechaFin, idusuario) 
    VALUES (:txt_codigo, :txt_nombre, :txt_fechainicio, :txt_fechafin, :codigo_sesion)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_fechainicio', $txt_fechainicio);
    $sentencia->bindParam('txt_fechafin', $txt_fechafin);
    $sentencia->bindParam('codigo_sesion', $codigo_sesion);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Cuestionario registrado con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/cuestionarios/show_cuestionarios.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar el cuestionario, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/cuestionarios/create_cuestionario.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/cuestionarios/create_cuestionario.php");
    }
}
?>