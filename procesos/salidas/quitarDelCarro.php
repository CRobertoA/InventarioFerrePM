<?php
    if(!isset($_GET["indice"])) return;
    $indice = $_GET["indice"];

    session_start();
    array_splice($_SESSION["salidas"], $indice, 1);
    header("Location: ../../salida-new.php");
?>