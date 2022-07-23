<?php
    if(!isset($_POST["codigo_producto"])) {
        return;
    }
    $codigo = $_POST["codigo_producto"];
    $fecha = $_POST["producto_fecha"];
    $cantidad = $_POST["producto_cantidad"];
    //$observacion = $_POST["producto_observacion"];
    include_once "../../clases/base_de_datos.php";
    include_once "../../clases/Conexion.php";
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $fecha = date("Y-m-d");

    $c= new conectar();
	$conexion= $c->conexion();
    $sql = "SELECT ifnull(substring(lote_producto, 3, 6),0) FROM detalle_entrada ORDER BY iddetalle_entrada DESC LIMIT 1;";
    $result= mysqli_query($conexion, $sql);
    $lote = mysqli_fetch_row($result)[0];

    $sql2 = "SELECT ifnull(substring(lote_producto, 9),0) FROM detalle_entrada ORDER BY iddetalle_entrada DESC LIMIT 1;";
    $result2= mysqli_query($conexion, $sql2);
    $contador = mysqli_fetch_row($result2)[0];
    
    $anio = date("y");
    $mes = date("m");
    $dia = date("d");
    $fechaL = $anio.$mes.$dia; 
    if($lote == $fechaL){
        $contador++;
        $numLote= "CF".$fechaL.$contador;
    }else{
        $numLote= "CF".$fechaL."1";
    }

    $sentencia = $base_de_datos->prepare("SELECT inventario.idinventario, producto.codigoproduc, inventario.codigoproduc, producto.nombreproducto, producto.modelo, inventario.stock, producto.stockmaximo 
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
            //se busca en el carrito si ya existen los numeros de lote
            for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
                if($_SESSION["carrito"][$i]->numLote == $numLote){
                    $contador1 = $_SESSION["carrito"][$i]->numLote;
                    $conta = substr($contador1, 8);
                    $conta++;
                    $numLote= "CF".$fechaL.$conta;
                }
            }
            $producto->cantidad = $cantidad;
            $producto->fechaR = $fecha;
            $producto->numLote = $numLote;
            //$producto->observaciones = $observacion;
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