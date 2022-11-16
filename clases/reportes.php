<?php

    require '../vendor/autoload.php';
    require 'Conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $tipoReporte = $_POST['selectTipoReporte'];
    $marcaid = $_POST['selectMarcaR'];
    $fechaIniRe = $_POST['Fecha_inicioR'];
    $fechaFinRe = $_POST['Fecha_finalR'];
    $c= new conectar();
    $conexion= $c->conexion();

    if($tipoReporte=="A") {
        header("Location: ../generar-reporte.php?status=4");
        exit;
    } else{
        if($tipoReporte == 1){
            $sql = "SELECT P.codigoproduc, M.nombre, P.nombreproducto, P.modelo, P.descripcion, P.stockminimo, P.stockmaximo, I.stock, P.preciocompra, P.presentacion
                    FROM producto P INNER JOIN marca M ON P.idmarca = M.idmarca 
                    INNER JOIN inventario I ON P.codigoproduc = I.codigoproduc 
                    WHERE I.stock <= P.stockminimo order by substring(P.codigoproduc, 6); ";
            $resultado = mysqli_query($conexion, $sql);
            $spreadsheet= new Spreadsheet();
            $spreadsheet->getProperties()->setCreator("Mi Gran Central Ferretera")->setTitle("Reporte de productos con stock minimo");

            //$spreadsheet->setActiveSheetIndex(0);
            $hojaActiva = $spreadsheet->getActiveSheet();

            $hojaActiva->setCellValue('A1','CODIGO PRODUCTO');
            $hojaActiva->setCellValue('B1','MARCA');
            $hojaActiva->setCellValue('C1','NOMBRE PRODUCTO');
            $hojaActiva->setCellValue('D1','MODELO');
            $hojaActiva->setCellValue('E1','DESCRIPCION');
            $hojaActiva->setCellValue('F1','STOCK MINIMO');
            $hojaActiva->setCellValue('G1','STOCK MAXIMO');
            $hojaActiva->setCellValue('H1','STOCK ACTUAL');
            $hojaActiva->setCellValue('I1','PRECIO COMPRA');
            $hojaActiva->setCellValue('J1','PRESENTACION');

            $hojaActiva->getColumnDimension('A')->setWidth(20);
            $hojaActiva->getColumnDimension('B')->setWidth(20);
            $hojaActiva->getColumnDimension('C')->setWidth(20);
            $hojaActiva->getColumnDimension('D')->setWidth(15);
            $hojaActiva->getColumnDimension('E')->setWidth(30);
            $hojaActiva->getColumnDimension('F')->setWidth(15);
            $hojaActiva->getColumnDimension('G')->setWidth(15);
            $hojaActiva->getColumnDimension('H')->setWidth(15);
            $hojaActiva->getColumnDimension('I')->setWidth(20);
            $hojaActiva->getColumnDimension('J')->setWidth(20);

            $fila=2;
            while($rows = $resultado->fetch_assoc()){
                $hojaActiva->setCellValue('A'.$fila, $rows['codigoproduc']);
                $hojaActiva->setCellValue('B'.$fila, $rows['nombre']);
                $hojaActiva->setCellValue('C'.$fila, $rows['nombreproducto']);
                $hojaActiva->setCellValue('D'.$fila, $rows['modelo']);
                $hojaActiva->setCellValue('E'.$fila, $rows['descripcion']);
                $hojaActiva->setCellValue('F'.$fila, $rows['stockminimo']);
                $hojaActiva->setCellValue('G'.$fila, $rows['stockmaximo']);
                $hojaActiva->setCellValue('H'.$fila, $rows['stock']);
                $hojaActiva->setCellValue('I'.$fila, $rows['preciocompra']);
                $hojaActiva->setCellValue('J'.$fila, $rows['presentacion']);
                $fila++;
            }
            // redirect output to client browser
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Reporte de productos con stock minimo.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
        } else if($tipoReporte == 2){
            if($marcaid=="A") {
                header("Location: ../generar-reporte.php?status=2");
                exit;
            } else{
                if($marcaid==0){
                    $sql = "SELECT P.codigoproduc, M.nombre, P.nombreproducto, P.modelo, P.descripcion, P.stockminimo, P.stockmaximo, P.preciocompra, P.presentacion
                            FROM producto P INNER JOIN marca M ON P.idmarca = M.idmarca order by substring(P.codigoproduc, 6); ";
                    $resultado = mysqli_query($conexion, $sql);
                } else {
                    $sql = "SELECT P.codigoproduc, M.nombre, P.nombreproducto, P.modelo, P.descripcion, P.stockminimo, P.stockmaximo, P.preciocompra, P.presentacion
                            FROM producto P INNER JOIN marca M ON P.idmarca = M.idmarca WHERE P.idmarca = '$marcaid'
                            order by substring(P.codigoproduc, 6); ";
                    $resultado = mysqli_query($conexion, $sql);
                }
                $spreadsheet= new Spreadsheet();
                $spreadsheet->getProperties()->setCreator("Mi Gran Central Ferretera")->setTitle("Reporte de productos");

                //$spreadsheet->setActiveSheetIndex(0);
                $hojaActiva = $spreadsheet->getActiveSheet();

                $hojaActiva->setCellValue('A1','CODIGO PRODUCTO');
                $hojaActiva->setCellValue('B1','MARCA');
                $hojaActiva->setCellValue('C1','NOMBRE PRODUCTO');
                $hojaActiva->setCellValue('D1','MODELO');
                $hojaActiva->setCellValue('E1','DESCRIPCION');
                $hojaActiva->setCellValue('F1','STOCK MINIMO');
                $hojaActiva->setCellValue('G1','STOCK MAXIMO');
                $hojaActiva->setCellValue('H1','PRECIO COMPRA');
                $hojaActiva->setCellValue('I1','PRESENTACION');

                $hojaActiva->getColumnDimension('A')->setWidth(20);
                $hojaActiva->getColumnDimension('B')->setWidth(20);
                $hojaActiva->getColumnDimension('C')->setWidth(20);
                $hojaActiva->getColumnDimension('D')->setWidth(15);
                $hojaActiva->getColumnDimension('E')->setWidth(30);
                $hojaActiva->getColumnDimension('F')->setWidth(15);
                $hojaActiva->getColumnDimension('G')->setWidth(15);
                $hojaActiva->getColumnDimension('H')->setWidth(20);
                $hojaActiva->getColumnDimension('I')->setWidth(20);

                $fila=2;
                while($rows = $resultado->fetch_assoc()){
                    $hojaActiva->setCellValue('A'.$fila, $rows['codigoproduc']);
                    $hojaActiva->setCellValue('B'.$fila, $rows['nombre']);
                    $hojaActiva->setCellValue('C'.$fila, $rows['nombreproducto']);
                    $hojaActiva->setCellValue('D'.$fila, $rows['modelo']);
                    $hojaActiva->setCellValue('E'.$fila, $rows['descripcion']);
                    $hojaActiva->setCellValue('F'.$fila, $rows['stockminimo']);
                    $hojaActiva->setCellValue('G'.$fila, $rows['stockmaximo']);
                    $hojaActiva->setCellValue('H'.$fila, $rows['preciocompra']);
                    $hojaActiva->setCellValue('I'.$fila, $rows['presentacion']);
                    $fila++;
                }
                // redirect output to client browser
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Reporte de productos.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
            }
        } else if($tipoReporte == 3){
            if($fechaIniRe == NULL || $fechaFinRe == NULL) {
                header("Location: ../generar-reporte.php?status=3");
                exit;
            } else{
                $sql = "SELECT E.folio_entrada, E.fecha, U.nombre, E.tipo_entrada, E.folio_compra, D.cantidad, I.codigoproduc, P.nombreproducto 
                        FROM entrada E INNER JOIN detalle_entrada D ON E.folio_entrada = D.folio_entrada
                        INNER JOIN inventario I ON D.idinventario = I.idinventario
                        INNER JOIN producto P ON I.codigoproduc = P.codigoproduc
                        INNER JOIN usuario U ON E.idusuario = U.idusuario
                        WHERE fecha BETWEEN '$fechaIniRe' AND '$fechaFinRe';";
                $resultado = mysqli_query($conexion, $sql);

                $spreadsheet= new Spreadsheet();
                $spreadsheet->getProperties()->setCreator("Mi Gran Central Ferretera")->setTitle("Reporte de entradas");

                //$spreadsheet->setActiveSheetIndex(0);
                $hojaActiva = $spreadsheet->getActiveSheet();

                $hojaActiva->setCellValue('A1','FOLIO ENTRADA');
                $hojaActiva->setCellValue('B1','FECHA');
                $hojaActiva->setCellValue('C1','USUARIO');
                $hojaActiva->setCellValue('D1','TIPO ENTRADA');
                $hojaActiva->setCellValue('E1','FOLIO COMPRA/SALIDA');
                $hojaActiva->setCellValue('F1','CANTIDAD');
                $hojaActiva->setCellValue('G1','CODIGO PRODUCTO');
                $hojaActiva->setCellValue('H1','NOMBRE PRODUCTO');

                $hojaActiva->getColumnDimension('A')->setWidth(15);
                $hojaActiva->getColumnDimension('B')->setWidth(15);
                $hojaActiva->getColumnDimension('C')->setWidth(15);
                $hojaActiva->getColumnDimension('D')->setWidth(15);
                $hojaActiva->getColumnDimension('E')->setWidth(22);
                $hojaActiva->getColumnDimension('F')->setWidth(15);
                $hojaActiva->getColumnDimension('G')->setWidth(20);
                $hojaActiva->getColumnDimension('H')->setWidth(20);

                $fila=2;
                while($rows = $resultado->fetch_assoc()){
                    $hojaActiva->setCellValue('A'.$fila, $rows['folio_entrada']);
                    $hojaActiva->setCellValue('B'.$fila, $rows['fecha']);
                    $hojaActiva->setCellValue('C'.$fila, $rows['nombre']);
                    $hojaActiva->setCellValue('D'.$fila, $rows['tipo_entrada']);
                    $hojaActiva->setCellValue('E'.$fila, $rows['folio_compra']);
                    $hojaActiva->setCellValue('F'.$fila, $rows['cantidad']);
                    $hojaActiva->setCellValue('G'.$fila, $rows['codigoproduc']);
                    $hojaActiva->setCellValue('H'.$fila, $rows['nombreproducto']);
                    $fila++;
                }
                // redirect output to client browser
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Reporte de entradas.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
            }
        } else if($tipoReporte == 4){
            if($fechaIniRe == NULL || $fechaFinRe == NULL) {
                header("Location: ../generar-reporte.php?status=3");
                exit;
            } else{
                $sql = "SELECT S.folio_salida, S.fecha, U.nombre, S.tipo_salida, D.cantidad, I.codigoproduc, P.nombreproducto 
                        FROM salida S INNER JOIN detalle_salida D ON S.folio_salida = D.folio_salida
                        INNER JOIN inventario I ON D.idinventario = I.idinventario
                        INNER JOIN producto P ON I.codigoproduc = P.codigoproduc
                        INNER JOIN usuario U ON S.idusuario = U.idusuario
                        WHERE fecha BETWEEN '$fechaIniRe' AND '$fechaFinRe'; ";
                $resultado = mysqli_query($conexion, $sql);

                $spreadsheet= new Spreadsheet();
                $spreadsheet->getProperties()->setCreator("Mi Gran Central Ferretera")->setTitle("Reporte de salidas");

                //$spreadsheet->setActiveSheetIndex(0);
                $hojaActiva = $spreadsheet->getActiveSheet();

                $hojaActiva->setCellValue('A1','FOLIO SALIDA');
                $hojaActiva->setCellValue('B1','FECHA');
                $hojaActiva->setCellValue('C1','USUARIO');
                $hojaActiva->setCellValue('D1','TIPO SALIDA');
                $hojaActiva->setCellValue('E1','CANTIDAD');
                $hojaActiva->setCellValue('F1','CODIGO PRODUCTO');
                $hojaActiva->setCellValue('G1','NOMBRE PRODUCTO');

                $hojaActiva->getColumnDimension('A')->setWidth(15);
                $hojaActiva->getColumnDimension('B')->setWidth(15);
                $hojaActiva->getColumnDimension('C')->setWidth(15);
                $hojaActiva->getColumnDimension('D')->setWidth(15);
                $hojaActiva->getColumnDimension('E')->setWidth(15);
                $hojaActiva->getColumnDimension('F')->setWidth(20);
                $hojaActiva->getColumnDimension('G')->setWidth(20);

                $fila=2;
                while($rows = $resultado->fetch_assoc()){
                    $hojaActiva->setCellValue('A'.$fila, $rows['folio_salida']);
                    $hojaActiva->setCellValue('B'.$fila, $rows['fecha']);
                    $hojaActiva->setCellValue('C'.$fila, $rows['nombre']);
                    $hojaActiva->setCellValue('D'.$fila, $rows['tipo_salida']);
                    $hojaActiva->setCellValue('E'.$fila, $rows['cantidad']);
                    $hojaActiva->setCellValue('F'.$fila, $rows['codigoproduc']);
                    $hojaActiva->setCellValue('G'.$fila, $rows['nombreproducto']);
                    $fila++;
                }
                // redirect output to client browser
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Reporte de salidas.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
            }
        }
    }
    // redirect output to client browser
    /*header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte Gran Centarl Ferretera.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');*/
    //exit;
    /*$writer = new Xlsx($spreadsheet);
    $writer->save('Mi excel.xlsx');*/

?>