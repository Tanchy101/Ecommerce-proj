<?php 

include "Config.php";

if (isset($_POST["postCheck"])){


    // Product
    $deleteID = [];
    if(isset($_POST["idDelete"])){
    $deleteID = ($_POST["idDelete"]);
    }

    $idImplode = implode(",", $deleteID);

    for ($idx = 0; $idx < count($deleteID); $idx++){

        $sql = "DELETE FROM `adminvoucher` WHERE `id` IN ($idImplode)";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }   

        $sql = "ALTER TABLE adminvoucher AUTO_INCREMENT = 1;";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }

$sql = "SELECT * FROM `adminvoucher`";
$result = $conn->query($sql);

$vId = [];
$vName = [];
$vDiscount = [];
$vExpiration = [];

$idx = 0;
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $vId[$idx] = $row["id"];
        $vName[$idx] = $row["name"]; 
        $vDiscount[$idx] = $row["discount"];
        $vExpiration[$idx] = $row["expiration"];
        $idx++;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admid Delete Vouchers</title>
    <style>
        footer {
            width: 100%;
            bottom: 0;
            background: linear-gradient(to right, #d3a35d, #ffcbb5);
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
            font-size: 13px;
            line-height: 20px;
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

<body>
    <h3>Delete Vouchers</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php
for($idx = 0; $idx < count($id); $idx++){
        echo "<table>";
        echo "<tr>";
        echo "<th id = 'product' colspan = '4'><h3>" . $products[$idx] . "</h3></th>";
        echo "</tr>";
        echo "<tr id = 'category'>";
        echo "<td>ID</td><td>Category</td><td>Description</td><td>Picture</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$id[$idx]</td><td>$categories[$idx]</td><td>$description[$idx]</td><td><img width='220px' src='$picture[$idx]'</td>";
        echo "</tr>";
        echo "<br>";
        echo "<tr>";
        echo "<th id = 'variation' colspan = '4'><h4>Variations</h4></th>";
        echo "<tr id = 'category'>";
        echo "<td>ID</td><td>Variation</td><td>Price</td><td>Stock</td>";
        echo "</tr>";
            for($i = 0; $i < count($var_id); $i++){
                if ($id[$idx] == $product_id[$i]){
                    echo "<tr>";
                    echo "<td>" . $var_id[$i] . "</td><td>" . $variation[$i] . "</td><td>"  . $price[$i] . "</td><td>" . $stock[$i] . "</td>";
                    echo "</tr>";
                }
            }
        }

        echo "<br>";
        echo "</table>";
        
        ?>
        <input type='hidden' name='postCheck' value='1'>
        <br>
        <center> <input type="submit" value="DELETE"> </center>
    </form>
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
        <br>
        <br>
        <br>
    <footer>
            <div class = "row">
                <div class = "col">
                    <!--logo-->
                    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo"  class = "logo">
                    <p>A local stationery shop </p>
                    <p>Manila, Philippines.</P>
                    <p> thepaperbag_mnl@gmail.com</P>
                    <h4>(+63) 930 732 9433 </h4>
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                    <ul>
                        <a href = ""><img src = "https://i.imgur.com/TE6yEdE.png" alt = "fb" width = "70" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/TbcePZW.png" alt = "ig" width = "80" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/cuKSoZO.png" alt = "twt" width = "70" height = "60"></a>
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