<?php 

session_start();
include "Config.php";

if(isset($_POST["purchase"])){

    $totalprice = 0;
    $checkout = [[]];
    $idx = 0;

        // print_r($_SESSION["cart"][$i]);
        foreach($_SESSION['cart'] as $susi => $value){
            $jdx = 0;
            $checkout[$idx][$jdx] = $value['var_id'];
            $jdx++;
            $checkout[$idx][$jdx] = $value['product_id'];
            $jdx++;
            $checkout[$idx][$jdx] = $value['products'];
            $jdx++;
            $checkout[$idx][$jdx] = $value['quantity'];
            $jdx++;
            $checkout[$idx][$jdx] = $value['variation'];
            $jdx++;
            $checkout[$idx][$jdx] = $value['price'];

            echo "<br>";
            $totalprice = $totalprice + ( $value['quantity'] * $value['price']);
        }
    
        // Updating Stocks
        for ($i = 0; $i < count($_SESSION["cart"]); $i++){

            for ($j = 0; $j < 1; $j++){

                $idForStock = $checkout[$i][0];

                echo $idForStock;

                $sql = "SELECT * FROM `adminstockvariant` WHERE id = '$idForStock'";
                $result = $conn->query($sql);

                $stock = [];

                $idx = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $stock[$idx] = $row["stock"];
                        $idx++;
            }
        }


            //Subtract Stock with Quantity
            $newStock = $stock[0] - $checkout[$i][3];
            echo $newStock;

            $sql = "UPDATE `adminstockvariant` SET `stock`='$newStock' WHERE `id`='$idForStock';";
            if ($conn->query($sql) === TRUE) {
                echo "Stock updated";
    
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
        }

    }



    // // Inserting on database
    for ($i = 0; $i < count($_SESSION["cart"]); $i++){

        $finalPrice = $checkout[$i][3] * $checkout[$i][5];
        $sql = "INSERT INTO adminsales (var_id, product_id, quantity, price)
        VALUES ('" . $checkout[$i][0] . "', '" . $checkout[$i][1] . "', '" . $checkout[$i][3] . "', '" . $finalPrice  . "');";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    unset($_SESSION["cart"]);

}

?>