<?php
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
  header("location: ../index.php");
}
include("db.php");
$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if(isset($_POST["update"]) && !empty($_POST["update"]) ){
  if(
    !isset($_POST["name"]) || empty($_POST["name"]) ||
    !isset($_POST["price"]) || empty($_POST["price"]) ||
    !isset($_POST["stock"]) || empty($_POST["stock"]) 
){
    die("Ingrese todos los datos");
}

$sql = "UPDATE productos SET nombre='$_POST[name]',precio=$_POST[price],existencia=$_POST[stock] WHERE id=$_POST[id]";
if ($conn->query($sql) === TRUE) {
    echo "Se agrego exitosamente el registro";
    header("location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  header("location: ../index.php");
}

$sql = "SELECT * FROM productos WHERE id=$_POST[id]";
$result = $conn->query($sql);
$data;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $data = $row;
    }
  }else{
    $conn->close();
    header("location: ../index.php");
  }
  $conn->close();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>CRUD</title>
</head>
<body>
  <div class="container mt-5">
    <div class="text-center">
      <h1>EDITAR PRODUCTOS</h1>
    </div>
    <form action="update.php" method="post">
    <input type="hidden" name="update" class="form-control" value="01" />
    <input type="hidden" name="id" class="form-control" value="<?php echo $data["id"]; ?>" />
      <div class="row mt-2">
        <div class="col">
          <input type="text" name="name" class="form-control" value="<?php echo $data["nombre"]; ?>" placeholder="Nombre del producto" />
        </div>
        <div class="col">
          <input type="text" name="price" class="form-control" value="<?php echo $data["precio"]; ?>" placeholder="Precio del producto" />
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input type="text" name="stock" class="form-control " value="<?php echo $data["existencia"]; ?>" placeholder="Existencia del producto" />
        </div>
        <div class="col">
          <input type="submit" class="btn btn-primary btn-block" value="Editar" />
        </div>
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
    integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
    crossorigin="anonymous"></script>

</body>

</html>