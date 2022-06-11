<?php 

include "Config.php";

session_start();

// Get ID and Username
$sql = "SELECT * FROM userlogin WHERE id ='{$_SESSION["user"]["id"]}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //output data of each row

    while($row = $result->fetch_assoc()) {
        $user_id = $row["id"];
        $username = $row["username"]; 
    }
}

// Get user id 
$sql = "SELECT * FROM `userpurchases` WHERE user_id='$user_id'";
$result = $conn->query($sql);

$order_id = [];
$shipstatus = [];
$date = [];

$idx = 0;
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $order_id[$idx] = $row["order_id"];
        $shipstatus[$idx] = $row["shipstatus"];
        $date[$idx] = $row["date"];
        $idx++;
    }
}


?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1> My Purchases </h1>
    <?php 

    // Get orders
    for ($i = 0; $i < count($order_id); $i++)
    {
        echo "<h2>Order $date[$i]<h2>";
        echo "<h2>Shipping Status: $shipstatus[$i]</h2>";
        $o_id = $order_id[$i];
        $sql = "SELECT * FROM `adminsales` WHERE order_id = '$o_id'";
        $result = $conn->query($sql);

        $var_id = [];
        $price = [];
        $quantity = [];

        $idx = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $var_id[$idx] = $row["var_id"];
                $quantity[$idx] = $row["quantity"];
                $price[$idx] = $row["price"];
                $idx++;
            }
        }

        for ($j = 0; $j < count($var_id); $j++)
        {
            $v_id = $var_id[$j];
            $sql = "SELECT * FROM `adminstockvariant` WHERE id = '$v_id'";
            $result = $conn->query($sql);

            $idx = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $product_id = $row["product_id"]; 
                    $variation = $row["variation"];
                    $idx++;
                }
            }

            $sql = "SELECT * FROM `adminstock` WHERE id = '$product_id'";
            $result = $conn->query($sql);

            $idx = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $products = $row["products"];
                    $picture = $row["picture"];
                    $idx++;
                }
            }

            echo "<h4>$picture</h4>";
            echo "<h4>$products</h4>";
            echo "<h4>$variation</h4>";
            echo "<h4>$quantity[$j]</h4>";
            echo "<h4>$price[$j]</h4>";
        }
    }
    
    ?>
</body>

</html>