<?php 

include "Config.php";

$sql = "SELECT * FROM `userpurchases` ORDER BY id DESC";
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

$totalprice = 0;
?>

<!DOCTYPE html>
<head>
<title> Welcom to Admin View Sales! </title>
    <br>
    <a href="adminMainPage.php"><img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left"></a>
    <br>
    <h1> Admin </h1>
    <h2> Welcome to the Admin View Sales! </h2>
    <br>
<style>
    head, body {
        font-family: monospace;

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
            .picture img{
                height: 200px;
                width: 200px;
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
            table { 
                border-collapse: collapse;
                border-spacing: 20;
                width: 100%
            }
                th, td {
    
              padding: 20px;
              text-align: center;
                }
                .tableC{
                align-items: center ;
            }
    </style>
</head>

<body  style= "background-color: #ffedc0">
<div class="maintopnav">
    <nav>   
    <a class="nav" href="adminMainPage.php">Home</a> 
    <a class="nav" href="adminViewSales.php">Sales</a> 
    <a class="nav" href="adminSalesStats.php">Product Status</a> 
    </nav>
    </div>
    <br>
    <hr>
<h1> Sales </h1>
<?php
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
    for ($j = 0; $j < count($product); $j++)
        {
            $totalprice = $totalprice + $price[$j];
        }
}

?>
<div class = "tableC">
    <fieldset>
    <table>
    <tr>
        <td> 
            <b>Total Income:</b>
        </td> 
        <td>
            <b>₱<?php echo $totalprice; ?></b>
        </td>
    </tr>
    </table>
</fieldset>
</div>
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

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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