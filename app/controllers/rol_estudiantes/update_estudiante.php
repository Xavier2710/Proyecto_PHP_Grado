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

// Validación de campos vacíos
if(($txt_nombre == "") || ($txt_correo == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/admin/roles/edit_estudiante.php?id=".$txt_codigo);
} else {
    $sentencia = $pdo->prepare("UPDATE estudiante 
        SET nombreCompleto=:txt_nombre, 
            fechaN=:txt_fecha, 
            correo=:txt_correo, 
            Programa_idPrograma=:txt_programa, 
            procedenciaEscolar=:txt_escolar, 
            genero=:txt_genero 
        WHERE codigo=:txt_codigo");

    $sentencia->bindParam(':txt_nombre', $txt_nombre);
    $sentencia->bindParam(':txt_fecha', $txt_fecha);
    $sentencia->bindParam(':txt_correo', $txt_correo);
    $sentencia->bindParam(':txt_programa', $txt_programa);
    $sentencia->bindParam(':txt_escolar', $txt_escolar);
    $sentencia->bindParam(':txt_genero', $txt_genero);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el estudiante con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/show_estudiantes.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar el estudiante";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/edit_estudiante.php?id=".$txt_codigo);
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/edit_estudiante.php?id=".$txt_codigo);
    }
}
?>
