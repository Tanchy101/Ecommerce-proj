<?php 

include "Config.php";

$hide = "";

if(isset($_POST["hide"])){

    $hide = "hide";

}

if(isset($_POST["ship"])){

    $shipStatusUpdate = $_POST["ship"];
    $shipUpdateID = $_POST["shipUpdateID"];
    $sql = "UPDATE `userpurchases` SET `shipstatus`='$shipStatusUpdate' WHERE `order_id`=$shipUpdateID;";
    if ($conn->query($sql) === TRUE) {

    } 
    else {
        echo "Error updating record: " . $conn->error;
    }
}

if ($hide == "hide")
{
    $sql = "SELECT * FROM `userpurchases` ORDER BY id DESC;";
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
  
}
else
{
    $sql = "SELECT * FROM `userpurchases` WHERE NOT shipstatus = 'Delivered' ORDER BY id DESC;";
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
    
 
}
?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
    <input type="submit" name="hide" value="SHOW DELIVERED">
    <input type="submit" value="HIDE DELIVERED">
    </form>
    <?php 
    
    for ($i = 0; $i < count($order_id); $i++)
    {
        $o_id = $order_id[$i];
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method = 'post'>";
        echo "<select name='ship'>";
        echo "<option value='At the Sorting Center'>At the Sorting Center</option>";
        echo "<option value='On the way for Delivery'>On the way for Delivery</option>";
        echo "<option value='Delivered'>Delivered</option>";
        echo "</select>";
        echo "<input type='hidden' name='shipUpdateID' value='$order_id[$i]'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";

        
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