<?php 
include "Config.php";

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
</head>

<body>
<?php
        for($idx = 0; $idx < count($vId); $idx++){
            echo "<input type='hidden' name='editVoucher' value='$vId[$idx]'>";
            echo "<input type='submit' value='EDIT'>";
            echo $vId[$idx] . " " . $vName[$idx] . " " . $vDiscount[$idx] . " " . $vExpiration[$idx];
            echo "<br>";
        }
        ?>
</body>

</html>