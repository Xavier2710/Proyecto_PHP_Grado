<?php

include('../../../app/config.php');

$codigo_eliminar = $_POST['codigo_eliminar'];

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE idusuario=:codigo_eliminar");
    
$sentencia->bindParam('codigo_eliminar', $codigo_eliminar);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se elimino el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/usuarios/show_usuarios.php");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar el usuario";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/usuarios/show_usuarios.php");
        }

?>