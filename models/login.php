<?php
    class Login{
        public function getDataUser($usuario){
            $rows = null;
            $modelo = new ConexionDB();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM usuarios WHERE usuario=:user";
            $stm = $conexion->prepare($sql);
            $stm->bindParam(':user',$usuario);
            $stm->execute();

            while ($result = $stm->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function modificarUser($campo, $valor, $usuario){
            $modelo = new ConexionDB();
            $conexion = $modelo->get_conexion();
            $sql = "UPDATE usuarios SET $campo=:valor WHERE usuario=:user";
            $stm = $conexion->prepare($sql);
            $stm->bindParam(':valor',$valor);
            $stm->bindParam(':user',$usuario);
            if(!$stm){
                return 0;
            }else{
                $stm->execute();
                return 1;
            }
        }
    }
?>