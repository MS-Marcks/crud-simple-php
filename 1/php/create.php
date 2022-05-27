<?php
include("db.php");

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if(
    !isset($_POST["name"]) || empty($_POST["name"]) ||
    !isset($_POST["price"]) || empty($_POST["price"]) ||
    !isset($_POST["stock"]) || empty($_POST["stock"]) 
){
    die("Ingrese todos los datos");
}

$sql = "INSERT INTO productos(nombre,precio,existencia) VALUES ('$_POST[name]',$_POST[price],$_POST[stock])";
if ($conn->query($sql) === TRUE) {
    echo "Se agrego exitosamente el registro";
    header("location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>