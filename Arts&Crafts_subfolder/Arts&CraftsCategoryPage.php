
<!DOCTYPE html>
<html>
    <head>
        <title>Arts & Crafts</title>
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
    </style>
    <body style = "background-color: #ffedc0">
        
        <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->

        <!-- cart and profile under nito-->
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="../logoutFileForUsers.php">Logout</a>
            <a class="active" href="#">Cart</a>
            <a href="../profile.php">Profile</a>
            <a href="../userHomePage.php">Home</a>
           
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
        <li><a href="../Paper_subfolder/PaperCategoryPage.php">Papers</a></li>
        <li><a href="../Pencil_subfolder/PencilCategoryPage.php">Pencils</a></li>
        <li><a href="../Ballpens_subfolder/BallpensCategoryPage.php">Ballpens</a></li>
        <li><a href="../Markers_subfolder/MarkersCategoryPage.php">Markers</a></li>
        <li><a href="../Arts&Crafts_subfolder/Arts&CraftsCategoryPage.php">Arts & Crafts</a></li>
        <li><a href="../Erasers_subfolder/ErasersCategoryPage.php">Erasers</a></li>
        <li><a href="../Notebooks_subfolder/NotebooksCategoryPage.php">Notebooks</a></li>
        <li><a href="../Journals_subfolder/JournalsCategoryPage.php">Journals</a></li>
        <li><a href="../Planners_subfolder/PlannersCategoryPage.php">Planners</a></li>
        <li><a href="../OfficeSupplies_subfolder/OfficeSuppliesCategoryPage.php">Office Supplies</a></li>
    </div>
    <br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    <div class="row"> 
        <h3 class="drawLine"><span >Arts & Crafts</span></h3>        
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
