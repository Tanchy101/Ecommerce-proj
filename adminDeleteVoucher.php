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
</head>

<body>
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
</body>

</html>