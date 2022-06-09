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
<html>
<head>
    <title> Admin Create Vouchers </title>
    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    <br>
    <h1> The Paper Bag. </h1>
    <h2> Welcome to the Admin Page: Create Vouchers! </h2>
</head>
<style>
    head, body {
        font-family: monospace;
        margin: 25px;
        font-weight: bold;
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
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
        }
</style>



<br>

<body style = "background-color: #ffedc0">
    <hr style = "color:#d3a35d">

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
            <center> <input type="submit"> </center>
</body>
</html>