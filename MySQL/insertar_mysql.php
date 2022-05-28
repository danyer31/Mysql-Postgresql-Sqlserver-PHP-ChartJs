<?php
	include('conexion_mysql.php');
    $con = conectar();

$nombre= $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$sql="INSERT INTO datos VALUES('$nombre', '$cantidad')";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: vista_mysql.php");
}else{

}
?>