<?php 

include "Config.php";

session_start();

if(isset($_POST["editType"])){
    $editType = $_POST["editType"];

   
    if($editType == "Product"){

        $editProduct_ID = $_POST["product_id"];
        $editCategories = $_POST["editCategories"];
        $editProduct = $_POST["editProduct"];
        $editDescription = $_POST["editDescription"];
        $editPicture = $_POST["editPicture"];

        $sql = "UPDATE `adminstock` SET `categories`='$editCategories', products = '$editProduct', description='$editDescription', picture='$editPicture' WHERE `id`=$editProduct_ID;";
        if ($conn->query($sql) === TRUE) {
           header("Location: adminEditProducts.php");

        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
    }
    else if($editType == "Variation"){

        $editVar_ID = $_POST["var_id"];
        $editVariation = $_POST["editVariation"];
        $editPrice = $_POST["editPrice"];
        $editStock = $_POST["editStock"];

        $sql = "UPDATE `adminstockvariant` SET `variation`='$editVariation', price = '$editPrice', stock='$editStock' WHERE `id`='$editVar_ID';";
        if ($conn->query($sql) === TRUE) {
           header("Location: adminEditProducts.php");
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }



    }
}

$editOption = "";
if(isset($_POST["editProducts"])){
    $editID = $_POST["editProducts"];
    $sql = "SELECT * FROM `adminstock` WHERE id='$editID'";
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

    $editOption = "Product";

}
else if(isset($_POST["editVariant"])){

    $editID = $_POST["editVariant"];
    $sql = "SELECT * FROM `adminstockvariant` WHERE id='$editID'";
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

    $editOption = "Variation";

}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Edit Products</title>
        <style>
            head, body{
                font-family: monospace;
            }
            @media screen and (min-width:430px) {
                fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
                 font-size: 15px;
                }
                fieldset{
                width: 80%;
                min-width: 320px;
                margin: auto;
                }

        </style>
    </head>

    <body style = "background-color: #ffedc0">
    <a href="adminMainPage.php"><img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left"></a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php 
    if ($editOption == "Product"){
        echo "<h1>Edit Product</h1>";
        echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>";
        echo "Categories: ";
        echo "<select name='editCategories' required>";
        echo "<option value='$categories[0]'>$categories[0]</option>";
        echo "<option value='Papers'>Papers</option>";
        echo "<option value='Pencils'>Pencils</option>";
        echo "<option value='Ballpens'>Ballpens</option>";
        echo "<option value='Markers'>Markers</option>";
        echo "<option value='Arts/Crafts'>Arts and Crafts</option>";
        echo "<option value='Erasers'>Erasers</option>";
        echo "<option value='Notebooks'>Notebooks</option>";
        echo "<option value='Journals'>Journals</option>";
        echo "<option value='Planners'>Planners</option>";
        echo "<option value='Office Supplies'>Office Supplies</option>";
        echo "<option value='Books'>Books</option>";
        echo "<option value='Measuring Tools'>Measuring Tools</option>";
        echo "<option value='Pouches'>Pouches</option>";
        echo "<option value='Bags'>Bags</option>";
        echo "</select>";
        echo "<br>";
        echo "Name: ";
        echo "<input type = 'text' name = 'editProduct' value = '$products[0]' required>";
        echo "<br>";
        echo "Description: ";
        echo "<textarea name='editDescription' rows='10' cols='30' required>$description[0]</textarea>";
        echo "<br>";
        echo "Picture: ";
        echo "<input type = 'text' name = 'editPicture' value = '$picture[0]' required>";
        echo "<br>";
        echo "<input type='hidden' name='product_id' value='$id[0]'>";
        echo "<input type='hidden' name='editType' value='Product'>";
        echo "<input type='submit' value='EDIT'>";
    }

    else if($editOption == "Variation"){
        
        echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>";
        echo "<h1>Edit Variation</h1>";
        echo "Variation: ";
        echo "<input type='text' name='editVariation' value='$variation[0]' required>";
        echo "<br>";
        echo "Price: ";
        echo "<input type='number' name='editPrice' value='$price[0]' min='0' required>";
        echo "<br>";
        echo "Stock: ";
        echo "<input type='number' name='editStock' value='$stock[0]' min='0' required>"; 
        echo "<br>";
        echo "<br>";
        echo "<input type='hidden' name='var_id' value='$var_id[0]'>";
        echo "<input type='hidden' name='editType' value='Variation'>";
        echo "<input type='submit' value ='EDIT'>";
    }


    ?>

    </body>
</html>
