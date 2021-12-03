<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conalep_a_o_1";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$correo = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$query = "SELECT * FROM registro WHERE usuario = '$correo'";
$conec = mysqli_query($conn,$query);
$dats = mysqli_fetch_assoc($conec);

if(empty($dats['usuario'])){
	echo "Usuario o contraseña incorrecto";
}else{
	$conen = $dats['contraseña'];
	if (password_verify($contraseña, $conen)){
		
		$corr = $dats['usuario'];
		session_start();
		$_SESSION['usuario'] = $corr;
		header('Location: tareas.php');

	} else {

		echo "algo salio mal";
		header('Location: login.php');

	
	}

}
	
?>