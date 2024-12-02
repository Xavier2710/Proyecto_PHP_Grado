<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_ano = $_POST['txt_ano'];
$txt_periodo = $_POST['txt_periodo'];
$txt_asignatura = $_POST['txt_asignatura'];


if(($txt_codigo == "") || ($txt_nombre == "") || ($txt_periodo == "") || ($txt_ano == "") || ($txt_asignatura == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/grupos/create_grupo.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO grupos (idgrupos, nombregrupo, periodo, año, asignaturas_idasignaturas) 
    VALUES (:txt_codigo, :txt_nombre, :txt_periodo, :txt_ano, :txt_asignatura)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_periodo', $txt_periodo);
    $sentencia->bindParam('txt_ano', $txt_ano);
    $sentencia->bindParam('txt_asignatura', $txt_asignatura);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Grupo registrado con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/grupos/create_grupo.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar el grupo, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/grupos/create_grupo.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/grupos/create_grupo.php");
    }
}
?>