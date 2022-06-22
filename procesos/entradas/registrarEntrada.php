<?php

    session_start();

    //$total = $_POST["total"];
    include_once "../../clases/base_de_datos.php";
   if(!empty($_SESSION["carrito"])){ 

        date_default_timezone_set('UTC');
        date_default_timezone_set("America/Mexico_City");
        $ahora = date("d-m-Y");
        $iduser=$_SESSION['iduser'];

        $sentencia = $base_de_datos->prepare("INSERT INTO entrada(fecha, idusuario) VALUES (?, ?);");
        $sentencia->execute([$ahora, $iduser]);

        $sentencia = $base_de_datos->prepare("SELECT folio_entrada FROM entrada ORDER BY folio_entrada DESC LIMIT 1;");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $folio_entrada = $resultado === false ? 1 : $resultado->folio_entrada;

        $base_de_datos->beginTransaction();
        $sentencia = $base_de_datos->prepare("INSERT INTO detalle_entrada(idinventario, folio_entrada, cantidad, observaciones) VALUES (?, ?, ?, ?);");
        $sentenciaExistencia = $base_de_datos->prepare("UPDATE inventario SET stock = stock + ? WHERE codigoproduc = ?;");
        $sentenciaEntrada = $base_de_datos->prepare("UPDATE inventario SET entradas = entradas + ? WHERE codigoproduc = ?;");

        foreach ($_SESSION["carrito"] as $producto) {
            //$total += $producto->total;
            $sentencia->execute([$producto->idinventario, $folio_entrada, $producto->cantidad, $producto->observaciones]);
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