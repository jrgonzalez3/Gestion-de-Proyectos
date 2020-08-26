<?php 
//require_once "global.php";

//$conexion=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
//$conexion=new mysqli("mysql311.eshos.com","adad","adasd","asdasda");
//mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

//muestra posible error en la conexion
//if (mysqli_connect_errno()) {
//	printf("Ups parece que falló en la conexion con la base de datos: %s\n",mysqli_connect_error());
//	exit();
//}

setlocale(LC_TIME, "es_ES.UTF-8");
$conexion = @mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_query($con, "SET NAMES UTF8");

if (!$conexion) {
    die("Imposible conectarse!: " . mysqli_error($conexion));
}
if (@mysqli_connect_errno()) {
    die("La Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}




if (!function_exists('ejecutarConsulta')) {
	Function ejecutarConsulta($sql){ 
global $conexion;
$query=$conexion->query($sql);
return $query;

	} 

	function ejecutarConsultaSimpleFila($sql){
global $conexion;

$query=$conexion->query($sql);
$row=$query->fetch_assoc();
return $row;
	}
function ejecutarConsulta_retornarID($sql){
global $conexion;
$query=$conexion->query($sql);
return $conexion->insert_id;
}

function limpiarCadena($str){
global $conexion;
$str=mysqli_real_escape_string($conexion,trim($str));
return htmlspecialchars($str);
}

}

 ?>
