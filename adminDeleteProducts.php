<?php 

include "connection.php";

// READ PRODUCTS
$sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $variants = [];
    $price = [];
    $quantity = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $variations[$idx] = $row["variations"];
            $price[$idx] = $row["price"];
            $quantity[$idx] = $row["quantity"];
            $idx++;
        }
    }
    else{
        echo "0 results";
    }

    if (isset($_POST["postCheck"])){

        $deleteID = [];
        if(isset($_POST["ID"])){
        $deleteID = ($_POST["ID"]);
        }

        $IDS = implode(",", $ID);

        for ($idx = 0; $idx < count($ID); $idx++){

            $sql = "DELETE FROM `students` WHERE `id` IN ($IDS) ";

            if ($conn->query($sql) == TRUE){

            }
            else{

            }
        }   



    }


?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
<form>
<?php
for($idx = 0; $idx < count($id); $idx++){
    echo "<input type='hidden' name='postCheck' value='1'>";
    echo "<input type='checkbox' name='id[$idx]' value='$id[$idx]'>";
    echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $variations[$idx] . " " . $price[$idx] . " " . $quantity[$idx];
    echo "<br>";
}
?>
<input type="submit" value="DELETE">
</form>
</body>


</html>

