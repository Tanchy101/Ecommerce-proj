<?php 

include "Config.php";

if (isset($_POST["LOW"]))
{


    $sql = "SELECT * FROM `adminstockvariant` ORDER BY sold ASC";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];
    $sold = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $sold[$idx] = $row["sold"];
            $idx++;
        }
    }

    $count = count($var_id);
    $highlow = "subtract";

}
else{

    $count = 1;
    $highlow = "add";
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

        $sql = "SELECT * FROM `adminstockvariant` ORDER BY sold DESC";
        $result = $conn->query($sql);

        $var_id = [];
        $product_id = [];
        $variation = [];
        $price = [];
        $stock = [];
        $sold = [];

        $idx = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $var_id[$idx] = $row["id"];
                $product_id[$idx] = $row["product_id"]; 
                $variation[$idx] = $row["variation"];
                $price[$idx] = $row["price"];
                $stock[$idx] = $row["stock"];
                $sold[$idx] = $row["sold"];
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
        <h2>Welcome to the Admin Sales Status!</h2>
        <br>
        <style>
        head, body {
        font-family: monospace;
         }

         tr:nth-child(even){background-color: #f2f2f2;}
            tr:nth-child(odd){background-color: #fff;}

            td{
                border: 1px solid #ddd;
                text-align: center;
            }
            #product{
                padding-top: 12px;
                padding-bottom: 12px;
                background-color: #d3a35d;
                color: white;
                text-align: center;
            }
            #category{
                padding: 12px;
                text-align: center;
                font-weight: bold;
            }
            #variation{
                background-color: #d3a35d;
                color: white;
                text-align: center;
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
           
    </style>
</head>

<body style = "background-color: #ffedc0">
<div class="maintopnav">
    <nav>   
    <a class="nav" href="adminMainPage.php">Home</a> 
    <a class="nav" href="adminViewSales.php">Sales</a> 
    <a class="nav" href="adminSalesStats.php">Product Status</a> 
    </nav>
    </div>
    <br>
    <hr>

    <h1>TOP PRODUCTS</h1>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="submit" name="TOP" value="Highest Sold">
    <input type="submit" name="LOW" value="Lowest Sold">
    </form>
<?php
            echo "<table id='main'>";
            echo "<tr id = 'category'>";
            echo "<td>TOP</td><td>Picture</td><td>Category</td><td>Product</td><td>Variation</td><td>Price</td><td>Stock</td><td>Sold</td>";
            echo "</tr>";
            for($i = 0; $i < count($var_id); $i++){

                $sql = "SELECT * FROM `adminstock` WHERE id='$product_id[$i]'";
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

                    echo "<tr>";
                    echo "<td>" . $count . "</td><td><img width='220px' src='$picture[0]'</td><td>$categories[0]</td><td>$products[0]</td>";
                    echo "<td>" . $variation[$i] . "</td><td>"  . $price[$i] . "</td><td>" . $stock[$i] . "</td><td>" . $sold[$i] . "</td>";
                    echo "</tr>";
                    if ($highlow == "add")
                    {
                        $count++;
                    }
                    else
                    {
                        $count--;
                    }
                
            
                }
        echo "<br>";
        echo "</table>";
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