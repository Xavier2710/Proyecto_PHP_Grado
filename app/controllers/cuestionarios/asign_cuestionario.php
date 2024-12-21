<?php

include('../../../app/config.php');

$txt_codigo_cuestionario = $_POST['txt_codigo_cuestionario'];
$txt_codigo_grupo = $_POST['txt_codigo_grupo'];



if(($txt_codigo_grupo == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/cuestionarios/asign_cuestionario.php");
}else{

    $sentencia = $pdo->prepare("INSERT INTO encuesta_grupos (idCuestionario, idgrupos) 
    VALUES (:txt_codigo_cuestionario, :txt_codigo_grupo)");
    
    $sentencia->bindParam('txt_codigo_cuestionario', $txt_codigo_cuestionario);
    $sentencia->bindParam('txt_codigo_grupo', $txt_codigo_grupo);

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Cuestionario Asignado con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/cuestionarios/show_cuestionarios.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "Ya se asigno el cuestionario a ese grupo anteriormente";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/cuestionarios/asign_cuestionario.php?id=".$txt_codigo_cuestionario);
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo asignar el cuestionario";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/cuestionarios/asign_cuestionario.php?id=".$txt_codigo_cuestionario);
    }
}
?>