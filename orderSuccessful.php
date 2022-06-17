<?php 

session_start();
include "Config.php";
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

if(isset($_POST["purchase"])){

    $totalprice = 0;
    $checkout = [[]];
    $idx = 0;
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
            $jdx++;
            $checkout[$idx][$jdx] = $value['picture'];



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
        // echo "<br><h1>";
        // echo $checkout[$i][0];
        // echo $checkout[$i][1];
        // echo $checkout[$i][2];
        // echo $checkout[$i][3];
        // echo $checkout[$i][4];
        // echo $checkout[$i][5];
        // echo $checkout[$i][6];
        // echo "</h1>";


            //Subtract Stock with Quantity
            // echo "<br>";
            // echo $checkout[$i][3];
            $newStock = $stock[0] - $checkout[$i][3];
            $newSold = $sold[0] + $checkout[$i][3];

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
        $sql = "INSERT INTO adminsales (order_id, product, variation, picture, quantity, price)
        VALUES ('" . end($order_id) . "', '" . $checkout[$i][2] . "', '" . $checkout[$i][4] . "', '" . $checkout[$i][6] . "', '" . $checkout[$i][3] . "', '" . $finalPrice  . "');";

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
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    
    .search {
      width: 100%;
      position: relative;
      display: flex;
      
    }
    
    .searchTerm {
      width: 100%;
      border: 3px solid #d3a35d;
      border-right: none;
      padding: 5px;
      height: 20px;
      border-radius: 5px 0 0 5px;
      outline: none;
      color:#d3a35d;
    }
    
    .searchTerm:focus{
      color: #d3a35d;
    }
    
    .searchButton {
      width: 40px;
      height: 36px;
      border: 1px solid #d3a35d;
      background:#d3a35d;
      text-align: center;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 20px;
    }
    
    /*Resize the wrap to see the search bar change!*/
    .wrap{
        float: right;
        text-align: center;
        padding: 10px 10px;
        width: 35%;
    }
            .topnav a {
                float: right;
                text-align: center;
                padding: 14px 16px;
            }
    

      
        
        .category li {
            float: left;
            display: inline;
            text-align: center;
            padding: 14px 16px;
            margin-left : 15px;
        }

        h2 {
            padding: 0;
            float: left;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .featured {
        border: 2px solid #ccc;
        float: left;
        width: 220px;
        margin-left: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 20px;
        }

        div.feature:hover {
        border: 1px solid #777;
        }

        .featimg {
        width: 100%;
        height: auto;
        }

        .desc {
        padding: 15px;
        text-align: center;
        }

        .drawLine {
        position: relative;
        }

        .drawLine:before {
        content: "";
        position: absolute;
        top: 50%; 
        left: 0;
        width: 100%;
        height: 1px;
        background: gray;
        }

        .drawLine span {
        display:inline-block;
        background: white;
        position: relative;
        padding-right: 5px; 
        }
        body {
            font-family: monospace;
            margin: 25px;
        }
        a:link {
            color: #000000;
            }
        a:visited {
            color: #d3a35d;
            }
        a:hover {
            color: #ffb2a0;
            }
        a.active {
            color: #ffcbb5;
            }

        footer {
            width: 100%;
            bottom: 0;
            background: linear-gradient(to right, #d3a35d, #ffcbb5);
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
            font-size: 13px;
            line-height: 5px;
            left: 0;
           
            }
        .row {
            width: 85%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
            }
        .col {
            flex-basis: 27%; 
            padding: 10px;
            }
        .logo {
            height: 140px;
            width: 160px;
            margin-bottom: 30px;
            }
        .col h3 {
            width: fit-content;
            margin-bottom: 40px;
            position: relative;
             }
        .col ul li {
            list-style: none;
            margin-bottom: 12px;
             }
        .col ul li a {
            text-decoration: none;
            color: #000000;
            }
            fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
                 font-size: 15px;
                 width: 40%;
                 min-width: 320px;
                 margin: auto;
               
                }
                
                .success img {
               
                padding: 14px 14px;
               
                }

                .btn {
                overflow: hidden;
                background-color: beige;
                color: #d3a35d;
                border: 1px solid #d3a35d;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-decoration: none;
                padding: 15px 30px;
                position: relative;
                border-radius: 30px;
                box-shadow: 0 0 0 0  rgba(143, 64, 248, 0.5), 0 0 0 0 rgba(39, 200, 255, 0.5);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                margin: 10px;
            }
            .btn:hover{
                transform: translate(0, -6px);
                box-shadow: 10px -10px 25px 0  rgba(143, 64, 248, 0.5), -10px 10px 25px 0  rgba(39, 200, 255, 0.5);
            }
    </style>
    <body style = "background-color: #ffedc0">
        
      
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="logoutFileForUsers.php"><img src="https://i.imgur.com/Ua6SIs7.png" alt="Cart"width="35" height="30"></a>
            <a href="addtoCart.php"><img src="https://i.imgur.com/izpY4HG.png" alt="Cart"width="30" height="30"></a>
            <a href="profile.php"><img src="https://i.imgur.com/9Sd1au3.png" alt="Cart"width="35" height="30"></a>
            <a href="userHomePage.php"><img src="https://i.imgur.com/hVZsoCl.png" alt="Cart"width="35" height="30"></a>
           
            <div class="wrap">
                <div class="search">
                <input type="text" class="searchTerm" placeholder="Search">
                <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
             </button>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-- PARA SA CATEGORY , PAKI EDIT NALANG NG NAMES NG CATEGORY 
AND KAPAG MAY NAGAWA NG LINK FOR ANOTHER PAGE PAKI EDIT SA href -->
    
    <br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    
      
       
    <br><br><br>
    <h3 class="drawLine"></h3> <br><br>
        
    <div class = "success">
    <fieldset> 
       <center><img src="https://i.imgur.com/wifw52B.png" alt="Cart"width="35" height="35">
       <center><h3> Order Successful!</h3></center>
       <center><p>Go to My Purchases for more info.<p></center>
       <center><a class ="btn" href = "userPurchases.php">My Purchases</a></center>
        </fieldset>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <footer>
            <div class = "row">
                <div class = "col">
                    <!--logo-->
                    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo"  class = "logo">
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                    <ul>
                         <a href = "https://www.facebook.com/?stype=lo&jlou=Afdo9_8IzKjd-98S53hgWcs_YTL09G0gr2QFRljr_iv46_YAcls5iVZeqmHpGZC539as2z3YZrVmDMN4Fa7qZwlkDHYfPePzF_auNbBsMVT-8g&smuh=35351&lh=Ac-aDteK0xAi75BCmxY"><img src = "https://i.imgur.com/juyHCD8.png" alt = "fb" width = "70" height = "70"></a> 
                         <a href = "https://www.instagram.com/accounts/login/"><img src = "https://i.imgur.com/VoN7z9i.png" alt = "ig" width = "70" height = "70"></a> 
                         <a href = "https://twitter.com/"><img src = "https://i.imgur.com/yWnTdsy.png" alt = "twt" width = "70" height = "70"></a>

                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "email" width = "25" height = "25"></a> thepaperbag_mnl@gmail.com <a href = "#"> </p>
                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "phone" width = "25" height = "25"></a> (+63) 930 7329 433</p>
                    </ul>
                </div>
                <div class = "col">
                    <h3> Working Hours </h3>
                    <p> Monday - Saturday</p>
                    <p> 8:00 AM - 10:00 PM</p>
                </div>
             </div>
           <hr>
             <center> <p><i> Copryright &copy; 2022 - The Paper Bag.All Right Reserved. </i></p> </center> 
        </footer>

    </body>
    </html>