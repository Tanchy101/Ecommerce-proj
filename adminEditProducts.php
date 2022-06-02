<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$databaseName = "admin";
$port = 3306;

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for = "products">Product</label>
        <input type="text" name="products" placeholder="Enter the product" required>
        <br>
        <br>
        <label for = "price">New Price</label>
        <input type="number" name="price" required>
        <br>
        <br>
        <label for = "quantity">New Quantity</label>
        <input type="number" name="quantity" required> 
        <br>
        <br>
        <input type="submit" value="SAVE">

    </form>
</body>

</html>