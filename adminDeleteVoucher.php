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

        $sql = "DELETE FROM `adminvoucher` WHERE `id` IN ($idImplode)";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }   

        $sql = "ALTER TABLE adminvoucher AUTO_INCREMENT = 1;";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }

$sql = "SELECT * FROM `adminvoucher`";
$result = $conn->query($sql);

$vId = [];
$vName = [];
$vDiscount = [];
$vExpiration = [];

$idx = 0;
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $vId[$idx] = $row["id"];
        $vName[$idx] = $row["name"]; 
        $vDiscount[$idx] = $row["discount"];
        $vExpiration[$idx] = $row["expiration"];
        $idx++;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h3>Delete Vouchers</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php
for($idx = 0; $idx < count($id); $idx++){
        echo "<table>";
        echo "<tr>";
        echo "<th id = 'product' colspan = '4'><h3>" . $products[$idx] . "</h3></th>";
        echo "</tr>";
        echo "<tr id = 'category'>";
        echo "<td>ID</td><td>Category</td><td>Description</td><td>Picture</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$id[$idx]</td><td>$categories[$idx]</td><td>$description[$idx]</td><td><img width='220px' src='$picture[$idx]'</td>";
        echo "</tr>";
        echo "<br>";
        echo "<tr>";
        echo "<th id = 'variation' colspan = '4'><h4>Variations</h4></th>";
        echo "<tr id = 'category'>";
        echo "<td>ID</td><td>Variation</td><td>Price</td><td>Stock</td>";
        echo "</tr>";
            for($i = 0; $i < count($var_id); $i++){
                if ($id[$idx] == $product_id[$i]){
                    echo "<tr>";
                    echo "<td>" . $var_id[$i] . "</td><td>" . $variation[$i] . "</td><td>"  . $price[$i] . "</td><td>" . $stock[$i] . "</td>";
                    echo "</tr>";
                }
            }
        }

        echo "<br>";
        echo "</table>";
        
        ?>
        <input type='hidden' name='postCheck' value='1'>
        <br>
        <center> <input type="submit" value="DELETE"> </center>
    </form>
</body>

</html>