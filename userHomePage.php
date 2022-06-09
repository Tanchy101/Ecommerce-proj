<?php
session_start();

  include "Config.php";

  $sql = "SELECT * FROM adminstock";
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

if(isset($_POST['addcart'])){
      
    if(isset($_SESSION['cart'])){
        $session_array_id = array_column($_SESSION['cart'], "product_id");

        if(!in_array($_POST['product_id'], $session_array_id)){
            $session_array = array(
            'product_id' => $_GET['product_id'],
            "quantity" => $_POST['quantity'],
            "products" => $_POST['product'],
            "variation" => $_POST['variation'],
            "price" => $_POST['price']
            );
            $_SESSION['cart'][] = $session_array;
        }

    }else{


        $session_array = array(
            'product_id' => $_POST['product_id'],
            "quantity" => $_POST['quantity'],
            "products" => $_POST['product'],
            "variation" => $_POST['variation'],
            "price" => $_POST['price']
        );

        $_SESSION['cart'][] = $session_array;
    }
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
            <a class="active" href="addtoCart.php">Cart</a>
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

    <div class="category">
        <li><a href="Paper_subfolder/PaperCategoryPage.php">Papers</a></li>
        <li><a href="Pencil_subfolder/PencilCategoryPage.php">Pencils</a></li>
        <li><a href="Ballpens_subfolder/BallpensCategoryPage.php">Ballpens</a></li>
        <li><a href="Markers_subfolder/MarkersCategoryPage.php">Markers</a></li>
        <li><a href="Arts&Crafts_subfolder/Arts&CraftsCategoryPage.php">Arts & Crafts</a></li>
        <li><a href="Erasers_subfolder/ErasersCategoryPage.php">Erasers</a></li>
        <li><a href="Notebooks_subfolder/NotebooksCategoryPage.php">Notebooks</a></li>
        <li><a href="Journals_subfolder/JournalsCategoryPage.php">Journals</a></li>
        <li><a href="Planners_subfolder/PlannersCategoryPage.php">Planners</a></li>
        <li><a href="OfficeSupplies_subfolder/OfficeSuppliesCategoryPage.php">Office Supplies</a></li>
    </div>
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
                for ($i = 0; $i < count($var_id); $i++){
                    if($id[$idx] == $product_id[$i])
                    {
                        echo "<input type='radio' id='". $var_id[$i] . "' name='variation' value='" . $variation[$i] . "'>";
                        echo "<label>" . $variation[$i] . "</label>"; 
                        echo "<br>";
                        echo "<input type = 'hidden' name = 'product_id' value ='". $product_id[$i] . "'>";
                    }
                }
    
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
</body>
</html>