<?php
session_start();

  include "Config.php";

  if(isset($_POST['addcart'])){
      
    if(isset($_SESSION['cart'])){

        $var_idPOST = $_POST["variation"];
        $sql = "SELECT * FROM `adminstockvariant` WHERE id='$var_idPOST'";
        $result = $conn->query($sql);
      
        $var_id = [];
        $product_id = [];
        $variation = [];
        $price = [];
        $stock = [];
      
        $idx = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $var_id[$idx] = $row["id"];
                $product_id[$idx] = $row["product_id"]; 
                $variation[$idx] = $row["variation"];
                $price[$idx] = $row["price"];
                $stock[$idx] = $row["stock"];
                $idx++;
            }
        }
        $session_array_id = array_column($_SESSION['cart'], $product_id[0]);

        if(!in_array($product_id[0], $session_array_id)){
            $session_array = array(
            'var_id' => $var_id[0],
            'product_id' => $product_id[0],
            "quantity" => $_POST['quantity'],
            "products" => $_POST['product'],
            "variation" => $variation[0],
            "price" => $_POST['price']
            );
            $_SESSION['cart'][] = $session_array;
        }

    }else{


        $session_array = array(
            'product_id' => $product_id[0],
            "quantity" => $_POST['quantity'],
            "products" => $_POST['product'],
            "variation" => $_POST['variation'],
            "price" => $_POST['price']
        );

        $_SESSION['cart'][] = $session_array;
    }
}

  $nav = "";
// READ PRODUCTS
if (isset($_POST["search"])){
    $search = $_POST["search"];
    $nav = '"' . $search . '"';

    $sql = "SELECT * FROM `adminstock` WHERE products='" . $search . "'OR categories ='" . $search . "'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
}
else if (isset($_POST["Papers"])){
 $nav = "Papers";

    $sql = "SELECT * FROM `adminstock` WHERE categories='Papers'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }

}
else if (isset($_POST["Pencils"])){

    $nav = "Pencils";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Pencils'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }


}
else if (isset($_POST["Ballpens"])){

    $nav = "Ballpens";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Ballpens'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }

}
else if (isset($_POST["Markers"])){

    $nav = "Markers";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Markers'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }

    
}
else if (isset($_POST["Arts/Crafts"])){
    $nav = "Arts/Crafts";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Arts/Crafts'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }

}
else if (isset($_POST["Erasers"])){

    $nav = "Erasers";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Erasers'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
    
}
else if (isset($_POST["Notebooks"])){
    $nav = "Notebooks";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Notebooks'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
}
else if (isset($_POST["Journals"])){
    $nav = "Journals";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Journals'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
}
else if (isset($_POST["Planners"])){
    $nav = "Planners";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Planners'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
    
}
else if (isset($_POST["OfficeSupplies"])){
    $nav = "Office Supplies";
    $sql = "SELECT * FROM `adminstock` WHERE categories='Office Supplies'";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
    
}
else{
    $nav = "All Products";
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

    $sql = "SELECT * FROM `adminstockvariant`";
    $result = $conn->query($sql);

    $var_id = [];
    $product_id = [];
    $variation = [];
    $price = [];
    $stock = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $var_id[$idx] = $row["id"];
            $product_id[$idx] = $row["product_id"]; 
            $variation[$idx] = $row["variation"];
            $price[$idx] = $row["price"];
            $stock[$idx] = $row["stock"];
            $idx++;
        }
    }
}

  if (!empty($_SESSION['user'])) {
    // Get ALL user details from database using user id
    $sql = "SELECT * FROM userlogin WHERE id ='{$_SESSION["user"]["id"]}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
    
       while($row = $result->fetch_assoc()) {
           $greet = $row["username"]; 
      }
    } else {
        session_destroy();
        header("Location: loginUser.php");
    }
} else {
    session_destroy();
    header("Location: loginUser.php");
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
        .topnav a {
            float: right;
            text-align: center;
            padding: 14px 16px;
        }

        .topnav .search-container   {
        float: right;
        padding: 10px 10px;
        }

      
        
        .category li {
            float: left;
            display: inline;
            text-align: center;
            padding: 14px 16px;
            margin-left : 15px;
        }

        h2 {
            padding: 0;
            float: left;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .featured {
        border: 2px solid #ccc;
        float: left;
        width: 220px;
        margin-left: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 20px;
        }

        div.feature:hover {
        border: 1px solid #777;
        }

        .featimg {
        width: 220px;
        height: 200px;
        }

        .desc {
        padding: 15px;
        text-align: center;
        }

        .drawLine {
        position: relative;
        }

        .drawLine:before {
        content: "";
        position: absolute;
        top: 50%; 
        left: 0;
        width: 100%;
        height: 1px;
        background: gray;
        }

        .drawLine span {
        display:inline-block;
        background: white;
        position: relative;
        padding-right: 5px; 
        }
        body {
            font-family: monospace;
            margin: 25px;
        }
        a:link {
            color: #000000;
            }
        a:visited {
            color: #d3a35d;
            }
        a:hover {
            color: #ffb2a0;
            }
        a.active {
            color: #ffcbb5;
            }

        ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: black;
        position: -webkit-sticky; /* Safari */
        position: sticky;
        top: 0;
        }

        li {
        float: left;
        }

        li input {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        background-color: black;
        }

        li input:hover {
        background-color: #111;
        }

        .active {
        background-color: #4CAF50;
        }
    </style>
    <body style = "background-color: #ffedc0">

    
        <?php //if ($result->num_rows > 0) {
             //output data of each row

            //while($row = $result->fetch_assoc()) {
              //  $greet = $row["username"]; 
          // }
        //} else {
         //   echo "<center><h1>You did not enter any Email or Password!!</h1></center>";
        //    header("Location: login.php");

        //}
        //$conn->close();
        //
        ?>

        
        <!-- cart and profile under nito-->
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="logoutFileForUsers.php">Logout</a>
            <a href="addtoCart.php"><img src="https://i.imgur.com/izpY4HG.png" alt="Cart"width="30" height="30"></a>
            <a href="profile.php"><?= $greet ?>'s Profile</a>
            <a href="userHomePage.php">Home</a>
           
                <div class="search-container">
                    <form action="search.php ">
                        <input type="text" placeholder="Search " size="50" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-- PARA SA CATEGORY , PAKI EDIT NALANG NG NAMES NG CATEGORY 
AND KAPAG MAY NAGAWA NG LINK FOR ANOTHER PAGE PAKI EDIT SA href -->
<hr style = "color:#d3a35d">
        <br>
        <br>
        <br>
        <br>

<ul>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="width:100%">
  <li><input class="active" type="submit" value="All Products"></li>
  <li><input type="submit" name="Papers" value="Papers"></li>
  <li><input type="submit" name="Pencils" value="Pencils"  ></li>
  <li><input type="submit" name="Ballpens" value="Ballpens"  ></li>
  <li><input type="submit" name="Markers" value="Markers"  ></li>
  <li><input type="submit" name="Arts/Crafts" value="Arts/Crafts" ></li>
  <li><input type="submit" name="Erasers" value="Erasers" ></li>
  <li> <input type="submit" name="Notebooks" value="Notebooks" ></li>
  <li><input type="submit" name="Planners" value="Planners" ></li>
  <li><input type="submit" name="OfficeSupplies" value="Office Supplies" ></li>
  </form>
</ul>

<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="btn-group" style="width:100%">
  <input type="submit" name="Papers" value="Papers" style="width:10%">
  <input type="submit" name="Pencils" value="Pencils" style="width:10%">
  <input type="submit" name="Ballpens" value="Ballpens" style="width:10%">
  <input type="submit" name="Markers" value="Markers" style="width:10%">
  <input type="submit" name="Arts/Crafts" value="Arts/Crafts" style="width:10%">
  <input type="submit" name="Erasers" value="Erasers" style="width:10%">
  <input type="submit" name="Notebooks" value="Notebooks" style="width:10%">
  <input type="submit" name="Journals" value="Journals" style="width:10%">
  <input type="submit" name="Planners" value="Planners" style="width:10%">
  <input type="submit" name="OfficeSupplies" value="Office Supplies" style="width:10%"> -->

    <br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    <div class="row"> 
        <h3 class="drawLine"><span >Featured Item</span></h3>        
    </div>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
        <!--1st image -->
        <?php
        for($idx = 0; $idx < count($id); $idx++)
        {

            if(isset($id[$idx])){
                echo "<div style = 'margin-left: 30px;' class = 'featured'>";
                echo "<a target = '_blank' href = '#'>";
                echo "<img class = 'featimg' src = '" . $picture[$idx] . "'></a>";          
                echo "<div class = 'desc'>";
                echo "<strong>" . $products[$idx] . "</strong>";
                echo "<p><b>";
                
                echo "</b></p>";
                echo "<p>" . $description[$idx] . "</p>";
                
                for ($i = 0; $i < count($var_id); $i++){
                    
                    if($id[$idx] == $product_id[$i])
                    {
                        echo "<form method = 'post' action = '#'>";

                        echo "₱" . $price[$i] . " ";
                        echo "<input type = 'hidden' name = 'price' value ='". $price[$i] . "'>";
                    }
                }
                echo "<br>";

                echo "<select name='variation'>";
                for ($i = 0; $i < count($var_id); $i++){
                    if($id[$idx] == $product_id[$i])
                    {
                        echo "<option value='$var_id[$i]'>$variation[$i]</option>";
                        // echo "<input type='radio' id='". $var_id[$i] . "' name='variation' value='" . $variation[$i] . "'>";
                        // echo "<label>" . $variation[$i] . "</label>"; 
                        // echo "<br>";
                        // echo "<input type = 'hidden' name = 'product_id' value ='". $product_id[$i] . "'>";
                    }
                }
                echo "</select>";
                echo "<br>";
             
                echo "<input type = 'hidden' name = 'product' value = '" . $products[$idx] . "'>";
                echo "<input type='number'  value = '1' name='quantity'>";
                echo "<input type='submit' name = 'addcart' value='addtocart'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";  
            }
        } 
        
         ?>
        <p></p>
</body>
</html>