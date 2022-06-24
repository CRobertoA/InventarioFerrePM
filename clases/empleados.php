<?php
    class empleados {
        public function registroEmpleado($datos){
            $c= new conectar();
            $conexion= $c->conexion();

            $sqlid="SELECT * FROM empleado where curp= '$datos[0]'";
            $result= mysqli_query($conexion, $sqlid);

            if(mysqli_num_rows($result) > 0){
                return 2;
            }else{
                $estado= 1;
                $sql="INSERT into empleado (curp, 
                                            nombre,
                                            apellidos,
                                            estado,
                                            email)
                                    values ('$datos[0]', '$datos[1]', '$datos[2]', '$estado', '$datos[3]')";

                return mysqli_query($conexion,$sql);
            }
        }

        public function actualizaEmpleado($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $sql= "UPDATE empleado set nombre= '$datos[1]', apellidos= '$datos[2]', email= '$datos[3]' 
                                    where curp= '$datos[0]'";
            echo mysqli_query($conexion,$sql);
        }

        public function desactivarEmpleado($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $estado= 0;

            $sqlDe= "UPDATE empleado set estado= '$estado' 
                                    where curp= '$datos[0]'";       
                                    
            return mysqli_query($conexion,$sqlDe);
        }

        public function activarEmpleado($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $estado= 1;

            $sqlAc= "UPDATE empleado set estado= '$estado' 
                                    where curp= '$datos[0]'";       
                                    
            return mysqli_query($conexion,$sqlAc);
        }
    }
?>