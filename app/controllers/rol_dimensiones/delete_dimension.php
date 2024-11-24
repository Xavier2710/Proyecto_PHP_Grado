<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];

$sentencia = $pdo->prepare("DELETE FROM dimensiones WHERE iddimensiones=:codigo_eliminar");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino la dimension correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/dimensiones/show_dimensiones.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la asignatura";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/dimensiones/show_dimensiones.php");
        }

?>