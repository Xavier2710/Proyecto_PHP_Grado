<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = mb_strtoupper($txt_nombre);
$txt_periodo = $_POST['txt_periodo'];
$txt_año = $_POST['txt_año'];
$txt_asignatura = $_POST['txt_asignatura'];

// Validación de campos vacíos
if(($txt_nombre == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/grupos/edit_grupo.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE grupos 
        SET nombregrupo=:txt_nombre,
            periodo=:txt_periodo,
            año:txt_año,
            asignaturas_idasignaturas:txt_asignatura
        WHERE idgrupos=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombree);
    $sentencia->bindParam(':txt_periodo', $txt_periodo);
    $sentencia->bindParam(':txt_año', $txt_año);
    $sentencia->bindParam(':txt_asignatura', $txt_asignatura);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el grupo con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/grupos/show_grupos.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el grupo";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/grupos/show_grupos.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/grupos/show_grupos.php?id=".$txt_codigo);
    }
}
?>
