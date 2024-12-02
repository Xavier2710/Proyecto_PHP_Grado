<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_grupo = $_POST['txt_grupo'];

// Validación de campos vacíos
if(($txt_codigo == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/estudiantes/edit_grupo_estudiante.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE estudiante 
        SET grupos_idgrupos=:txt_grupo
        WHERE codigo=:txt_codigo");

    $sentencia->bindParam(':txt_grupo', $txt_grupo);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el grupo para el estudiante con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/estudiantes/show_estudiantes.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el grupo para el usuario";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/estudiantes/edit_grupo_estudiante.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/estudiantes/edit_grupo_estudiante.php?id=".$txt_codigo);
    }
}
?>
