<?php
    if(!isset($_POST["codigo_producto"])) {
        return;
    }
    $codigo = $_POST["codigo_producto"];
    $fecha = $_POST["producto_fecha"];
    $cantidad = $_POST["producto_cantidad"];
    $observacion = $_POST["producto_observacion"];

    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $fecha = date("d-m-Y");

    include_once "../../clases/base_de_datos.php";

    $sentencia = $base_de_datos->prepare("SELECT inventario.idinventario, producto.codigoproduc, inventario.codigoproduc, producto.nombre, producto.modelo, inventario.stock, producto.stockmaximo 
                                        FROM inventario INNER JOIN producto ON producto.codigoproduc = inventario.codigoproduc 
                                        WHERE producto.codigoproduc = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    if($producto){ 
        /*if($producto->existencia < 1){
            header("Location: ../../agregarTablaTemp.php?status=5");
            exit;
        }*/
        session_start();

        //se busca el producto en el carrito
        $indice = false;
        for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
            if($_SESSION["carrito"][$i]->codigoproduc === $codigo){
                $indice = $i;
                break;
            }
        }
        //si no se encuentra el producto en el carrito se agrega 
        if($indice === FALSE){
            //si la cantidad ingresada supera el stock maximo se sale
            if (($cantidad + $producto->stock ) > $producto->stockmaximo) {
                header("Location: ../../entrada-new.php?status=2");
                exit;
            }
            $producto->cantidad = $cantidad;
            $producto->fechaR = $fecha;
            $producto->observaciones = $observacion;
            array_push($_SESSION["carrito"], $producto);
        }else{
            header("Location: ../../entrada-new.php?status=3");
            exit;
        }
        header("Location: ../../entrada-new.php");
    }else{
         header("Location: ../../entrada-new.php?status=4");
    }
?>