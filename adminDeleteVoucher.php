+<?php 

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
    <title>Admin Delete Vouchers</title>
    <br>
    <a href="adminMainPage.php"><img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left"></a>
    <br>
    <h1> Admin </h1>
    <h2> Welcome to the Admin Page: Delete Vouchers! </h2>
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
            font-family: monospace;
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
    <a class="nav" href="adminVouchers.php">View Vouchers</a> 
    <a class="nav" href="adminCreateVoucher.php">Create Voucher</a> 
    <a class="nav" href="adminEditVoucher.php">Edit Voucher</a> 
    <a class="nav" href="adminDeleteVoucher.php">Delete Voucher</a> 
    </nav>
    </div>
    <hr>
    <h3>Delete Vouchers</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <?php
        for($idx = 0; $idx < count($vId); $idx++){
            echo "<input type='checkbox' name='idDelete[$idx]' value='$vId[$idx]'>";
            echo $vId[$idx] . " " . $vName[$idx] . " " . $vDiscount[$idx] . " " . $vExpiration[$idx];
            echo "<br>";
        }
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