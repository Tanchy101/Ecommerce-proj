<?php 

include "Config.php";

if (isset($_POST["postCheck"])){


    // Product
    $deleteID = [];
    if(isset($_POST["idDelete"])){
    $deleteID = ($_POST["idDelete"]);
    }

    $idImplode = implode(",", $deleteID);

    for ($idx = 0; $idx < count($deleteID); $idx++){

        $sql = "DELETE FROM `adminstock` WHERE `id` IN ($idImplode)";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }   

        $sql = "ALTER TABLE adminstock AUTO_INCREMENT = 1;";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }

        $sql = "ALTER TABLE adminstockvariant AUTO_INCREMENT = 1;";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }

    // Variation
    $deleteID = [];
    if(isset($_POST["var_idDelete"])){
        $deleteID = ($_POST["var_idDelete"]);

        $idImplode = implode(",", $deleteID);

        for ($idx = 0; $idx < count($deleteID); $idx++){

            $sql = "DELETE FROM `adminstockvariant` WHERE `id` IN ($idImplode)";

            if ($conn->query($sql) == TRUE){

            }
            else{

            }
        }   

            $sql = "ALTER TABLE adminstockvariant AUTO_INCREMENT = 1;";

            if ($conn->query($sql) == TRUE){

            }
            else{

            }
    }
}



// READ PRODUCTS
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
        <title> Welcome to Admin Main Page: Delete Products! </title>
</head>

<body style = "background-color: #ffedc0">
<img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
<br>
<h1> Admin </h1>
<h2>Welcome to the Admin Page: Delete Products!</h2>
<br>
<center> <h1>All PRODUCTS</h1> </center>
<fieldset>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <?php
        for($idx = 0; $idx < count($id); $idx++){
            echo "<h3>" . $products[$idx] . "</h3>";
            echo "<input type='checkbox' name='idDelete[$idx]' value='$id[$idx]'>";
            echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $description[$idx] . " " . $picture[$idx];
            echo "<h4>Variations</h4>";
            for ($i = 0; $i < count($var_id); $i++){
                if($id[$idx] == $product_id[$i]){
                    echo "<input type='checkbox' name='var_idDelete[$idx]' value='$var_id[$idx]'>";
                    echo $var_id[$i] . " " . $variation[$i] . " " . $price[$i] . " " . $stock[$i]; 
                }
            }
            echo "<br>";
            echo "<br>";
        }
        ?>
        <input type='hidden' name='postCheck' value='1'>
        <br>
        <center> <input type="submit" value="DELETE"> </center>
    </form>
    </fieldset>
</body>


</html>

