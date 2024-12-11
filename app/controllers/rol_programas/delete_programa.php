<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];

$sentencia = $pdo->prepare("DELETE FROM programa WHERE idPrograma=:codigo_eliminar");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino el Programa correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/programas/show_programas.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar el Programa";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/programas/show_programas.php");
        }

?>