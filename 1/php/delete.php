<?php
include("db.php");

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
    die("Ingrese todos los datos");
}

$sql = "DELETE FROM productos WHERE id =$_POST[id]";
if ($conn->query($sql) === TRUE) {
    echo "Se eliminio exitosamente el registro";
    header("location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close();

?>