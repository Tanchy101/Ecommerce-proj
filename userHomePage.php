<?php
    //$host = "localhost";
    //$dbusername = "root";
    //$dbpassword = "";
    //$databaseName = "loginpage";
    //$port = 3306;

    // Create connection
    //$conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

    // Check connection
    //if ($conn->connect_error) {
    //    die("Connection failed: " . $conn->connect_error);
    //}

    // Selecting / Reading Queery
    //$sql = "SELECT username FROM login WHERE email = '{$_POST["email"]}' AND password = '{$_POST["password"]}'";
    //$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
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
            margin-left : 30px;
        }

        h4 {
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
    </style>
    <body>
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
            <h4>The Paper Bag</h4>
            <a href="logout.php">Logout</a>
            <a class="active" href="#">Cart</a>
            <a href="#">Profile</a>
           
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
        <li><a href="#">Category 1</a></li>
        <li><a href="#">Category 2</a></li>
        <li><a href="#">Category 3</a></li>
        <li><a href="#">Category 4</a></li>
        <li><a href="#">Category 5</a></li>
        <li><a href="#">Category 6</a></li>
        <li><a href="#">Category 7</a></li>
        <li><a href="#">Category 8</a></li>
        <li><a href="#">Category 9</a></li>
        <li><a href="#">Category 10</a></li>
    </div>
    <br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    <div class="row"> 
        <h3 class="drawLine"><span >Featured Item</span></h3>        
    </div>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
        <!--1st image -->
        <div style = "margin-left: 30px;" class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/79/84/2e/79842e43a0850e77ba8a8a492b9a32a3.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--2nd image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/33/f1/f3/33f1f3248267b29345134383a56000f8.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--3rd image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/b5/a7/73/b5a7738245a23baaf0146a1a4f47889d.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--4th image -->        
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/1e/60/dd/1e60ddbe7d9b24ee314b5a3f9d13b77e.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--5th image -->       
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/22/b8/64/22b86414aada2d6baf2460e6b9123feb.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        
        <!--ito yung lower part ng featured part para di kayo maguluhan mwamwa <3 -->
        <div style = "margin-left: 30px;" class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/e7/be/ab/e7beab0c20a25d7adde57a31a3b5d114.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!-- 2nd image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/d8/5a/c7/d85ac78599e4198804d344fae43b7bd9.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--3rd image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/07/6d/77/076d775f925c5d9776d15b4896c76649.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--4th image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/b0/db/7c/b0db7caff956c56ea9db8e6eea658436.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
        <!--5th image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i.pinimg.com/564x/b2/02/d5/b202d52d002f584c26d2b02845360a2f.jpg">
            </a>
            <div class = "desc"><strong>Product Name</strong> <br> short desciption of the Product</div>
        </div>
</body>
</html>