<?php

    include('conexion_mysql.php');
    $con = conectar();

/*    function TraerDatosGraficoBar(){
        $sql = "SELECT Nombre, Cantidad FROM datos";
        echo json_encode($sql);
        $arreglo = array();
        if ($consulta = mysqli_query($con,$sql)) {

            while ($consulta_VU = pg_fetch_array($consulta)) {
                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            pg_close();	
        }
    }
*/
//function TraerDatosGraficoBarP(){
    $sql="CALL SP_DATOS";
    $query = mysqli_query($con,$sql);
    $arreglo = array();
    if($query){
        //echo "dentro del if query";
        if($consulta = $query){
            //echo "entrando al if de consulta";
            while ($consulta_VU = mysqli_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            echo json_encode($arreglo);
            //return $arreglo;
            mysqli_close();
        } 
    } 


//}
?>