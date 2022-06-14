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
$sql = "SELECT * FROM `userpurchases` WHERE user_id='$user_id' ORDER BY id DESC";
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

        $product = [];
        $variation = [];
        $picture = [];
        $price = [];
        $quantity = [];

        $idx = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $product[$idx] = $row["product"];
                $variation[$idx] = $row["variation"];
                $picture[$idx] = $row["picture"];
                $quantity[$idx] = $row["quantity"];
                $price[$idx] = $row["price"];
                $idx++;
            }
        }


            echo "<h4>$picture[0]</h4>";
            echo "<h4>$product[0]</h4>";
            echo "<h4>$variation[0]</h4>";
            echo "<h4>$quantity[0]</h4>";
            echo "<h4>$price[0]</h4>";
        }
    
    
    ?>
</body>

</html>