<?php

function conectar(){
    $host = 'localhost';
    $port = '5000';
    $dbname = 'test';
    $user = 'postgres';
    $pass = '7532';

    $conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

    return $conexion;
}

?>