<?php
	include('conexion_sqlserver.php');
    $con = conectar();


$nombre= $_POST['nombre'];
$cantidad = $_POST['cantidad'];



$sql="INSERT INTO datos VALUES('$nombre', '$cantidad')";
$query = sqlsrv_query($con,$sql);

if($query){
    Header("Location: vista_sqlserver.php");
}else{

}
?>