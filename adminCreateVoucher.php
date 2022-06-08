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
</head>
<h3>Create Voucher</h3>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
Voucher Name:<input type="text" name="vName" required>
<br>
Discount:<input type="number" name="vDiscount" min="0" max="100" required>
<br>
Expiration Date:<input type="date" name="vExpiration" required>
<br>
<input type="hidden" name="postCheck" value="1">
<input type="submit">

<br>

<body>
</body>
</html>