<?php 

    session_start();
    require_once "../../clases/Conexion.php";

    $c= new conectar();
    $conexion=$c->conexion();

    $codigo = $_POST["codigo_producto"];
    $nombrep = $_POST["producto_producto"];
    $modelo = $_POST["modelo_producto"];
    $cantidad = $_POST["producto_cantidad"];
    $fecha = $_POST["producto_fecha"];
    $observacion = $_POST["producto_observacion"];

    $articulo= $codigo."||".
                $nombrep."||".
                $modelo."||".
                $cantidad."||".
                $fecha."||".
                $observacion;
                

    $_SESSION['tablaEntradasTemp'][]=$articulo;

?>