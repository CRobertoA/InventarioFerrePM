<?php 

    require_once "../clases/Conexion.php";
    $c= new conectar();
    $conexion= $c->conexion();
    $consulta="SELECT * from marca";
    $ejecutar=mysqli_query($conexion, $consulta);

?>
<label for="producto_marca" class="bmd-label-floating">Marca</label>
<select class="form-control" name="producto_marca" id="producto_marca" onchange="ShowSelected();">
<option value="A" selected="">Seleccione una marca</option>
    <?php foreach ($ejecutar as $opciones): ?>
        <option value="<?php echo $opciones['idmarca'] ?>"><?php echo $opciones['nombre'] ?></option>
    <?php endforeach ?>
</select>