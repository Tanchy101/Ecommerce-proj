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
        <li><a href="Paper_subfolder/PaperCategoryPage.html">Papers</a></li>
        <li><a href="#">Pencils</a></li>
        <li><a href="#">Ballpens</a></li>
        <li><a href="#">Markers</a></li>
        <li><a href="#">Arts & Crafts</a></li>
        <li><a href="#">Erasers</a></li>
        <li><a href="#">Notebooks</a></li>
        <li><a href="#">Journals</a></li>
        <li><a href="#">Planners</a></li>
        <li><a href="#">Office Supplies</a></li>
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
                <img class = "featimg" src = "https://cdn.shopify.com/s/files/1/0472/7118/2499/products/10057226.jpg?v=1632395566">
            </a>
            <div class = "desc"><strong>Watercolor Paper</strong> <br>  Fabriano Watercolor Paper (Size: 9x12) </div>
        </div>
        <!--2nd image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://ph-test-11.slatic.net/p/b974b9e38d3da59335147b0c15e5ba4c.jpg">
            </a>
            <div class = "desc"><strong>Faber Castell Pencil</strong> <br> Faber Castell Pencil No.2 (3 pcs)</div>
        </div>
        <!--3rd image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://i0.wp.com/ibitsphil.com/wp-content/uploads/2018/03/Panda-Ballpen.png?fit=450%2C334&ssl=1">
            </a>
            <div class = "desc"><strong>Panda Ballpen</strong> <br> Panda Ballpen (Size: 0.3, 0.5, 0.7) </div>
        </div>
        <!--4th image -->        
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://smudgestationery.com/wp-content/uploads/2020/03/Highlighters-1_1024x1024.jpg">
            </a>
            <div class = "desc"><strong>Highlight Markers</strong> <br> Highlighters (4 Colors: Pink, Blue, Yellow Green, Orange)</div>
        </div>
        <!--5th image -->       
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://www.collinsdictionary.com/images/full/scissors_100136453.jpg?version=4.0.69">
            </a>
            <div class = "desc"><strong>Scissors</strong> <br> High quality, stainless scissors </div>
        </div>
        
        <!--ito yung lower part ng featured part para di kayo maguluhan mwamwa <3 -->
        <div style = "margin-left: 30px;" class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://ph-test-11.slatic.net/p/7cec874ad42b94ae432ca0a8ec525729.jpg">
            </a>
            <div class = "desc"><strong>Correction Tape</strong> <br> Re-Write correction tape (CT-02)</div>
        </div>
        <!-- 2nd image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://tse4.mm.bing.net/th?id=OIP.JgoU6wHKH_xFFWkKHM-n7AHaHa&pid=Api">
            </a>
            <div class = "desc"><strong>Notebooks</strong> <br> Notebooks (Plain, Grid, Lined, Dotted) A6/A5/B6</div>
        </div>
        <!--3rd image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://cf.shopee.ph/file/d4b7608a2832e4d3603e939f484858c6">
            </a>
            <div class = "desc"><strong>Hardbound Journals</strong> <br> Hardbound Lined Journal Notebook</div>
        </div>
        <!--4th image-->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://crella.sfo2.cdn.digitaloceanspaces.com/wp-content/uploads/2020/04/28163916/daily.jpg">
            </a>
            <div class = "desc"><strong>Planners</strong> <br> Daily planners</div>
        </div>
        <!--5th image -->
        <div class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://media.accobrands.com/media/560-560/400328.jpg?width=680px&height=449px">
            </a>
            <div class = "desc"><strong>Staplers</strong> <br>High quality Swingline staplers</div>
        </div>
</body>
</html>