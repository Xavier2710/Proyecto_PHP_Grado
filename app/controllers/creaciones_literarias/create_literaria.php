<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_autor = $_POST['txt_autor'];
$txt_programa = $_POST['txt_programa'];

if($_FILES['file']['name'] != null){
    
    $nombreArchivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../database/creaciones_literarias/".$nombreArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $txt_archivo = $nombreArchivo;
    echo "Hay archivo";
    echo''.$txt_archivo.'';

}else{
    $txt_archivo = "";
    echo "negativo archivo";
    echo''.$txt_archivo.'';
}

// Para validar los campos como vacios

if(($txt_codigo == "") || ($txt_nombre == "") || ($txt_autor == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/creaciones_literarias/create_literaria.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO creaciones_literarias (idliteraria, nombre, archivo, autor, Programa_idPrograma) 
    VALUES (:txt_codigo, :txt_nombre, :txt_archivo, :txt_autor, :txt_programa)");
    
    $sentencia->bindParam('txt_codigo', $txt_codigo);
    $sentencia->bindParam('txt_nombre', $txt_nombre);
    $sentencia->bindParam('txt_archivo', $txt_archivo);
    $sentencia->bindParam('txt_autor', $txt_autor);
    $sentencia->bindParam('txt_programa', $txt_programa);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Creación literaia registrada con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/creaciones_literarias/create_literaria.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar la creación literaria, codigo existe!";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/creaciones_literarias/create_literaria.php");
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "Este Codigo ya esta registrado en el sistema";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/creaciones_literarias/create_literaria.php");
    }
}
?>