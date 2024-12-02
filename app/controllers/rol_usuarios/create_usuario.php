<?php

include('../../../app/config.php');

$txt_codigo = $_POST['txt_codigo'];
$txt_nombre = ucwords($_POST['txt_nombre']);
$txt_correo = $_POST['txt_correo'];
$txt_clave = $_POST['txt_clave'];
$txt_rol = $_POST['txt_rol'];

// Validación de campos vacíos
if (empty($txt_codigo) || empty($txt_nombre) || empty($txt_correo) || empty($txt_clave)) {
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos";
    $_SESSION['icono'] = "info";
    header('Location:' . APP_URL . "/admin/roles/usuarios/create_usuario.php");
    exit();
}

try {
    $pdo->beginTransaction();

    // Inserción en la tabla usuarios
    $sentencia = $pdo->prepare("
        INSERT INTO usuarios (idusuario, nombreCompleto, correo, clave, rol) 
        VALUES (:txt_codigo, :txt_nombre, :txt_correo, :txt_clave, :txt_rol)
    ");
    $sentencia->bindParam(':txt_codigo', $txt_codigo);
    $sentencia->bindParam(':txt_nombre', $txt_nombre);
    $sentencia->bindParam(':txt_correo', $txt_correo);
    $sentencia->bindParam(':txt_clave', $txt_clave);
    $sentencia->bindParam(':txt_rol', $txt_rol);

    if (!$sentencia->execute()) {
        throw new Exception("Error al insertar en la tabla usuarios");
    }

    // Si el rol es "Estudiante", realiza el segundo insert
    if ($txt_rol === 'Estudiante') {
        $last_id_usuario = $pdo->lastInsertId();
        $grupo = '40001';
        $asignatura = '20001';

        $sentencia_estudiante = $pdo->prepare("
            INSERT INTO estudiante (codigo, usuarios_idusuario, grupos_idgrupos, grupos_asignaturas_idasignaturas) 
            VALUES (:txt_codigo, :last_id_usuario, :txt_grupo, :txt_asignatura)
        ");
        $sentencia_estudiante->bindParam(':txt_codigo', $txt_codigo);
        $sentencia_estudiante->bindParam(':last_id_usuario', $last_id_usuario);
        $sentencia_estudiante->bindParam(':txt_grupo', $grupo);
        $sentencia_estudiante->bindParam(':txt_asignatura', $asignatura);

        if (!$sentencia_estudiante->execute()) {
            throw new Exception("Error al insertar en la tabla estudiante");
        }
    }

    $pdo->commit();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Usuario registrado con éxito";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/roles/usuarios/show_usuarios.php");
} catch (Exception $exception) {
    // Revertir transacciones en caso de error
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: " . $exception->getMessage();
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles/usuarios/create_usuario.php");
}
?>
