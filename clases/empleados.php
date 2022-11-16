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
                                            apellidoP,
                                            apellidoM,
                                            estado,
                                            email,
                                            telefono,
                                            callenumero,
                                            colonia,
                                            id_estado,
                                            id_municipio,
                                            id_localidad)
                                    values ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$estado', '$datos[4]',
                                            '$datos[5]', '$datos[6]', '$datos[7]', '$datos[8]', '$datos[9]', '$datos[10]')";

                return mysqli_query($conexion,$sql);
            }
        }

        public function actualizaEmpleado($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $sql= "UPDATE empleado set nombre= '$datos[1]', apellidoP= '$datos[2]', email= '$datos[3]', telefono= '$datos[4]',
                                    callenumero= '$datos[5]', colonia= '$datos[6]', id_estado= '$datos[7]', id_municipio= '$datos[8]',
                                    id_localidad= '$datos[9]'
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