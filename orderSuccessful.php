<?php 

session_start();
include "Config.php";

if(isset($_POST["purchase"])){

    $totalprice = 0;
    $checkout = [[]];
    $idx = 0;
        foreach($_SESSION['cart'] as $susi => $value){
            $jdx = 0;
            $checkout[$idx][$jdx] = $value['var_id'];
            echo $checkout[$idx][$jdx] . " ";
            $jdx++;
            $checkout[$idx][$jdx] = $value['product_id'];
            echo $checkout[$idx][$jdx] . " ";
            $jdx++;
            $checkout[$idx][$jdx] = $value['products'];
            echo $checkout[$idx][$jdx] . " ";
            $jdx++;
            $checkout[$idx][$jdx] = $value['quantity'];
            echo $checkout[$idx][$jdx] . " ";
            $jdx++;
            $checkout[$idx][$jdx] = $value['variation'];
            echo $checkout[$idx][$jdx] . " ";
            $jdx++;
            $checkout[$idx][$jdx] = $value['price'];
            echo $checkout[$idx][$jdx] . " ";

            echo "<br>";
            $totalprice = $totalprice + ( $value['quantity'] * $value['price']);
            $idx++;
        }
    
        // Updating Stocks
        for ($i = 0; $i < count($_SESSION["cart"]); $i++){

                $idForStock = $checkout[$i][0];

                $sql = "SELECT * FROM `adminstockvariant` WHERE id = '$idForStock'";
                $result = $conn->query($sql);

                $stock = [];
                $sold = [];

                $idx = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $stock[$idx] = $row["stock"];
                        $sold[$idx] = $row["sold"];
                        $idx++;
        }


            //Subtract Stock with Quantity
            $newStock = $stock[0] - $checkout[$i][3];
            $newSold = $sold[0] + 1;

            $sql = "UPDATE `adminstockvariant` SET `stock`='$newStock', sold = '$newSold' WHERE `id`='$idForStock';";
            if ($conn->query($sql) === TRUE) {
    
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
        }

    }


    // Insert Order ID
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

    $sql = "INSERT INTO orders (username)
    VALUES ('" . $username .  "');";

    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT * FROM `orders`";
    $result = $conn->query($sql);

    $order_id = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $order_id[$idx] = $row["order_id"];
            $idx++;
        }
    }


    // // Inserting on admin sales database
    for ($i = 0; $i < count($_SESSION["cart"]); $i++){

        $finalPrice = $checkout[$i][3] * $checkout[$i][5];
        $sql = "INSERT INTO adminsales (order_id,var_id, product_id, quantity, price)
        VALUES ('" . end($order_id) . "', '" . $checkout[$i][0] . "', '" . $checkout[$i][1] . "', '" . $checkout[$i][3] . "', '" . $finalPrice  . "');";

        // echo end($order_id) . "\n";
        // echo $checkout[$i][0] . "\n";
        // echo $checkout[$i][1] . "\n";
        // echo $checkout[$i][3] . "\n";
        // echo $finalPrice . "\n";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    // Inserting on user purchases database
    $sql = "SELECT * FROM `orders`";
    $result = $conn->query($sql);

    $order_id = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $order_id[$idx] = $row["order_id"];
            $idx++;
        }
    }

    $shipstatus = "Preparing to Ship";
    $sql = "INSERT INTO userpurchases (user_id, order_id, shipstatus, date)
    VALUES ('" . $user_id  . "', '" . end($order_id)  . "', '" . $shipstatus . "', '" . date('d-m-y h:i:s') . "');";


    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }




    unset($_SESSION["cart"]);

    header("Location: userHomePage.php");    
}

?>