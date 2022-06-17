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
            .picture img{
                height: 200px;
                width: 200px;
            }
            table { 
                border-collapse: collapse;
                border-spacing: 20;
                width: 100%
            }
                th, td {
    
              padding: 20px;
              text-align: center;
                        
            }
            fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 10px, 10px;
                 font-size: 15px;
                 min-width: 320px;
                 margin: auto;
                 width : 60%;
                 margin: 20px;
            }
            .tableC{
                align-items: center ;
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
        
    <br><br><br><br><br><br>
    <h2> My Purchases </h2>
    <br><br><br>
<hr>



    <?php 

    // Get orders
    for ($i = 0; $i < count($order_id); $i++)
    {
        
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
?>
<div class = "tableC">
<fieldset>
    
            <?php echo "<h4>Order $date[$i]<h4>";?>
            <?php echo "<h4>Shipping Status: $shipstatus[$i]</h4>";?>
<table>
        
               <tr>
                   <th>Picture</th>
                   <th>Product Name</th>
                   <th>Variation</th>
                   <th>Quantity</th>
                   <th>Price</th>
                </tr>
           
        <?php
        for ($j = 0; $j < count($product); $j++)
        {
            echo "<tr>";
            echo "<td class = picture > <img src = '$picture[$j]' ></td>";
            echo "<td> <h4>$product[$j]</h4></td>";
            echo "<td><h4>$variation[$j]</h4></td>";
            echo "<td><h4>$quantity[$j]</h4></td>";
            echo "<td><h4>₱$price[$j]</h4></td>";
            echo "</tr>";
        }
        ?>

    </table>
    </fieldset>
<div>
        <?php
        }
        ?>


</body>

</html>