<?php
$data;
$exist = false;
if(isset($_GET["id"]) && !empty($_GET["id"])){
  include ("php/controller/product.php"); 
  $product1 = new Product();
  $data = $product1->get_data_single($_GET["id"])[0];
  $exist = true;
}

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
      <h1>PRODUCTOS</h1>
    </div>
    <?php if($exist == true){
 ?>
       <form action="php/lib/product.php?action=u" method="post">
      <div class="row mt-2">
      <input type="hidden" name="id" value="<?php echo $data["id"]; ?>" />
        <div class="col">
          <input type="text" name="name" value="<?php echo $data["nombre"]; ?>" class="form-control" placeholder="Nombre del producto" />
        </div>
        <div class="col">
          <input type="text" name="price" value="<?php echo $data["precio"]; ?>"  class="form-control" placeholder="Precio del producto" />
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input type="text" name="stock" value="<?php echo $data["existencia"]; ?>"  class="form-control" placeholder="Existencia del producto" />
        </div>
        <div class="col">
          <input type="submit" class="btn btn-primary btn-block" value="Editar" />
        </div>
      </div>
    </form>
 <?php
    }else{
      ?>
 <form action="php/lib/product.php?action=c" method="post">
      <div class="row mt-2">
        <div class="col">
          <input type="text" name="name" class="form-control" placeholder="Nombre del producto" />
        </div>
        <div class="col">
          <input type="text" name="price" class="form-control" placeholder="Precio del producto" />
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input type="text" name="stock" class="form-control" placeholder="Existencia del producto" />
        </div>
        <div class="col">
          <input type="submit" class="btn btn-primary btn-block" value="Guardar" />
        </div>
      </div>
    </form>
      <?php
    } ?>
   
    <div class="row mt-2">
      <?php
        include("php/lib/product.php");
      ?>
    </div>
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