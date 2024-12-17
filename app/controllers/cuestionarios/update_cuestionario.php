<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombree = mb_strtoupper($txt_nombre);
$txt_fechainicio = $_POST['txt_fechainicio'];
$txt_fechafin = $_POST['txt_fechafin'];



if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/cuestionarios/edit_cuestionario.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE encuesta 
        SET nombre=:txt_nombre,
            fechaInicio=:txt_fechainicio,
            fechaFin=:txt_fechafin
        WHERE idCuestionario=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombree);
    $sentencia->bindParam(':txt_fechainicio', $txt_fechainicio);
    $sentencia->bindParam(':txt_fechafin', $txt_fechafin);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el cuestionario con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/cuestionarios/show_cuestionarios.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar la asignatura";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/cuestionarios/edit_cuestionario.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/cuestionarios/edit_cuestionario.php?id=".$txt_codigo);
    }
}
?>
