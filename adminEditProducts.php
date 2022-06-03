<?php
include "Config.php";

if(isset($_POST["update"]))
{
    $changePrice = $_POST["price"];
    $changeQuantity = $_POST["quantity"];

    
}

$sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $variants = [];
    $price = [];
    $quantity = [];
    $description = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $variations[$idx] = $row["variations"];
            $price[$idx] = $row["price"];
            $quantity[$idx] = $row["quantity"];
            $description[$idx] = $row["description"];
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
    <body style = "background-color: #ffedc0">
    <h1>LIST OF PRODUCTS</h1>
    <?php
        for($idx = 0; $idx < count($id); $idx++){
        echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $variations[$idx] . " " . $price[$idx] . " " . $quantity[$idx];
        echo "<br>";
        }
    ?>
    <br>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for = "products">Enter Product's ID</label>
        <input type="number" name="products" required>
        <br>
        <br>
        <label for = "price">New Price</label>
        <input type="number" name="price">
        <br>
        <br>
        <label for = "quantity">New Quantity</label>
        <input type="number" name="quantity"> 
        <br>
        <br>
        <input type="submit" name= "update" value="UPDATE">

    </form>
</body>

</html>