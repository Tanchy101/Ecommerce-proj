<?php 

include "Config.php";

if (isset($_POST["LOW"]))
{


    $sql = "SELECT * FROM `adminstockvariant` ORDER BY sold ASC";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];
    $sold = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $sold[$idx] = $row["sold"];
            $idx++;
        }
    }

    $count = count($var_id);
    $highlow = "subtract";

}
else{

    $count = 1;
    $highlow = "add";
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

        $sql = "SELECT * FROM `adminstockvariant` ORDER BY sold DESC";
        $result = $conn->query($sql);

        $var_id = [];
        $product_id = [];
        $variation = [];
        $price = [];
        $stock = [];
        $sold = [];

        $idx = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $var_id[$idx] = $row["id"];
                $product_id[$idx] = $row["product_id"]; 
                $variation[$idx] = $row["variation"];
                $price[$idx] = $row["price"];
                $stock[$idx] = $row["stock"];
                $sold[$idx] = $row["sold"];
                $idx++;
            }
        }
}


?>

<!DOCTYPE html>
<html>
<head>
    <style>
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
    </style>
</head>

<body>
    <h1>TOP PRODUCTS</H1>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="submit" name="TOP" value="Highest Sold">
    <input type="submit" name="LOW" value="Lowest Sold">
    </form>
<?php
            echo "<table id='main'>";
            echo "<tr id = 'category'>";
            echo "<td>TOP</td><td>Picture</td><td>Category</td><td>Product</td><td>Variation</td><td>Price</td><td>Stock</td><td>Sold</td>";
            echo "</tr>";
            for($i = 0; $i < count($var_id); $i++){

                $sql = "SELECT * FROM `adminstock` WHERE id='$product_id[$i]'";
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

                    echo "<tr>";
                    echo "<td>" . $count . "</td><td><img width='220px' src='$picture[0]'</td><td>$categories[0]</td><td>$products[0]</td>";
                    echo "<td>" . $variation[$i] . "</td><td>"  . $price[$i] . "</td><td>" . $stock[$i] . "</td><td>" . $sold[$i] . "</td>";
                    echo "</tr>";
                    if ($highlow == "add")
                    {
                        $count++;
                    }
                    else
                    {
                        $count--;
                    }
                
            
                }
        echo "<br>";
        echo "</table>";
?>
</body>