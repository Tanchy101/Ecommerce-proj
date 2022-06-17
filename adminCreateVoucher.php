<?php

include "Config.php";

$addVName = $addVDiscount = $addVExpiration = "";

if(isset($_POST["postCheck"])){

    $addVName = $_POST["vName"];
    $addVDiscount = $_POST["vDiscount"];
    $addVExpiration = $_POST["vExpiration"];

    $sql = "INSERT INTO adminvoucher (name, discount, expiration)
    VALUES ('" . $addVName . "', '" . $addVDiscount . "', '" . $addVExpiration . "');";

    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

?>

<!DOCTYPE html>
<head>
    <title> Admin Create Vouchers </title>
    <br>
    <a href="adminMainPage.php"><img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left"></a>
    <br>
    <h1> Admin </h1>
    <h2> Welcome to the Admin Page: Create Vouchers! </h2>
    <br>
<style>
    head, body {
        font-family: monospace;
    }
    @media screen and (min-width:430px) 
            {
            fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
                 font-size: 15px;
                 font-weight: bold;
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
         } } footer {
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
            .btn{
                overflow: hidden;
                background-color: beige;
                color: #d3a35d;
                border: 1px solid #d3a35d;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                font-family: monospace;
                text-decoration: none;
                font-weight: bold;
                font-size: 16px;
                padding: 20px 50px;
                position: relative;
                border-radius: 30px;
                box-shadow: 0 0 0 0  rgba(143, 64, 248, 0.5), 0 0 0 0 rgba(39, 200, 255, 0.5);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .btn:hover{
                transform: translate(0, -6px);
                box-shadow: 10px -10px 25px 0  rgba(143, 64, 248, 0.5), -10px 10px 25px 0  rgba(39, 200, 255, 0.5);
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
    <br>
    <hr>

    <br>
    <h1 style="text-align: center">Add a New Voucher</h1>
    <fieldset> 
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            Voucher Name:<input type="text" name="vName" required>
    <br>
    <br>
            Discount:<input type="number" name="vDiscount" min="0" max="100" required>
    <br>
    <br>
            Expiration Date:<input type="date" name="vExpiration" required>
    <br>
    <br>
            <input type="hidden" name="postCheck" value="1">
            <center> <input type="submit" class = "btn"> </center>
    <br>
    </fieldset>
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