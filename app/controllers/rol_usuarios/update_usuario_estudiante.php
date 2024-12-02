<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = $_POST['txt_nombre'];
$txt_nombre = ucwords($txt_nombre);
$txt_rol = $_POST['txt_rol'];
$txt_fecha = $_POST['txt_fecha'];
$txt_escolar = $_POST['txt_escolar'];
$txt_genero = $_POST['txt_genero'];
$txt_promedio = $_POST['txt_promedio'];
$txt_repeticion = $_POST['txt_repeticion'];


if(($txt_genero == "")){
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:'.APP_URL."/layout/estudiante/informacion_estudiante/update_estudiante.php");
} else {
    $sentencia = $pdo->prepare("UPDATE estudiante 
        SET fechaN=:txt_fecha, 
            procedenciaEscolar=:txt_escolar, 
            genero=:txt_genero, 
            promedioPonderado=:txt_promedio,
            repeticionAsignatura=:txt_repeticion
        WHERE codigo=:txt_codigo");

    $sentencia->bindParam(':txt_fecha', $txt_fecha);
    $sentencia->bindParam(':txt_escolar', $txt_escolar);
    $sentencia->bindParam(':txt_genero', $txt_genero);
    $sentencia->bindParam(':txt_promedio', $txt_promedio);
    $sentencia->bindParam(':txt_repeticion', $txt_repeticion);
    $sentencia->bindParam(':txt_codigo', $txt_codigo);

    try {
        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se actualizaron los datos con éxito";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/layout/estudiante/index_estudiante.php");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar los datos";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/layout/estudiante/informacion_estudiante/update_estudiante.php");
        }
    } catch (Exception $exception) {        
        session_start();
        $_SESSION['mensaje'] = "No se puede actualizar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/layout/estudiante/informacion_estudiante/update_estudiante.php");
    }
}
?>
