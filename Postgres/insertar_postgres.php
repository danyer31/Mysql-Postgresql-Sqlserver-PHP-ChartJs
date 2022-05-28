<?php
	include('conexion_postgresql.php');
    $con = conectar();

//include("conexion.php");
//$con = conectar();

$nombre= $_POST['nombre'];
$cantidad = $_POST['cantidad'];



$sql="INSERT INTO datos VALUES('$nombre', '$cantidad')";
$query = pg_query($con,$sql);

if($query){
    Header("Location: vista_postgres.php");
}else{

}
?>