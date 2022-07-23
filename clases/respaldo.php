<?php

    $db_host = 'localhost';
    $db_name = 'bdferre';
    $db_user = 'root';
    $db_pass = 'RA16161255';

    $fecha = date("Ymd-His");
    $salida_sql = $db_name.'_'.$fecha.'_respaldo.sql';

    $dump = "C:/xampp/mysql/bin/mysqldump -h $db_host -u $db_user -p$db_pass --opt $db_name --single-transaction --quick --lock-tables=false -B> $salida_sql";

    system($dump, $output);

    $zip = new ZipArchive();
    $salida_zip = $db_name.'_'.$fecha.'_respaldo.zip';
    if($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true){
        $zip->addFile($salida_sql);
        $zip->close();
        unlink($salida_sql);

        header("Location: $salida_zip");
    }

?>