<?php

include "Config.php";

// Insert

if (isset($_POST["postCheck"]))
{
    // Add Product Table Values on Variables
    $addCategories = $_POST["categories"];
    $addProducts = $_POST["products"];
    $addDescription = $_POST["description"];
    $addPicture = $_POST["picture"];

    // Find and Check if product names are the same para variation nalang ilalagay
    $sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $description = [];
    $picture = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $description[$idx] = $row["description"];
            $picture[$idx] = $row["picture"];
            $idx++;
        }
    }

    $notUnique = 0;
    for ($i = 0; $i < count($id); $i++){
        if ($addProducts == $products[$i]){
            // Old product, added new variation
            $addVariation = $_POST["variations"];
            $addPrice = $_POST["price"];
            $addStock = $_POST["stock"];
        
            $sql = "INSERT INTO adminstockvariant (product_id, variation, price, stock)
            VALUES ('" . $id[$i] . "', '" . $addVariation . "', '" . $addPrice . "', '" . $addStock . "');";
        
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $notUnique++;
        }

    }

    // New product and new variation added
    $idAdd = count($id) + 1;
    if($notUnique == 0){
        $sql = "INSERT INTO adminstock (categories, products, description, picture)
        VALUES ('" . $addCategories . "', '" . $addProducts . "', '" . $addDescription . "', '" . $addPicture . "');";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $addVariation = $_POST["variations"];
        $addPrice = $_POST["price"];
        $addStock = $_POST["stock"];
        echo $idAdd;
        $sql = "INSERT INTO adminstockvariant (product_id, variation, price, stock)
        VALUES ('" . $idAdd . "', '" . $addVariation . "', '" . $addPrice . "', '" . $addStock . "');";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



}

// Get Data from Database for Print out
$sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $description = [];
    $picture = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $description[$idx] = $row["description"];
            $picture[$idx] = $row["picture"];
            $idx++;
        }
    }

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
    

?>

<!DOCTYPE html>
<html>

<head>
<title> Admin Create Products </title>
    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    <br>
    <br>
    <h1> The Paper Bag. </h1>
    <h2> Welcome to the Admin Page: Create Products! </h2>
    <br>
</head>

<style>
    head, body {
        font-family: monospace;
        margin: 25px;
    }
    @media screen and (min-width:430px) 
            {
            fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
    }
</style>

<body style = "background-color: #ffedc0">

<body>
    <h1>ALL PRODUCTS</h1>
<fieldset style = "float:right">
    <h2>Insert a Product</h2>
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
    <br>
    <label for="products">Product:</label>
    <input type="text" name="products" required>
    <br>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" rows="10" cols="30" required></textarea>
    <br>
    <br>
    <label for="picture">Picture URL:</label>
    <input type="text" name="picture" required>
    <br>
    <br>
    <h2>Variation</h2>
    <label for="variations">Variation:</label>
    <input type="text" name="variations" required>
    <br>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <br>
    <br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>
    <br>
    <br>
    <input type='hidden' name='postCheck' value='1'>
    <center> <input type="submit" value="CREATE"> </center>
</form>
</fieldset>
<br>
    <?php
        for($idx = 0; $idx < count($id); $idx++){
        echo "<h3>" . $products[$idx] . "</h3>";
        echo $id[$idx] . " " . $categories[$idx]  .  " " . $description[$idx] . " " . $picture[$idx];
        echo "<br>";
        echo "<h4>Variations</h4>";
            for($i = 0; $i < count($var_id); $i++){
                if ($id[$idx] == $product_id[$i]){
                    echo $var_id[$i] . " " . $variation[$i] . " " . $price[$i] . " " . $stock[$i];
                }
            }
        echo "<br>";
        }
    ?>
</body>

</html>
