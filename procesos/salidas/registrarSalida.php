<?php

    session_start();

    //$total = $_POST["total"];
    include_once "../../clases/base_de_datos.php";
if(!empty($_SESSION["salidas"])){ 

    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $ahora = date("Y-m-d");
    $iduser=$_SESSION['iduser'];
    $tiposalida = $_POST["tipo_salida"];
    $observacion = $_POST["observaciones_salida"];

    $sentencia = $base_de_datos->prepare("INSERT INTO salida(fecha, idusuario, tipo_salida) VALUES (?, ?, ?);");
    $sentencia->execute([$ahora, $iduser, $tiposalida]);

    $sentencia = $base_de_datos->prepare("SELECT folio_salida FROM salida ORDER BY folio_salida DESC LIMIT 1;");
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $folio_salida = $resultado === false ? 1 : $resultado->folio_salida;

    $base_de_datos->beginTransaction();
    $sentencia = $base_de_datos->prepare("INSERT INTO detalle_salida(idinventario, folio_salida, cantidad, observaciones, lote_producto) VALUES (?, ?, ?, ?, ?);");
    $sentenciaExistencia = $base_de_datos->prepare("UPDATE inventario SET stock = stock - ? WHERE codigoproduc = ?;");
    $sentenciaSalida = $base_de_datos->prepare("UPDATE inventario SET salidas = salidas + ? WHERE codigoproduc = ?;");
    $sentenciaContador = $base_de_datos->prepare("UPDATE detalle_entrada SET contador = contador - ? WHERE idinventario = ? AND lote_producto = ?;");

    foreach ($_SESSION["salidas"] as $producto) {
        //$total += $producto->total;
        $sentencia->execute([$producto->idinventario, $folio_salida, $producto->cantidad, $observacion, $producto->lote_producto]);
        $sentenciaExistencia->execute([$producto->cantidad, $producto->codigoproduc]);
        $sentenciaSalida->execute([$producto->cantidad, $producto->codigoproduc]);
        $sentenciaContador->execute([$producto->cantidad, $producto->idinventario, $producto->lote_producto]);
    }

    $base_de_datos->commit();
    unset($_SESSION["salidas"]);
    $_SESSION["salidas"] = [];
    header("Location: ../../salida-new.php?status=1");
}else{
    header("Location: ../../salida-new.php?status=5");
}
?>