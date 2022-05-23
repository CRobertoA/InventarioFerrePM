<?php
    class marcas {
        public function registroMarca($datos){
            $c= new conectar();
            $conexion= $c->conexion();

            $sql="INSERT into marca (nombre)
                                values ('$datos')";

            return mysqli_query($conexion,$sql);
        }
    }
?>