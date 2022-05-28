<?php

function conectar(){
    $serverName = "DESKTOP-P6HLD03, 6000"; //serverName\instanceName, portNumber (por defecto es 1433)
    $connectionInfo = array( "Database"=>"test");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    return $conn;
}

?>

