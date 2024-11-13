<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = ucwords($txt_nombre);
$txt_fecha = $_POST['txt_fecha'];
$txt_correo = $_POST['txt_correo'];
$txt_programa = $_POST['txt_programa'];
$txt_escolar = $_POST['txt_escolar'];
$txt_genero = $_POST['txt_genero'];
$txt_genero = mb_strtoupper($txt_genero);

// Para validar los campos como vacios

if(($txt_codigo == "") & ($txt_nombre == "") & ($txt_correo == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/create_estudiante.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO estudiante (codigo, nombreCompleto, fechaN, correo, Programa_idPrograma, procedenciaEscolar, genero) 
    VALUES (:txt_codigo, :txt_nombre, :txt_fecha, :txt_correo, :txt_programa, :txt_escolar, :txt_genero)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_fecha', $txt_fecha);
    $sentencia->bindParam('txt_correo', $txt_correo);
    $sentencia->bindParam('txt_programa', $txt_programa);
    $sentencia->bindParam('txt_escolar', $txt_escolar);
    $sentencia->bindParam('txt_genero', $txt_genero);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Estudiante registrado con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/create_estudiante.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar el estudiante";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/create_estudiante.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/create_estudiante.php");
    }
}
?>