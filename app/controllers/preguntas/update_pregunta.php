<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombree = mb_strtoupper($txt_nombre);
$txt_dimension = $_POST['txt_dimension'];



if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/cuestionarios/edit_pregunta.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE preguntas 
        SET dimensiones_iddimensiones=:txt_dimension,
            pregunta=:txt_nombree
        WHERE idPreguntas=:txt_codigo");

    $sentencia->bindParam(':txt_dimension', $txt_dimension);
    $sentencia->bindParam(':txt_nombree', $txt_nombree);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó la pregunta con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/cuestionarios/show_preguntas.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar la pregunta";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/cuestionarios/show_preguntas.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/cuestionarios/show_preguntas.php?id=".$txt_codigo);
    }
}
?>
