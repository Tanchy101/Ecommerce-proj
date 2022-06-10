<?php
session_start();

  include "Config.php";
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

if (isset($_POST["remove"])){

    $removeValue = $_POST["remove"];
    
    unset($_SESSION["cart"][0]); 

    $_SESSION["cart"] = array_values($_SESSION["cart"]);

}
 
if(isset($_POST['order'])){

    if(isset($_SESSION['myOrder'])){
        $session_array_idcart = array_column($_SESSION['myOrder'], "product_id");
        
        if(!in_array($_POST['product_idcart'], $session_array_idcart)){
            $session_array_cart = array(
                'product_id' => $_POST['product_idcart'],
                "quantity" => $_POST['quantitycart'],
                "products" => $_POST['productcart'],
                "variation" => $_POST['variationcart'],
                "price" => $_POST['pricecart']
            );

            $_SESSION['myOrder'][] = $session_array_cart;
            header("Location: placeOrder.php");
        }
        
    }else{

        $session_array_cart = array(
            'product_id' => $_POST['product_idcart'],
            "quantity" => $_POST['quantitycart'],
            "products" => $_POST['productcart'],
            "variation" => $_POST['variationcart'],
            "price" => $_POST['pricecart']
        );
        $_SESSION['myOrder'][] = $session_array_cart;
    }
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Cart</title>
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
        width: 100%;
        height: auto;
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
        .footer {
            padding: 20px;
            margin-top: 20px;
            background-color: #ffcbb5;
            text-align: center;
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
        
        <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->

        <!-- cart and profile under nito-->
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="logoutFileForUsers.php">Logout</a>
            <a class="active" href="#">Cart</a>
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
        <h3 class="drawLine"><span > Your Cart</span></h3>        
    </div>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
        <!--1st image -->
       <div id = "cartNatin">
           <table>
               <tr>
                   <th>product name</th>
                   <th>quantity</th>
                   <th>Variation</th>
                   <th>Price</th>
                </tr>
           <?php

           if(!empty($_SESSION['cart'])){
            $totalprice = 0;
            $valueArray = 0;

                foreach($_SESSION['cart'] as $susi => $value){

            ?>
            <tr>
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <td> <input type="checkbox" name="checkout[]" value="<?php $valueArray ?>"></td>
                <td><?= $value['products']; ?></td>
                <td><?= $value['quantity']; ?></td>
                <td><?= $value['variation']; ?></td>
                <td> ₱<?= $value['price']; ?></td>
                <td><?php number_format($value['quantity'] * $value['price'], 2); ?></td>
                <td>
                    <input type="hidden" name="remove" value="<?php $valueArray ?>">
                    <input type="submit" value="REMOVE">
                </td>
            </tr>
            
        <?php 
            $totalprice = $totalprice + ( $value['quantity'] * $value['price']);
            $valueArray++;
               }
            ?>
            <tr>
                <td>
                    <form action = "#" method = "post">
                    <input type = "hidden" name = "product_idcart" value = <?php echo $value['product_id']; ?>>
                    <input type = "hidden" name = "quantitycart" value = <?php echo $value['quantity']; ?>>
                    <input type = "hidden" name = "productcart" value = <?php echo $value['products']; ?>>
                    <input type = "hidden" name = "variationcart" value = <?php echo $value['variation']; ?>>
                    <input type = "hidden" name = "pricecart" value = <?php echo $value['price']; ?>>
                    <input type = "submit" value ="CHECK OUT" name = "order">
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan = "3" align = "right"><b>Total Price</b></td>
                <td align = "right"> ₱<?php echo number_format($totalprice, 2); ?></td>
                <td></td>
            </tr>

            <?php
            }
            ?>
           
        </table>
        </div>

    
       


            
       <div class = "footer">
        footer.
       </div>
</body>
</html>