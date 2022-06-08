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
                width: 80%;
                min-width: 320px;
                margin: auto;
            }
            #main{
                margin-left: auto;
                margin-right: auto;
                border: 1px solid black;
                font-family: Arial, Helvetica, sans-serif;
                width:50%;
            }

            .btn-group input {
            background-color: #d3a35d;
            border: 1px solid black;
            color: white; /* White text */
            padding: 10px 24px; /* Some padding */
            cursor: pointer; /* Pointer/hand icon */
            float: left; /* Float the buttons side by side */
            }

            /* Clear floats (clearfix hack) */
            .btn-group:after {
            content: "";
            clear: both;
            display: table;
            }

            .btn-group input:not(:last-child) {
            border-right: none; /* Prevent double borders */
            }

            tr:nth-child(even){background-color: #f2f2f2;}
            tr:nth-child(odd){background-color: #fff;}

            td{
                border: 1px solid #ddd;
                text-align: center;
            }
            #product{
                padding-top: 12px;
                padding-bottom: 12px;
                background-color: #d3a35d;
                color: white;
                text-align: center;
            }
            #category{
                padding: 12px;
                text-align: center;
                font-weight: bold;
            }
            #variation{
                background-color: #d3a35d;
                color: white;
                text-align: center;
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="btn-group" style="width:100%">
  <input type="submit" name="Papers" value="Papers" style="width:10%">
  <input type="submit" name="Pencils" value="Pencils" style="width:10%">
  <input type="submit" name="Ballpens" value="Ballpens" style="width:10%">
  <input type="submit" name="Markers" value="Markers" style="width:10%">
  <input type="submit" name="Arts and Crafts" value="Arts and Crafts" style="width:10%">
  <input type="submit" name="Erasers" value="Erasers" style="width:10%">
  <input type="submit" name="Notebooks" value="Notebooks" style="width:10%">
  <input type="submit" name="Journals" value="Journals" style="width:10%">
  <input type="submit" name="Planners" value="Planners" style="width:10%">
  <input type="submit" name="Office Supplies" value="Office Supplies" style="width:10%">
</form>
<br>
<fieldset>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
         <?php
        for($idx = 0; $idx < count($id); $idx++){
        echo "<table id='main'>";
        echo "<tr>";
        echo "<th id = 'product' colspan = '5'><h3>" . $products[$idx] . "</h3></th>";
        echo "</tr>";
        echo "<tr id = 'category'>";
        echo "<td>*</td><td>ID</td><td>Category</td><td>Description</td><td>Picture</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>"; 
        echo "<input type='checkbox' name='idDelete[$idx]' value='$id[$idx]'></td>";
        echo "<td>$id[$idx]</td><td>$categories[$idx]</td><td>$description[$idx]</td><td><img width='220px' src='$picture[$idx]'</td>";
        echo "</tr>";
        echo "<br>";
        echo "<tr>";
        echo "<th id = 'variation' colspan = '5'><h4>Variations</h4></th>";
        echo "<tr id = 'category'>";
        echo "<td>*</td><td>ID</td><td>Variation</td><td>Price</td><td>Stock</td>";
        echo "</tr>";
            for($i = 0; $i < count($var_id); $i++){
                if ($id[$idx] == $product_id[$i]){
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='var_idDelete[$idx]' value='$var_id[$idx]'></td>";
                    echo "<td>" . $var_id[$i] . "</td><td>" . $variation[$i] . "</td><td>"  . $price[$i] . "</td><td>" . $stock[$i] . "</td>";
                    echo "</tr>";
                }
            }
        echo "</table>";
        }
    ?>
        <input type='hidden' name='postCheck' value='1'>
        <br>
        <center> <input type="submit" value="DELETE"> </center>
    </form>
    </fieldset>
</body>


</html>

