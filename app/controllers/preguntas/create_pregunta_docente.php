<?php
include('../../../app/config.php');


$encuesta_id = $_POST['codigo']; 
$preguntas = $_POST['preguntas']; 
$dimensiones = $_POST['dimensiones'];


if (empty($preguntas) || empty($dimensiones)) {
    session_start();
    $_SESSION['mensaje'] = "Debe diligenciar todos los campos de preguntas y dimensiones";
    $_SESSION['icono'] = "info";
    header('Location:' . APP_URL . "/layout/docente/cuestionarios/preguntas_cuestionario.php");
} else {
    try {
        
        $pdo->beginTransaction();

        
        $sentencia_id = $pdo->query("SELECT MAX(idPreguntas) FROM preguntas");
        $ultimo_id = $sentencia_id->fetchColumn();
        $nuevo_id = $ultimo_id + 1;

        
        $sentencia = $pdo->prepare("INSERT INTO preguntas (idPreguntas, dimensiones_iddimensiones, encuesta_idCuestionario, pregunta) 
        VALUES (:idPreguntas, :dimensiones_id, :encuesta_id, :pregunta)");


        for ($i = 0; $i < count($preguntas); $i++) {
            $pregunta = $preguntas[$i];
            $dimensiones_id = $dimensiones[$i];

            $sentencia->bindValue('idPreguntas', $nuevo_id, PDO::PARAM_INT);
            $sentencia->bindValue('dimensiones_id', $dimensiones_id, PDO::PARAM_INT);
            $sentencia->bindValue('encuesta_id', $encuesta_id, PDO::PARAM_INT);
            $sentencia->bindValue('pregunta', $pregunta, PDO::PARAM_STR);

            $sentencia->execute();

            $nuevo_id++;
        }


        
        $pdo->commit();

        
        session_start();
        $_SESSION['mensaje'] = "Preguntas registradas con éxito";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/layout/docente/cuestionarios/show_cuestionarios.php");

    } catch (Exception $exception) {
        
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Ocurrió un error al guardar las preguntas: " . $exception->getMessage();
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/layout/docente/cuestionarios/preguntas_cuestionario.php");
    }
}
?>
