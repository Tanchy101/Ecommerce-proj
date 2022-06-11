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
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    
    .search {
      width: 100%;
      position: relative;
      display: flex;
      
    }
    
    .searchTerm {
      width: 100%;
      border: 3px solid #d3a35d;
      border-right: none;
      padding: 5px;
      height: 20px;
      border-radius: 5px 0 0 5px;
      outline: none;
      color:#d3a35d;
    }
    
    .searchTerm:focus{
      color: #d3a35d;
    }
    
    .searchButton {
      width: 40px;
      height: 36px;
      border: 1px solid #d3a35d;
      background:#d3a35d;
      text-align: center;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 20px;
    }
    
    /*Resize the wrap to see the search bar change!*/
    .wrap{
        float: right;
        text-align: center;
        padding: 10px 10px;
        width: 35%;
    }
            .topnav a {
                float: right;
                text-align: center;
                padding: 14px 16px;
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
        table {
         border-collapse: collapse;
         width: 80%;
            }

        td, th {
       
        text-align: left;
        padding: 8px;
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
            <a href="logoutFileForUsers.php"><img src="https://i.imgur.com/Ua6SIs7.png" alt="Cart"width="35" height="30"></a>
            <a href="addtoCart.php"><img src="https://i.imgur.com/izpY4HG.png" alt="Cart"width="30" height="30"></a>
            <a href="profile.php"><img src="https://i.imgur.com/9Sd1au3.png" alt="Cart"width="35" height="30"></a>
            <a href="userHomePage.php"><img src="https://i.imgur.com/hVZsoCl.png" alt="Cart"width="35" height="30"></a>
           
            <div class="wrap">
                <div class="search">
                <input type="text" class="searchTerm" placeholder="Search">
                <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
             </button>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
       
    
    <br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->

    <h2> Your Cart</h2>
    <br><br>
    <div class="row"> 
        <h3 class="drawLine"></h3>        
    </div>
    <br><br>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
        <!--1st image -->
       <div id = "cartNatin">
           
       <table>
               <tr>
                   <th>Product name</th>
                   <th>Quantity</th>
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
                <td><?= $value['products']; ?></td>
                <td><?= $value['quantity']; ?></td>
                <td><?= $value['variation']; ?></td>
                <td> ₱ <?= $value['price']; ?></td>
                <td><?php number_format($value['quantity'] * $value['price'], 2); ?></td>
                <td>
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="hidden" name="remove" value="<?php $valueArray ?>">
                    <input type="submit" value="REMOVE">
                </form>
                </td>
            </tr>
            
        <?php 
            $totalprice = $totalprice + ( $value['quantity'] * $value['price']);
            $valueArray++;
               }
            ?>
            
            <tr>
                <td colspan = "3" align = "right"><b>Total Price</b></td>
                <td align = "right"> ₱ <?php echo number_format($totalprice, 2); ?></td>
                <td></td>
            </tr>
            
            <tr>
            <td>
            <form action = "placeOrder.php" method = "post">
                <input type = "submit" value ="CHECK OUT" name = "order">
            </form>
            </td>
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