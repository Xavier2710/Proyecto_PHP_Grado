<?php
include ('../../config.php');


$codigo = $_GET['id'];


$sql_literarias = "SELECT * FROM creaciones_literarias WHERE idliteraria=:codigo";
$query_literarias = $pdo->prepare($sql_literarias);
$query_literarias->bindParam('codigo', $codigo, PDO::PARAM_INT);
$query_literarias->execute();


$literarias = $query_literarias->fetchAll(PDO::FETCH_ASSOC);

if (count($literarias) > 0) {
    foreach($literarias as $literaria) {
        $nom_archivo = $literaria['archivo'];
        $ruta = "../../../database/creaciones_literarias/" . $nom_archivo;
        
        if (file_exists($ruta)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $nom_archivo . '"');
            readfile($ruta);
            exit();
           
        } else {
            
            session_start();
            $_SESSION['mensaje'] = "Error al descargar el archivo, no está disponible";
            $_SESSION['icono'] = "error";
            header('Location: ' . APP_URL . "/admin/creaciones_literarias/show_literarias.php");
            exit();
        }
    }
} else {
    
    session_start();
    $_SESSION['mensaje'] = "No hay creaciones literarias o archivos";
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL . "/admin/creaciones_literarias/show_literarias.php");
    exit();
}
?>
