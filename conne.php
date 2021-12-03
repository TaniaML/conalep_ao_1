<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conalep_a_o_1";

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$link) 
{
	die("No hay conexión: ".mysqli_connect_error());
}
$nombre=$_POST["nombre"];
$carrera=$_POST["carrera"];
$a_p=$_POST["a_p"];
$a_m=$_POST["a_m"];

$usuario=$_POST["usuario"];
$grupo=$_POST["grupo"];
$contraseña=$_POST["contraseña"];
$sif = password_hash("$contraseña", PASSWORD_DEFAULT);

$consulta="INSERT INTO registro (nombre, carrera, a_p, a_m, usuario, grupo, contraseña) 
VALUES ('$nombre', '$carrera', '$a_p', '$a_m', '$usuario', '$grupo', '$sif')";


if(mysqli_query($link,$consulta)){
echo " <script>
alert('Registro Exitoso');
window.location= 'regis.php'
</script>";
}else{
echo "Datos NO insertados";

}

?>