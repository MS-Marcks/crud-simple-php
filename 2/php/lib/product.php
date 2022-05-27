
<?php
 include ("/app/crud-simple-php/2/php/controller/product.php"); 

if($_GET["action"] == "c"){
    if(
        !isset($_POST["name"]) || empty($_POST["name"]) ||
        !isset($_POST["price"]) || empty($_POST["price"]) ||
        !isset($_POST["stock"]) || empty($_POST["stock"]) 
    ){
        die("Ingrese todos los datos");
    }  
    $product2 = new Product();

    if($product2->create($_POST["name"],$_POST["price"],$_POST["stock"]) == "ok"){
        header("location: ../../index.php");
    }else{
        die("Error");
    }
}elseif($_GET["action"] == "u"){
    if(
        !isset($_POST["name"]) || empty($_POST["name"]) ||
        !isset($_POST["price"]) || empty($_POST["price"]) ||
        !isset($_POST["stock"]) || empty($_POST["stock"]) 
    ){
        die("Ingrese todos los datos");
    }

    $product2 = new Product();

    if($product2->update($_POST["id"],$_POST["name"],$_POST["price"],$_POST["stock"]) == "ok"){
        header("location: ../../index.php");
    }else{
        die("Error");
    }
}elseif($_GET["action"] == "d"){
    if(!isset($_POST["id"]) || empty($_POST["id"]) ){
        die("Ingrese todos los datos");
    }
    $product2 = new Product();
    if($product2->delete($_POST["id"]) == "ok"){
        header("location: ../../index.php");
    }else{
        die("Error");
    }    
}else{
    $product1 = new Product();
    $row1 = $product1->get_data_full();
    ?>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Existencia</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    <?php
    foreach($row1 as $row) {
        ?>
            <tr>
                <td>
                <?php echo $row["id"]; ?>
                </td>
                <td>
                <?php echo $row["nombre"]; ?>
                </td>
                <td>
                <?php echo $row["precio"]; ?>
                </td>
                <td>
                <?php echo $row["existencia"]; ?>
                </td>
                <td>
                    <form action="index.php?id=<?php echo $row["id"]; ?>" method="POST">
                        <input type="submit" value="Editar" class="btn btn-warning btn-block">
                    </form>
                </td>
                <td>
                    <form action="php/lib/product.php?action=d" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger btn-block">
                    </form>
                </td>
            </tr>
        <?php
    }
    ?>
    </table>
    <?php
}

?>