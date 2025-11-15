<?php
include("../config/db.php");

$id = $_GET["id"];

try {
$stmt = $conn->prepare("SELECT * FROM products WHERE id =:id");
$stmt->bindParam(":id", $id);
$stmt->execute();

$row = [];
if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "error:". $e->getMessage();
}
$conn=null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete product</title>
</head>
<body>
    <h2>Delete product</h2>
    <a href="../index.php">back to product list</a>

    <?php if (count($row) > 0) : ?>
        <p>are you sure want to delete the following product?</p>
        <table>
            <tr>
                <td>ID:</td>
                <td><?php echo $row['id']; ?></td>
            </tr>
            <tr>
                <td>Product Name:</td>
                <td><?php echo $row['product_name']; ?></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><?php echo $row['price']; ?></td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
        </table>
        <form action="../controller/delete.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="delete product">
        </form>
        <?php else : ?>
            <p>0 result</p>
            <?php endif; ?>
</body>
</html>