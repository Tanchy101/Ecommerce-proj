<?php

include "Config.php";

// Insert

if (isset($_POST["postCheck"]))
{
    $addCategories = $_POST["categories"];
    $addProducts = $_POST["products"];
    $addVariations = $_POST["variations"];
    $addPrice = $_POST["price"];
    $addQuantity = $_POST["quantity"];
    $addDescription = $_POST["description"];


    $sql = "INSERT INTO adminstock (categories, products, variations, price, quantity, description)
    VALUES ('" . $addCategories . "', '" . $addProducts . "', '" . $addVariations . "', '" . $addPrice . "', '" . $addQuantity . "', '" . $addDescription . "'". ");";

    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Get Data from Database for Print out
$sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $variants = [];
    $price = [];
    $quantity = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $variations[$idx] = $row["variations"];
            $price[$idx] = $row["price"];
            $quantity[$idx] = $row["quantity"];
            $idx++;
        }
    }
    else{
        echo "0 results";
    }


?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
        for($idx = 0; $idx < count($id); $idx++){
        echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $variations[$idx] . " " . $price[$idx] . " " . $quantity[$idx];
        echo "<br>";
        }
    ?>

<h4>Insert a Product</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="categories">Category: </label>
    <select name="categories" required>
        <option value="Papers">Papers</option>
        <option value="Pencils">Pencils</option>
        <option value="Ballpens">Ballpens</option>
        <option value="Markers">Markers</option>
        <option value="Arts and Crafts">Arts and Crafts</option>
        <option value="Erasers">Erasers</option>
        <option value="Notebooks">Notebooks</option>
        <option value="Journals">Journals</option>
        <option value="Planners">Planners</option>
        <option value="Office Supplies">Office Supplies</option>
        <option value="Books">Books</option>
        <option value="Measuring Tools">Measuring Tools</option>
        <option value="Pouches">Pouches</option>
        <option value="Bags">Bags</option>
    </select>
    <br>
    <label for="products">Product:</label>
    <input type="text" name="products" required>
    <br>
    <label for="variations">Variation:</label>
    <input type="text" name="variations" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" rows="10" cols="30" required></textarea>
    <br>
    <input type='hidden' name='postCheck' value='1'>
    <input type="submit" value="CREATE">
</form>

</body>

</html>
