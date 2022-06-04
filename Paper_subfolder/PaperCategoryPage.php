<?php 

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$databaseName = "thepaperbag";
$port = 3306;

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM adminstock WHERE categories='Papers'";
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
        $description[$idx] = $row["description"];
        $idx++;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Papers </title>
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
        visibility:hidden;
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
    <body name = "PaperCategory">
        <div class="topnav">
            <h4>The Paper Bag</h4>
            <a href="logout.php">Logout</a>
            <a class="active" href="#">Cart</a>
            <a href="#">Profile</a>
            <a href="../userHomePage.php">Home</a>
                <div class="search-container">
                    <form action="search.php ">
                        <input type="text" placeholder="Search " size="50" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
        </div>
        <br><br><br><br>

        <!-- PARA SA CATEGORY , PAKI EDIT NALANG NG NAMES NG CATEGORY 
AND KAPAG MAY NAGAWA NG LINK FOR ANOTHER PAGE PAKI EDIT SA href -->

    <div class="category">
        <li><a href="../Paper_subfolder/PaperCategoryPage.html">Papers</a></li>
        <li><a href="../Pencil_subfolder/PencilCategoryPage.html">Pencils</a></li>
        <li><a href="../Ballpens_subfolder/BallpensCategoryPage.html">Ballpens</a></li>
        <li><a href="../Markers_subfolder/MarkersCategoryPage.html">Markers</a></li>
        <li><a href="../Arts&Crafts_subfolder/Arts&CraftsCategoryPage.html">Arts & Crafts</a></li>
        <li><a href="../Erasers_subfolder/ErasersCategoryPage.html">Erasers</a></li>
        <li><a href="../Notebooks_subfolder/NotebooksCategoryPage.html">Notebooks</a></li>
        <li><a href="../Journals_subfolder/JournalsCategoryPage.html">Journals</a></li>
        <li><a href="../Planners_subfolder/PlannersCategoryPage.html">Planners</a></li>
        <li><a href="../OfficeSupplies_subfolder/OfficeSuppliesCategoryPage.html">Office Supplies</a></li>
    </div>
    <br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    <div class="row"> 
        <h3 class="drawLine"><span >Papers</span></h3>        
    </div>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
  <!--1st image -->
        <div style = "margin-left: 30px; <?php if(isset($id[0])){echo "visibility: visible";} ?>" class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://cdn.shopify.com/s/files/1/0472/7118/2499/products/10057226.jpg?v=1632395566">
            </a>
            <div class = "desc">
                <?php
            echo $categories[0] . " " . $products[0] . " " . $variations[0] . " " . $price[0] . " " . $quantity[0] . " " . $description[0];
                ?>
            </div>
        </div>
<!--2nd image -->
        <div style = "margin-left: 30px; <?php if(isset($id[1])){echo "visibility: visible";} ?>" class = "featured">
            <a target = "_blank" href = "#">
                <img class = "featimg" src = "https://cdn.shopify.com/s/files/1/0472/7118/2499/products/10057226.jpg?v=1632395566">
            </a>
            <div class = "desc">
                <?php
            echo $categories[1] . " " . $products[1] . " " . $variations[1] . " " . $price[1] . " " . $quantity[1] . " " . $description[1];
                ?>
            </div>
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