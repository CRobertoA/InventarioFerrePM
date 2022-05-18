<?php
    class conectar{
        private $servidor="localhost";
        private $usuario="root";
        private $password="RA16161255";
        private $bd="bdferre";

        public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
    }


?>
