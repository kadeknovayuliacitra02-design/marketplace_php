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
    echo "error:" . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update product</title>
</head>
<body>
    <h2>update product </h2>
    <a href="../index.php">back to product list</a>
    <br><br>

    <?php if (count($row) > 0) : ?>
        <form action="../controller/update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="product_name">product name</label>
        <input type="text" name="product_name" value="<?php echo  $row ['product_name']; ?>" required><br>
        <label for="price">price</label>
        <input type="text" name="price" value="<?php echo $row ['price']; ?>" required><br>
        <label for="quantity">quantity</label>
        <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>
        <input type="submit" value="upadate product">
        </form>
        <?php else: ?>
            <p>data not found</p>
            <?php endif; ?>

</body>
</html>