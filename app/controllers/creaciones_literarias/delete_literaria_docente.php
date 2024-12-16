<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];
$codigo_autor = $_POST['codigo_autor'];

echo $codigo;

$sentencia = $pdo->prepare("DELETE FROM creaciones_literarias WHERE idliteraria=:codigo_eliminar AND usuarios_idusuario=:codigo_autor");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);
$sentencia->bindParam('codigo_autor', $codigo_autor);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino la creación literaria correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/layout/docente/creaciones_literarias/show_literarias.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la asignatura";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/layout/docente/creaciones_literarias/show_literarias.php");
        }

?>