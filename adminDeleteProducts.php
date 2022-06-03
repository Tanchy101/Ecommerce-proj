<?php 

include "Config.php";

if (isset($_POST["postCheck"])){


    $deleteID = [];
    if(isset($_POST["idDelete"])){
    $deleteID = ($_POST["idDelete"]);
    }

    $idImplode = implode(",", $deleteID);

    for ($idx = 0; $idx < count($deleteID); $idx++){

        $sql = "DELETE FROM `adminstock` WHERE `id` IN ($idImplode)";

        if ($conn->query($sql) == TRUE){

        }
        else{

        }
    }   
}



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

   

?>


<!DOCTYPE html>
<html>
<head>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
        <br>
        <h1> Admin </h1>
        <h2>Welcome to the Admin Page: Delete Products!</h2>
        <br>
</head>
<style>
    head, body {
        font-family: monospace;
        margin: 25px;
    }
</style>

<body style = "background-color: #ffedc0">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php
for($idx = 0; $idx < count($id); $idx++){
    echo "<input type='checkbox' name='idDelete[$idx]' value='$id[$idx]'>";
    echo $id[$idx] . " " . $categories[$idx] . " " . $products[$idx] . " " . $variations[$idx] . " " . $price[$idx] . " " . $quantity[$idx];
    echo "<br>";
}
?>
<input type='hidden' name='postCheck' value='1'>
<input type="submit" value="DELETE">
</form>
</body>


</html>

