<?php
    session_start();
    include_once "../models/conexion.php";
    include_once "../models/login.php";
    include_once "./procesos.php";

    if(isset($_POST['acclogin']))
    {   
        $user = $_POST['user'];
        $passw = $_POST['passw'];
        AccesoLogin($user,$passw);
    }elseif(isset($_POST['recuperar_clave'])){
        $user = $_POST['user'];
        OlvideClave($user);
        
    }elseif(isset($_POST['cambio_clave_token'])){
        $user = $_POST['user'];
        $token_ = $_POST['token'];
        $clave1 = $_POST['clave1'];
        $clave2 = $_POST['clave2'];
        cambioClave($user,$token_,$clave1,$clave2);
    }else{
        //echo header("Location:../index.php");
        echo "<script>window.location='../index.php'</script>";
    }

?>