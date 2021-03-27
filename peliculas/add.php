<?php
include '../helpers/utilities.php';
include 'serviceSession.php';

if(isset($_POST["Nombre-Peli"]) && isset($_POST["Descripcion-Peli"]) && isset($_POST["Genero-Peli"]) && isset($_POST["Peli-Active"])){

    $arraypelicula = ["Nombre-Peli"=>$_POST["Nombre-Peli"],"Descripcion-Peli"=>$_POST["Descripcion-Peli"], "Genero-Peli"=>$_POST["Genero-Peli"], "Peli-Active"=>$_POST["Peli-Active"]];
header("Location: ../index.php");

Add($arraypelicula);

        header("Location: ../index.php");
    }

?>