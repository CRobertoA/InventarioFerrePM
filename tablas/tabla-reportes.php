<?php 

    require_once "../clases/Conexion.php";
    $c= new conectar();
    $conexion= $c->conexion();
    $sql="SELECT P.codigoproduc, P.nombreproducto, I.stock, I.entradas, I.salidas FROM inventario I INNER JOIN producto P ON I.codigoproduc = P.codigoproduc order by I.idinventario; ";
	$resultI= mysqli_query($conexion, $sql);

?>

<!--tabla para listar el inventario -->
<table class="table table-dark table-sm" id="tablainventario">
		<thead>
		<tr class="text-center roboto-medium">
			<th>CODIGO</th>
			<th>PRODUCTO</th>
			<th>STOCK ACTUAL</th>
			<th>ENTRADAS</th>
			<th>SALIDAS</th>
		</tr>
	</thead>
	<tbody>
		<!-- while para listar los datos de la bd -->
		<?php
			while($ver=mysqli_fetch_row($resultI)):
		?>
		<tr class="text-center" >
			<td><?php echo $ver[0] ?></td>
			<td><?php echo $ver[1] ?></td>
			<td><?php echo $ver[2] ?></td>
			<td><?php echo $ver[3] ?></td>
			<td><?php echo $ver[4] ?></td>
		</tr>
		<?php
			endwhile;
		?>
	</tbody>
</table>