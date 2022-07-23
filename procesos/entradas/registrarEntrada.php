<?php

    session_start();

    //$total = $_POST["total"];
    include_once "../../clases/base_de_datos.php";
   if(!empty($_SESSION["carrito"])){ 

        $tipoentrada = $_POST["tipo_entrada"];
        $foliocompra = $_POST["folio_compra"];
        $observacion = $_POST["observaciones"];
        
        date_default_timezone_set('UTC');
        date_default_timezone_set("America/Mexico_City");
        $ahora = date("Y-m-d");
        $iduser=$_SESSION['iduser'];

        $sentencia = $base_de_datos->prepare("INSERT INTO entrada(fecha, idusuario, tipo_entrada, folio_compra) VALUES (?, ?, ?, ?);");
        $sentencia->execute([$ahora, $iduser, $tipoentrada, $foliocompra]);

        $sentencia = $base_de_datos->prepare("SELECT folio_entrada FROM entrada ORDER BY folio_entrada DESC LIMIT 1;");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $folio_entrada = $resultado === false ? 1 : $resultado->folio_entrada;

        $base_de_datos->beginTransaction();
        $sentencia = $base_de_datos->prepare("INSERT INTO detalle_entrada(idinventario, folio_entrada, cantidad, observaciones, lote_producto) VALUES (?, ?, ?, ?, ?);");
        $sentenciaExistencia = $base_de_datos->prepare("UPDATE inventario SET stock = stock + ? WHERE codigoproduc = ?;");
        $sentenciaEntrada = $base_de_datos->prepare("UPDATE inventario SET entradas = entradas + ? WHERE codigoproduc = ?;");

        foreach ($_SESSION["carrito"] as $producto) {
            //$total += $producto->total;
            $sentencia->execute([$producto->idinventario, $folio_entrada, $producto->cantidad, $observacion, $producto->numLote]);
            $sentenciaExistencia->execute([$producto->cantidad, $producto->codigoproduc]);
            $sentenciaEntrada->execute([$producto->cantidad, $producto->codigoproduc]);
        }

        $base_de_datos->commit();
        unset($_SESSION["carrito"]);
        $_SESSION["carrito"] = [];
        header("Location: ../../entrada-new.php?status=1");

    }else{
        header("Location: ../../entrada-new.php?status=5");
    }
?>