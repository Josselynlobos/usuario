<?php

session_start();

require 'config/database.php';


$id = $conn->real_escape_string($_POST["id"]);
$nombres = $conn->real_escape_string($_POST["nombres"]);
$apellidos = $conn->real_escape_string($_POST["apellidos"]);
$correo = $conn->real_escape_string($_POST["correo"]);
$dni = $conn->real_escape_string($_POST["dni"]);
$celular = $conn->real_escape_string($_POST["celular"]);
$fecha_nac = $conn->real_escape_string($_POST["fecha_nac"]);



$sql = "INSERT INTO usuario (id_usuario, nombre, apellidos, correo, dni, celular, fecha_nacimiento)
VALUES ('$id','$nombres','$apellidos','$correo','$dni', '$celular', '$fecha_nac')";
if ($conn->query($sql)) {
    $id = $conn->insert_id;

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro guardado";

   
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al guarda imágen";
}

header('Location: index.php');
