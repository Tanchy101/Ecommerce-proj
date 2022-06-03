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
                 font-weight: bold;
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
    }
    </style>
    <title> Welcome to Admin Main Page: Edit Products </title>
    </head>
    <body style = "background-color: #ffedc0">
    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    <br>
    <h1> Admin </h1>
    <h2> Welcome to the Admin Page: Edit Products! </h2>
    <br>
    <br>
    <h1>LIST OF PRODUCTS</h1>
    <?php
        for($idx = 0; $idx < count($id); $idx++){
        echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $variations[$idx] . " " . $price[$idx] . " " . $quantity[$idx];
        echo "<br>";
        }
    ?>
    <br>
    <br>
    <fieldset>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <br>
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
        <center> <input type="submit" name= "update" value="UPDATE"> </center>
    </fieldset>
    </form>
</body>

</html>