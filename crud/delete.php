<?php
//conexão com db
include("config.php");


$id = $_GET['id'];

//deleta linha comid especifico
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

//redireciona para home
header("Location:../index.html");
?>

