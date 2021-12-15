<?php
    class Rd{ //Rediccionar
        public function Admin(){
            if($_SESSION['tipo'] == 1){
                
            }elseif($_SESSION['tipo'] == 2){
                header('Location:../store/index.php');
            }else{
                header('Location:../../index.php');
            }
        }

        public function Store(){
            if($_SESSION['tipo'] == 2){
                
            }elseif($_SESSION['tipo'] == 1){
                header('Location:../admin/index.php');
            }else{
                header('Location:../../index.php');
            }
        }
    }




?>