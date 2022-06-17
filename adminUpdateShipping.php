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
<head>
<title> Welcome to Admin Sales Stats! </title>
    <br>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
        <br>
        <h1>Admin </h1>
        <h2>Welcome to the Admin Update Shipping!</h2>
        <br>
        <style>
        head, body {
        font-family: monospace;
         }
         .maintopnav{
                position: absolute;
                top: 108px;
                right: 16px;
                font-size: 18px;
            }
            .nav{
                padding: 20px;
                color: #926524;
                font-weight: bold;
            }
            .nav:hover{
                color: #d3a35d;
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
            flex-basis: 25%; 
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
             ul li {
            list-style: none;
            margin-bottom: 12px;
             }
             ul li a {
            text-decoration: none;
            color: #000000;
            }
         </style>
</head>

<body style = "background-color: #ffedc0">
<div class="maintopnav">
    <nav>   
    <a class="nav" href="adminMainPage.php"> Back to Home >> </a> 
    </nav>
    </div>
    <br>
    <hr>
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
        <br>
        <br>
    <footer>
            <div class = "row">
                <div class = "col">
                    <!--logo-->
                    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo"  class = "logo">
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                   
                         <a href = "https://www.facebook.com/?stype=lo&jlou=Afdo9_8IzKjd-98S53hgWcs_YTL09G0gr2QFRljr_iv46_YAcls5iVZeqmHpGZC539as2z3YZrVmDMN4Fa7qZwlkDHYfPePzF_auNbBsMVT-8g&smuh=35351&lh=Ac-aDteK0xAi75BCmxY"><img src = "https://i.imgur.com/juyHCD8.png" alt = "fb" width = "70" height = "70"></a> 
                         <a href = "https://www.instagram.com/accounts/login/"><img src = "https://i.imgur.com/VoN7z9i.png" alt = "ig" width = "70" height = "70"></a> 
                         <a href = "https://twitter.com/"><img src = "https://i.imgur.com/yWnTdsy.png" alt = "twt" width = "70" height = "70"></a>

                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "email" width = "25" height = "25"></a> thepaperbag_mnl@gmail.com <a href = "#"> </p>
                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "phone" width = "25" height = "25"></a> (+63) 930 7329 433</p>
                    
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