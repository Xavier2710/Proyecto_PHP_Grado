<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];
$codigo_encu = $_POST['codigo_encu'];


$sentencia = $pdo->prepare("DELETE FROM preguntas WHERE idPreguntas=:codigo_eliminar");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino la pregunta correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/cuestionarios/show_preguntas.php?id=".$codigo_encu);
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la asignatura";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/cuestionarios/show_preguntas.php?id=".$codigo_encu);
        }

?>