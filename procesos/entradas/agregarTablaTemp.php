<?php
    if(!isset($_POST["codigo_producto"])) return;
    $codigo = $_POST["codigo_producto"];
    $fecha = $_POST["producto_fecha"];
    $cantidad = $_POST["producto_cantidad"];
    $observacion = $_POST["producto_observacion"];

    include_once "../../clases/base_de_datos.php";

    $sentencia = $base_de_datos->prepare("SELECT codigoproduc, nombre, modelo FROM producto WHERE codigoproduc = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    if($producto){ 
        /*if($producto->existencia < 1){
            header("Location: ../../agregarTablaTemp.php?status=5");
            exit;
        }*/
        session_start();

        $indice = false;
        for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
            if($_SESSION["carrito"][$i]->codigoproduc === $codigo){
                $indice = $i;
                break;
            }
        }
        if($indice === FALSE){
            //$producto->cantidad = 1;
            //$producto->total = $producto->precioVenta;
            array_push($_SESSION["carrito"], $producto);
        }else{
            $_SESSION["carrito"][$indice]->cantidad++;
            //$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
        }
        header("Location: ../../item-search.php");
    }else header("Location: ../../item-search.php?status=4");
?>