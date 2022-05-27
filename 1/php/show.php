
<?php
include("db.php");

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
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
    while($row = $result->fetch_assoc()) {
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
                    <form action="php/update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                        <input type="submit" value="Editar" class="btn btn-warning btn-block">
                    </form>
                </td>
                <td>
                    <form action="php/delete.php" method="POST">
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
  $conn->close();
?>