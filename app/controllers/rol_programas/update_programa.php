<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombree = mb_strtoupper($txt_nombre);
$txt_universidad = $_POST['txt_universidad'];


if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/programas/edit_programa.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE programa 
        SET nombre=:txt_nombre,
            Universidad_idUniversidad=:txt_universidad
        WHERE idPrograma=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombree);
    $sentencia->bindParam(':txt_universidad', $txt_universidad);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el programa con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/programas/show_programas.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el programa";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/programas/edit_programa.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/programas/edit_programa.php?id=".$txt_codigo);
    }
}
?>
