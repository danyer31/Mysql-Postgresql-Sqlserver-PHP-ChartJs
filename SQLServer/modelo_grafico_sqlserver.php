<?php

    include('conexion_sqlserver.php');
    $con = conectar();

    $sql="SELECT nombre, SUM(cantidad) as cantidad from datos group by nombre";
    $query = sqlsrv_query($con,$sql);
    $arreglo = array();
    if($query){
        //echo "dentro del if query";
        if($consulta = $query){
            //echo "entrando al if de consulta";
            while ($consulta_VU = sqlsrv_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            echo json_encode($arreglo);
            //return $arreglo;
            sqlsrv_close();
        } 
    } 

//}
?>