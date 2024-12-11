<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];

$sentencia = $pdo->prepare("DELETE FROM universidad WHERE idUniversidad=:codigo_eliminar");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino la universidad correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/universidades/show_universidades.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la universidad";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/universidades/show_universidades.php");
        }

?>