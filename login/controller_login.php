<?php

include('../app/config.php');

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($usuarios);

$contador = 0;

foreach($usuarios as $usuario) {
    $clave_tabla = $usuario['clave'];
    $contador = $contador + 1;
}

if(($contador > 0) && ($clave_tabla == $clave)) {
    echo "Los datos son correctos";
    session_start();
    $_SESSION['mensaje'] = "Bienvenido al Sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_correo'] = $correo;
    header('Location:'.APP_URL."/admin/index_admin.php");
}else{
    echo "los datos son incorrectos";
    session_start();
    $_SESSION['mensaje'] = "Los datos ingresados son incorrectos, vuelva a intentarlo";
    header('Location:'.APP_URL."/login/index_login.php");
}