<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
</head>
<body>
    <h2>Create Product</h2>
    <a href="../index.php">back to product list</a>
    <br><br>

    <form action="../controller/create.php" method="post">
        <label for="product_name">product Name:</label>
        <input type="text" name="product_name" required><br>
        <label for="price" >price:</label>
        <input type="text" name="price" required><br>
        <label for="quantity">quantity:</label>
        <input type="text" name="quantity" required><br>
        <input type="submit" value="add product">
    </form>
</body>
</html>