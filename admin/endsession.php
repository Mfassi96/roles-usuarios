<?php
include('../conexion.php');
session_start();

if(session_id()!=""){
    session_destroy();
    header('Location:index.php');

}


?>