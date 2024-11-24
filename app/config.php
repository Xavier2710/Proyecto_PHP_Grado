<?php 

define('SERVIDOR','localhost');
define('USUARIO', 'root');
define('PASSWORD', '102030Xavier*');
define('BD', 'bd_medicina');

define('APP_NAME', 'Dashboard Medicina');
define('APP_URL', 'http://localhost/proyecto_grado');
//define('APP_URL', 'http://192.168.18.7/proyecto_grado');
define('KEY_API_MAPS', '');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "conexion exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error, no se puedo conectar a la base de datos";
}

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');

$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$año_actual = date('Y');
